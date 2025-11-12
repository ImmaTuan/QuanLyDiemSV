## Quick rules for AI assistants working on this repo

This repository is a small Laravel (v12) web app using PHP ^8.2 with Vite/Tailwind for assets. The goal of this file is to capture the project-specific patterns, commands, and hotspots so an AI code assistant can be immediately productive.

- Project roots and entry points:
  - PHP/Laravel code: `app/` (controllers in `app/Http/Controllers`). Example: `AuthController.php` implements login/panel/logout used by `routes/web.php`.
  - Views: `resources/views/` (look at `login.blade.php` and `panel.blade.php`).
  - Routes: `routes/web.php` — small app-level routes; prefer modifying here for new HTTP endpoints.
  - Migrations: `database/migrations/` (DB schema changes belong here).

- Primary developer workflows & exact commands (use these, not generic variants):
  - Local setup (composer + node + build):
    - composer run setup
      - runs: composer install, copies `.env`, `php artisan key:generate`, runs migrations, npm install, npm run build.
  - Development (single command orchestrates server, queue, logs and vite dev):
    - composer run dev
      - This runs `php artisan serve`, `php artisan queue:listen`, `php artisan pail` and `npm run dev` via `npx concurrently`.
      - On Windows PowerShell ensure Node and npx are available.
  - Frontend only:
    - npm run dev (Vite dev server)
    - npm run build (production assets)
  - Tests:
    - composer run test  OR  php artisan test
    - CI runs `php artisan test` and copies `.env.example` to `.env` (see `.github/workflows/tests.yml`).

- Environment & DB hints discovered in scripts:
  - The project supports an SQLite local workflow: composer post-create project creates `database/database.sqlite` and runs migrations. CI copies `.env.example` to `.env` before tests. Prefer using the included `.env.example` as baseline.

- Patterns & conventions specific to this repo:
  - Authentication flows are handled by a single `AuthController` referenced directly in `routes/web.php`. When adding auth-related features, check `AuthController` first.
  - Views are simple Blade templates under `resources/views/`; prefer adding partials in that directory rather than inlining HTML in controllers.
  - Small codebase: prefer making minimal, explicit changes (add a route -> add controller method -> add view) and run `php artisan serve` + `npm run dev` to validate UI/behavior.

- Tests & CI specifics:
  - Tests live in `tests/` and use PHPUnit via `php artisan test`.
  - CI matrix tests PHP 8.2–8.4 (`.github/workflows/tests.yml`). Keep compatibility with PHP ^8.2 declared in `composer.json`.

- Where to look for examples when altering behavior:
  - Login flow: `routes/web.php` + `app/Http/Controllers/AuthController.php` + `resources/views/login.blade.php`.
  - Panel UI: `resources/views/panel.blade.php` (current active page for authenticated users).

- Helpful code edit rules for AI:
  - Preserve Laravel conventions: service provider registration is in `bootstrap/` and `app/Providers/` if you need DI or bindings.
  - Use migrations for schema changes; do not edit `database/migrations/*` timestamps except to add new migrations.
  - When adding npm/Vite assets, update `resources/js` or `resources/css` and reference them in Blade via Vite helper (project already uses `laravel-vite-plugin`).

- Quick examples (explicit):
  - Add a GET route -> edit `routes/web.php`, create `App\\Http\\Controllers\\NewController.php` (method `index`) and a view `resources/views/new.blade.php`.
  - Run unit tests after adding code: `composer run test`.

If any of the above points are unclear or you want the file to include more examples (e.g., common refactors, code style rules, or test examples), tell me which section to expand and I will iterate.
