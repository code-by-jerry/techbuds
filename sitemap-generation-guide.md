# Sitemap Generation Guide

## ✅ Setup Complete

The sitemap generation system is now fully configured using the Spatie Laravel Sitemap package.

## Package Installation

The package is already installed:
```bash
composer require spatie/laravel-sitemap
```

## Generate Sitemap

### Manual Generation

Run the artisan command to generate the sitemap:

```bash
php artisan sitemap:generate
```

This will:
- Generate `sitemap.xml` in the `/public` directory
- Include all pages, services, pricing, blogs, and locations
- Use `https://techbuds.online` as the base URL
- Show progress and total URL count

### Output Location

The sitemap will be saved to:
```
/public/sitemap.xml
```

Accessible at:
```
https://techbuds.online/sitemap.xml
```

## Automatic Generation

The sitemap is automatically regenerated **daily at 2:00 AM** via Laravel's task scheduler.

### Schedule Configuration

Located in `bootstrap/app.php`:
```php
$schedule->command('sitemap:generate')->dailyAt('02:00');
```

**Important:** Make sure your cron job is set up to run Laravel's scheduler:
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Sitemap Route

The route `/sitemap.xml` will:
1. **First:** Serve the static file from `/public/sitemap.xml` if it exists
2. **Fallback:** Generate dynamically if the static file doesn't exist

This ensures:
- Fast serving of the static file
- Automatic fallback if file is missing
- Always accessible for search engines

## Configuration

### Base URL

The sitemap uses the production domain `https://techbuds.online` by default.

To change it, set in your `.env` file:
```env
APP_URL=https://techbuds.online
```

The command will automatically use this URL, or fall back to `https://techbuds.online` if not set.

## Included URLs

### High Priority (1.0)
- Homepage (`/`)

### High Priority (0.9)
- Services (`/services`)
- Pricing (`/pricing`)
- Blog Index (`/blog`)

### High Priority (0.8)
- About (`/about`)
- Portfolio (`/portfolio`)
- Individual Service Pages (`/services/{slug}`)
- Individual Pricing Pages (`/pricing/{slug}`)

### Medium Priority (0.7)
- Contact (`/contact`)
- Locations (`/locations`)
- Recent Blog Posts (last 30 days)

### Medium Priority (0.6)
- Older Blog Posts
- Service Location Pages (`/services/{service}/{location}`)

### Lower Priority (0.5)
- DevTools (`/devtools`)

## Google Search Console Submission

### Step 1: Generate Sitemap

```bash
php artisan sitemap:generate
```

### Step 2: Verify File

Check that the file exists:
```bash
ls -la public/sitemap.xml
```

Or visit: `https://techbuds.online/sitemap.xml`

### Step 3: Submit to Google Search Console

1. Go to [Google Search Console](https://search.google.com/search-console)
2. Select your property (`https://techbuds.online`)
3. Navigate to **Sitemaps** in the left menu
4. Enter: `sitemap.xml`
5. Click **Submit**

### Step 4: Monitor

- Check for errors in Search Console
- Monitor indexed URLs
- Review sitemap status regularly

## Robots.txt

The robots.txt file automatically references the sitemap:
```
Sitemap: https://techbuds.online/sitemap.xml
```

## Verification

### Check Sitemap Content

```bash
# View sitemap
cat public/sitemap.xml

# Or visit in browser
https://techbuds.online/sitemap.xml
```

### Validate Sitemap

Use Google's sitemap validator or online tools:
- [XML Sitemap Validator](https://www.xml-sitemaps.com/validate-xml-sitemap.html)
- Google Search Console's built-in validator

### Test Command

```bash
php artisan sitemap:generate
```

Expected output:
```
Generating sitemap...
Using base URL: https://techbuds.online
Added 7 main pages
Added 8 service pages
Added 8 pricing pages
Added X location pages
Added X blog posts
Sitemap generated successfully!
Total URLs: XXX
Saved to: /path/to/public/sitemap.xml
Sitemap URL: https://techbuds.online/sitemap.xml
```

## Troubleshooting

### Issue: Sitemap uses localhost URL

**Solution:** Set `APP_URL` in `.env`:
```env
APP_URL=https://techbuds.online
```

Then regenerate:
```bash
php artisan sitemap:generate
```

### Issue: Sitemap not updating

**Solution:** 
1. Check cron job is running: `php artisan schedule:list`
2. Manually regenerate: `php artisan sitemap:generate`
3. Check file permissions on `/public/sitemap.xml`

### Issue: Missing URLs

**Solution:**
- Check that blogs are published (`is_published = 1`)
- Verify service/pricing configs exist
- Check location configs for `seo_index = true`

## Best Practices

1. **Regular Updates:** Sitemap regenerates daily automatically
2. **Monitor:** Check Google Search Console for errors
3. **Validate:** Use sitemap validators before submitting
4. **Keep Updated:** Run manually after major content updates
5. **Check Coverage:** Ensure all important pages are included

## Command Reference

```bash
# Generate sitemap
php artisan sitemap:generate

# Check scheduled tasks
php artisan schedule:list

# Test scheduler (runs pending tasks)
php artisan schedule:run
```

---

*Last Updated: January 2026*

