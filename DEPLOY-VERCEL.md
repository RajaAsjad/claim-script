# Deploy ClaimScript on Vercel

Laravel runs on Vercel through the community PHP runtime (`vercel-php`). Follow these steps after the project is on GitHub.

## 1. Push to GitHub

Repository: https://github.com/RajaAsjad/claim-script

## 2. Import project in Vercel

1. Go to [vercel.com](https://vercel.com) and sign in.
2. Click **Add New** → **Project**.
3. Import `RajaAsjad/claim-script`.
4. Framework Preset: **Other**
5. Build Command: `npm run build` (already set in `vercel.json`)
6. Output Directory: leave empty
7. Click **Deploy**

## 3. Required environment variables

In Vercel → Project → **Settings** → **Environment Variables**, add:

| Variable | Value |
|----------|-------|
| `APP_KEY` | Run locally: `php artisan key:generate --show` and paste the key |
| `APP_URL` | Your Vercel URL, e.g. `https://claim-script.vercel.app` |

After adding variables, redeploy the project.

## 4. Contact form database (important)

Vercel is serverless. Local SQLite does **not** persist on Vercel.

Choose one option:

### Option A: Vercel Postgres (recommended)

1. Vercel → Project → **Storage** → Create **Postgres** database.
2. Connect it to the project (Vercel adds `POSTGRES_URL` automatically).
3. Add environment variable:
   - `DB_CONNECTION` = `pgsql`
4. Redeploy, then run migrations once using Vercel CLI:

```bash
npm i -g vercel
vercel login
vercel link
vercel env pull .env.vercel
# Update .env with pulled vars, then:
php artisan migrate --force
```

Or add a one-time deploy hook / manual migration via `vercel dev` locally with production env.

### Option B: External MySQL (PlanetScale, Railway, etc.)

Set:

```
DB_CONNECTION=mysql
DB_HOST=...
DB_PORT=3306
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

Then run `php artisan migrate --force` against that database.

## 5. Custom domain (ClaimScript.com)

1. Vercel → Project → **Settings** → **Domains**
2. Add `claimscript.com` and `www.claimscript.com`
3. Update DNS at your domain registrar using the records Vercel shows
4. Update `APP_URL` to `https://claimscript.com`

## 6. Redeploy after changes

Every push to `main` on GitHub triggers an automatic Vercel redeploy.

## Notes

- Static assets (`/build`, `/images`, favicon) are served directly by Vercel.
- All page routes go through Laravel via `api/index.php`.
- For production, keep `APP_DEBUG=false`.
- If deploy fails due to size limits, consider upgrading Vercel plan or using traditional PHP hosting (XAMPP/cPanel) for full Laravel support.

## Alternative hosting (simpler for Laravel)

If Vercel causes issues, Laravel works more naturally on:

- Shared PHP hosting (Hostinger, Namecheap)
- XAMPP / VPS with Apache pointing to `public/`
- [Railway](https://railway.app) or [Render](https://render.com)

For XAMPP, point the site document root to the `public` folder.
