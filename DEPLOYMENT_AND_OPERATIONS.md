# Deployment & Operations Guide

This document captures everything you need to run the Techbuds CRM & Delivery System (TCDS) in production, including shared hosting notes (Hostinger Business plan).

---

## 1. Environment Variables

| Key | Description |
| --- | --- |
| `APP_URL` | Public URL of the CRM |
| `DB_*` | Database connection (MySQL recommended) |
| `MAIL_MAILER` / `MAIL_HOST` / `MAIL_PORT` / `MAIL_USERNAME` / `MAIL_PASSWORD` / `MAIL_ENCRYPTION` | SMTP settings (Hostinger example uses `smtp.hostinger.com`, port `465`, encryption `ssl`) |
| `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME` | Sender identity shown in notification emails |
| `QUEUE_CONNECTION` | `sync` for simple setups; `database` for production with workers |

After editing `.env`, always run:
```bash
php artisan config:clear
php artisan cache:clear
```

---

## 2. Queues & Notifications

All notification listeners implement `ShouldQueue`.

- **Local / Low volume**: set `QUEUE_CONNECTION=sync`.
- **Production**: use `QUEUE_CONNECTION=database`.
  1. `php artisan queue:table`
  2. `php artisan migrate`
  3. Run a worker: `php artisan queue:work --tries=3`

On shared hosting without long-running processes, switch to `sync` or trigger `php artisan queue:work --once` via cron.

---

## 3. Automation Command

We introduced scheduled status automations in Phase 7.

Manual run:
```bash
php artisan automation:run
```
Outputs counts for invoices, tasks, projects, and clients touched.

---

## 4. Scheduling & Cron

Laravel’s scheduler (configured in `bootstrap/app.php`) runs `automation:run` daily at **01:00 server time**. To activate the scheduler, ensure cron calls `php artisan schedule:run` every minute.

### Hostinger example

1. Log into hPanel → Advanced → Cron Jobs.
2. Add a new cron job:
   ```
   * * * * * /opt/alt/php82/usr/bin/php /home/USERNAME/public_html/artisan schedule:run >> /home/USERNAME/logs/schedule.log 2>&1
   ```
   - Replace PHP path (`/opt/alt/php82/usr/bin/php`) and project path with your actual account.
   - Ensure `schedule.log` exists (or remove the redirection).

If you prefer weekly automation, replace the cron with:
```
0 2 * * 0 /opt/alt/php82/usr/bin/php /home/USERNAME/public_html/artisan automation:run >> /home/USERNAME/logs/automation.log 2>&1
```

---

## 5. Performance Tips

- Clear caches after deployment:
  ```bash
  php artisan optimize:clear
  php artisan config:cache
  php artisan route:cache
  ```
- Dashboard metrics now use short-lived caching (15–30 min). To flush manually:
  ```bash
  php artisan cache:clear
  ```
- Database indexes (`2025_11_17_000001_add_crm_performance_indexes`) improve dashboard/pipeline queries. Run `php artisan migrate` after pulling the latest code.

---

## 6. Maintenance Checklist

| Task | Command |
| --- | --- |
| Run automations immediately | `php artisan automation:run` |
| Replay notification queue (database driver) | `php artisan queue:work --tries=3` |
| View failed jobs | `php artisan queue:failed` |
| Retry failed jobs | `php artisan queue:retry all` |
| Rotate logs | manually truncate `storage/logs/*.log` on shared hosting |

---

## 7. Troubleshooting

| Issue | Fix |
| --- | --- |
| No emails sending | Confirm `.env` mail settings, run `Mail::raw` in Tinker, check `storage/logs/laravel.log` |
| Duplicate emails | Ensure the same inbox isn’t both a client and team member; dedupe addresses if needed |
| Cron not firing | Verify cron path, make script executable, inspect `schedule.log` |
| Automations too frequent | Change schedule in `bootstrap/app.php` or cron frequency |

---

Keep this guide next to your deployment scripts so you can quickly adjust queues, mail, and automations as the CRM grows. Let me know if you need provider-specific commands beyond Hostinger. 

