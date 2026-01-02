# Sitemap Configuration

## ✅ Updated Sitemap URLs

The sitemap has been updated to use `https://techbuds.online/` as the base URL for all sitemap entries.

## Configuration

### Base URL Source
The sitemap uses the `APP_URL` environment variable from your `.env` file, with a fallback to `https://techbuds.online` if not set.

### Environment Variable
Make sure your `.env` file has:
```env
APP_URL=https://techbuds.online
```

## Sitemap Location
- **URL:** `https://techbuds.online/sitemap.xml`
- **Route:** `/sitemap.xml`
- **Robots.txt Reference:** `https://techbuds.online/sitemap.xml`

## Included Pages

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

## Change Frequencies

- **Daily:** Blog Index
- **Weekly:** Homepage, Services, Portfolio, Blog Posts
- **Monthly:** Pricing, About, Contact, Locations, Service Pages, Pricing Pages

## Verification

To verify the sitemap is generating correctly:

1. **Check sitemap URL:**
   ```
   https://techbuds.online/sitemap.xml
   ```

2. **Validate in Google Search Console:**
   - Go to Sitemaps section
   - Submit: `https://techbuds.online/sitemap.xml`
   - Monitor for errors

3. **Test locally:**
   ```bash
   php artisan route:list --name=sitemap
   curl http://localhost/sitemap.xml
   ```

## Robots.txt

The robots.txt file automatically references the sitemap:
```
Sitemap: https://techbuds.online/sitemap.xml
```

## Notes

- All URLs in the sitemap use the production domain (`https://techbuds.online`)
- The sitemap is dynamically generated on each request
- Blog posts are automatically included based on `is_published` status
- Service and pricing pages are automatically included from config files

---

*Last Updated: January 2026*

