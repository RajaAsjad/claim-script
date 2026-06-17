# ClaimScript LLC Website

Modern Laravel website for [ClaimScript LLC](https://claimscript.com), a medical billing and revenue cycle management provider for outpatient healthcare practices.

## Tech Stack

- **Laravel 12** (PHP 8.2+)
- **Tailwind CSS 4** via Vite
- **Blade** templates
- SQLite database (consultation form submissions)

## Pages

| Page | Route |
|------|-------|
| Home | `/` |
| Services | `/services` |
| Our Process | `/process` |
| About | `/about` |
| FAQ | `/faq` |
| Contact | `/contact` |

## Local Development (XAMPP)

### Requirements

- PHP 8.2+
- Composer
- Node.js 18+

### Setup

```bash
# Install PHP dependencies
composer install

# Copy environment file and generate key
copy .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Install frontend dependencies and build
npm install
npm run dev
```

### Run the development server

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000`

For XAMPP, point your virtual host document root to the `public/` directory.

## Production Build

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Consultation Form

Contact form submissions are stored in the `consultations` table. The form includes:

- Honeypot spam protection
- HIPAA notice (no PHI collection)
- Server-side validation via `ContactRequest`

## Brand Assets

Logo files are located in `public/images/logo/`:

- `logo-dark.png` for dark/navy backgrounds
- `logo-light.png` for light/white backgrounds
- `logo-icon.png` for icon mark, loader, and favicon

## License

Proprietary. ClaimScript LLC
