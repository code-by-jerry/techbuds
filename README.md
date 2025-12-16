## Techbuds CRM & Delivery System (TCDS)

Laravel 12.x CRM that powers Tech Buds’ client pipeline, delivery workflow, invoicing, and automation. Built with Blade + Alpine.js + Tailwind CSS and MySQL.

---

### Key Modules

- **Clients & Pipeline** – drag-and-drop status updates, client insights, automation sync.
- **Projects** – deep detail pages with requirements, tasks, milestones, documents, invoices, and activity logging.
- **Requirements / Communication / Documents** – full CRUD with file storage and attachment downloads.
- **Tasks & Milestones** – Kanban-ready CRUD with team assignment, progress, and automated overdue tracking.
- **Invoices & Payments** – automatic invoice numbers, PDF generation, payment receipts, and email notifications.
- **Dashboard** – KPI cards, upcoming deadlines, recent activity, and status distributions.
- **Automations** – daily (configurable) automations for overdue detection, project/client status syncing, and progress updates.

---

### Tech Stack

- Laravel 12.x (PHP 8.2)
- Blade, Alpine.js, Tailwind CSS
- MySQL / MariaDB
- Laravel Filesystem (public storage)
- Spatie Laravel Permission
- DomPDF for invoice PDFs

---

### Quick Start

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
npm install && npm run build   # or npm run dev
php artisan serve
```

Login via `/admin/login` with the seeded admin credentials (see `database/seeders`).

---

### Operations

- **Mail**: configure SMTP in `.env` (Hostinger example inside `DEPLOYMENT_AND_OPERATIONS.md`).
- **Queues**: set `QUEUE_CONNECTION=sync` for shared hosting or `database` with `php artisan queue:work`.
- **Automations**: run `php artisan automation:run` manually or let the scheduler trigger it (cron calling `php artisan schedule:run`).
- **Cron examples, troubleshooting, and maintenance checklist**: see [`DEPLOYMENT_AND_OPERATIONS.md`](DEPLOYMENT_AND_OPERATIONS.md).

---

### Useful Commands

| Purpose | Command |
| --- | --- |
| Clear caches | `php artisan optimize:clear` |
| Run automations immediately | `php artisan automation:run` |
| Queue worker | `php artisan queue:work --tries=3` |
| Compile assets | `npm run build` |

---

### Documentation & Status

- Phase-by-phase plans: `CRM_IMPLEMENTATION_PLAN.md`
- Completion summaries: `PHASE1..PHASE7_COMPLETION_SUMMARY.md`
- Additional features overview: `ADDITIONAL_FEATURES_COMPLETION.md`
- Deployment checklist: `DEPLOYMENT_AND_OPERATIONS.md`

---

### License

This repository is part of the Tech Buds internal CRM project. All rights reserved unless a different license is explicitly provided.
