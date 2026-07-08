# ENS2001 Website — AGENTS.md

## Project Overview

Static promotional/download site for **[ENS2001](https://github.com/falvarez/ens2001)**, an assembler and simulator for the IEEE 694 standard (academic CPU ISA). Bachelor's thesis project by F. Álvarez.

## Tech Stack

- **HTML5** + **CSS3** (Bootstrap 3, Grayscale theme, Font Awesome 4, self-hosted fonts)
- **JavaScript** (jQuery, Bootstrap JS, jQuery Easing)
- **Build**: esbuild via Docker (or OrbStack) + GNU `Makefile`
- **Deployment**: `git pull` on remote server, `public_html/` is the document root

## Directory Structure

```
├── Makefile              # Build / run automation
├── public_html/          # ★ Live site (edit here)
│   ├── index.html        # Main landing page (single-page, Spanish)
│   ├── changelog.html    # Full update history (2002–2026)
│   ├── cookies.html      # Cookie policy (zero tracking)
│   ├── css/              # Stylesheets + bundles
│   ├── js/               # Scripts + bundles
│   ├── img/              # Images
│   └── files/            # Downloadable assets (binaries, docs)
└── old/                  # ★ Historical PHP/MySQL site (DO NOT EDIT)
    ├── index.php         # (archival — DB missing, non-functional)
    └── admin/            # (archival — .htaccess protected)
```

## Build & Run Commands

| Command | Description |
|---|---|
| `make bundle` | Minify CSS/JS with esbuild (requires Docker or compatible) |
| `make run` | Serve `public_html/` on `localhost:8000` via nginx (requires Docker) |
| `make open` | Serve + open browser |
| `make clean` | Remove minified bundles |
| `make dev` | Open PhpStorm + serve + open browser |

## Coding Conventions

- **Language**: Spanish (ES)
- **Edit sources** in `public_html/css/` and `public_html/js/`, **never** the `bundle.min.*` files
- **After editing CSS/JS**, run `make bundle` to regenerate minified bundles
- **`old/` directory is read-only** — preserved as a historical archive; do not modify
- **No tracking / cookies** — do not add analytics, trackers, or external resources
- **License**: Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)

## Important Notes for AI Agents

- **No `package.json`** — do NOT run `npm install`, `npm audit`, etc.
- **No Node.js installed locally** — all JS tooling runs ephemerally in a container
- **`old/` has no database** — the MySQL DB is long gone; do not attempt to connect
- **Single `master` branch** — ~15 commits spanning 2016–2026
- **esbuild config** is embedded inline in the `Makefile` (no separate config file)
