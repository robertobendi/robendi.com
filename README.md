# robendi.com

Personal site of Roberto Bendinelli. Built on [Pebblestack](https://github.com/robertobendi/pebblestack) — a small PHP 8.2 + SQLite + Twig CMS that drops onto any shared host.

## Stack

- **Backend / CMS:** Pebblestack (PHP 8.2, SQLite, Twig)
- **Frontend:** Server-rendered Twig theme in `templates/theme/default/` — vanilla CSS, vanilla JS, animated canvas background, no build step.
- **Hosting:** Hostinger shared PHP hosting (or any PHP 8.2+ host with `mod_rewrite`).

## Deploy to Hostinger

1. **Zip** the entire repo *except* `_legacy_react/` and `.git`:
   ```sh
   zip -r robendi.zip . -x "_legacy_react/*" ".git/*" ".DS_Store"
   ```
2. **Upload** to Hostinger via the File Manager → `public_html/`. Extract there. The folder layout under `public_html/` should look like `index.php`, `.htaccess`, `config/`, `src/`, `templates/`, `vendor/`, `data/`, `uploads/`.
3. **Permissions** (only if installer fails): `data/` and `uploads/` need to be writable by PHP. Hostinger defaults usually work; otherwise set to `775`.
4. **Run the installer:** visit `https://robendi.com/install.php`. Pick site name (`robendi.com`), admin email, password.
5. **Done.** Public site at `/`, admin at `/admin`.

## Content management

After install, log in to `/admin` and add content into these collections:

| Collection | Where it shows | Notes |
|---|---|---|
| **Pages**       | `/{slug}`         | Static pages — about, uses, etc. Use slug `home` to override the homepage entirely. |
| **Projects**    | `/projects`, `/projects/{slug}` | Portfolio entries. Featured projects also live in `home.twig` (hardcoded for design control). |
| **Blog Posts**  | `/blog`, `/blog/{slug}` | Long-form writing. Recent 4 surface on the homepage. |
| **News & Press**| `/news`, `/news/{slug}` | Articles *about* you — press, interviews, features. |
| **Contact**     | form on home `/#contact` | Submissions land in `/admin/forms/contact`. |
| **Newsletter**  | form on home (newsletter section) | Email captures land in `/admin/forms/newsletter`. Export to your email tool when ready. |

Edit collections in `config/collections.php`. Edit the look in `templates/theme/default/`.

## Local dev

```sh
# Built-in PHP server (no Composer / no Node needed — vendor/ is shipped)
php -S localhost:8080 -t . index.php
# Then visit http://localhost:8080/install.php
```

## Repo layout

```
index.php            # front controller
install.php          # first-run installer
.htaccess            # rewrites + security
config/              # app.php (site settings) + collections.php (content shape)
templates/
  admin/             # admin UI — don't edit
  theme/default/     # the public-facing site — edit freely
src/                 # Pebblestack framework — don't edit
data/                # SQLite db + migrations (writable, gitignored)
uploads/             # media library (writable, gitignored)
vendor/              # Composer deps (shipped — no install step)
_legacy_react/       # archived previous React/Vite version of robendi.com
```

## Editing the theme

Everything visual is in `templates/theme/default/`. Each template extends `layout.twig`, which holds the global head, fonts, design tokens (CSS variables in `:root`), the animated canvas background, the nav, and the footer.

To rebrand globally: change the CSS variables in `layout.twig`'s `<style>` block (e.g. `--accent`, `--gradient`, `--ink-0`).

## License

MIT.
