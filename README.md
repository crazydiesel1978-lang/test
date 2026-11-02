# test

Laravel application scaffolded with PHP 8.3+, Laravel 13, and PostgreSQL.

## Requirements

- PHP 8.3 or newer (extensions: `mbstring`, `xml`, `curl`, `zip`, `pgsql`/`pdo_pgsql`, `bcmath`, `intl`)
- [Composer](https://getcomposer.org/)
- PostgreSQL 14+ (or compatible)

## Setup

```bash
# Install PHP dependencies
composer install

# Copy environment file and generate an app key
cp .env.example .env
php artisan key:generate

# Edit .env — set DB_DATABASE, DB_USERNAME, and DB_PASSWORD for your Postgres instance
# Defaults: host 127.0.0.1, port 5432, database laravel, user laravel

# Create the database (example)
# createdb -U laravel laravel

# Run migrations
php artisan migrate

# Optional: frontend assets
npm install && npm run build

# Start the local server
php artisan serve
```

Do not commit `.env` — it is gitignored. Keep secrets out of version control; only `.env.example` holds placeholders.

## Stack

| Piece        | Version / notes                          |
|--------------|------------------------------------------|
| PHP          | `^8.3` (see `composer.json`)             |
| Laravel      | 13.x (`laravel/framework`)               |
| Database     | PostgreSQL (`DB_CONNECTION=pgsql`)       |

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
