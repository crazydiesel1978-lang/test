# test

Laravel mini-site with a public home page and a small auth-protected admin for editing the home banner.

## Stack

| Piece    | Notes |
|----------|-------|
| PHP      | `^8.3` |
| Laravel  | 13.x + Breeze (Blade) |
| Database | PostgreSQL (`DB_CONNECTION=pgsql` in `.env.example`) |

## Requirements

- PHP 8.3+ with `mbstring`, `xml`, `curl`, `zip`, `pgsql`/`pdo_pgsql`, `bcmath`, `intl`
- Composer
- Node.js + npm (for Vite/Tailwind assets)
- PostgreSQL 14+ (or compatible)

## Setup

```bash
composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate

# Edit .env for your Postgres instance:
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=laravel
# DB_USERNAME=laravel
# DB_PASSWORD=secret

php artisan migrate --seed
php artisan serve
```

Then open:

- Public home: [http://127.0.0.1:8000/](http://127.0.0.1:8000/)
- Admin: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin) (redirects to login when signed out)

Do not commit `.env`. Keep secrets out of git; only `.env.example` has placeholders.

## Default admin user

Seeded by `php artisan db:seed` / `migrate --seed`:

| Field    | Value |
|----------|-------|
| Email    | `admin@example.com` |
| Password | `password` |

Change this password before any shared or production use.

## Routes

| Path | Description |
|------|-------------|
| `/` | Public home with top menu + hero banner |
| `/login` | Breeze login |
| `/admin` | Admin dashboard (auth required) |
| `/admin/banner` | Edit banner title, subtitle, CTA text/URL |
| `/dashboard` | Redirects to `/admin` |

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
