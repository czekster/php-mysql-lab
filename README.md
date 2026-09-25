# Three-Tier Web App Starter Kit

A minimal Apache + PHP + MariaDB stack for coursework. One command, no local
install of PHP/MySQL/Apache needed — Docker runs all three tiers for you.

## The three tiers, mapped to containers

| Tier | Container | Role |
|---|---|---|
| Presentation | *(your browser)* | Renders the page, sends requests |
| Application | `web` (Apache + PHP) | Runs your code, talks to the database |
| Data | `db` (MariaDB) | Stores and retrieves data |

`phpmyadmin` is a fourth container included purely as a dev convenience for
inspecting the database in a browser — it isn't one of the three tiers.

## Option A — GitHub Codespaces (no install, works on university PCs)

[![Open in GitHub Codespaces](https://github.com/codespaces/badge.svg)](https://codespaces.new/czekster/php-mysql-lab)

1. Click the button above → **Create codespace**. Wait 2–3 minutes the first time.
2. Your app opens in a new tab. If it doesn't: **Ports** tab (bottom of the screen) → globe icon next to **App (8080)**.
3. phpMyAdmin: **Ports** tab → globe icon next to **phpmyadmin**.
4. Edit files in `src/`, save, refresh the browser tab. That's it.

Tips:
- At [github.com/codespaces](https://github.com/codespaces), click **⋯** next to your codespace and untick **Auto-delete codespace** so your work isn't removed after a period of inactivity.
- Backup (optional): **⋯ → Publish to a new repository**.
- Saving, backing up and submitting: see **How your work is saved** below.
- Free allowance: 60 h/month on a normal GitHub account, 90 h/month if you verify as a student at [education.github.com](https://education.github.com). Delete codespaces you no longer need.

### How your work is saved

1. **Your work lives in your codespace.** Save with **Ctrl+S** (Cmd+S on Mac). Everything stays there between sessions; reopen it any time from [github.com/codespaces](https://github.com/codespaces).
2. **Keep it from being deleted.** At [github.com/codespaces](https://github.com/codespaces), click **⋯** next to your codespace and **untick Auto-delete codespace**. Otherwise it's removed after a period of not being used.
3. **Your changes never go to the lecturer's repository.** Nothing you do can break the original project.
4. **Back up to your own GitHub (recommended):**
   - Once: **⋯ → Publish to a new repository**. Choose **Private** so other students can't see your work.
   - Each time you want a safe copy: click the **Source Control** icon on the left bar, type a short message (e.g. `login page done`), click **Commit**, then **Sync Changes**.
   - If your codespace is ever deleted, open your own repository → **Code → Codespaces → +** and carry on.
5. **Submitting:** right-click the `src` folder in the file list → **Download…** and choose where to save it on your computer. Zip that folder and upload it to Blackboard.

### Don't run out of free hours

You get 60 free hours a month (90 if you verify as a student). You can't be charged, but if you run out, Codespaces is blocked until the 1st of next month, so don't get caught near a deadline.

1. **Verify as a student** at [education.github.com](https://education.github.com) to get 90 hours instead of 60.
2. **Stop your codespace when you finish.** Closing the tab isn't enough: go to [github.com/codespaces](https://github.com/codespaces) → **⋯** → **Stop codespace**.
3. **Lower the idle timeout.** GitHub **Settings → Codespaces → Default idle timeout**, set it to **15 minutes**.
4. **Use the 2-core machine** (the default). Bigger machines use your hours 2–4× faster.
5. **Keep just one codespace.** Delete old ones. Stopped codespaces still use your storage allowance.
6. **Check your usage:** GitHub **Settings → Billing and licensing → Usage**. GitHub also emails you at 75%, 90% and 100%.

Ran out anyway? Your work is safe and comes back when the quota resets. If you have Docker at home, Option B below runs the same project.

## Option B — Docker on your own machine

Use this if you have Docker installed at home. Everything below applies to Option B.

## TL;DR — full sequence

If you just want the checklist with nothing else, here it is start to finish.
Every step is explained in more detail further down if something breaks.

1. Install Git (see **Prerequisites** below for your OS)
2. Install Docker Desktop (see **Prerequisites** below)
3. Open a terminal and go to a folder on your machine, e.g. `cd C:\tmp` (Windows) or `cd /tmp` (Linux)
4. `git clone https://github.com/czekster/php-mysql-lab.git`
5. `cd php-mysql-lab`
6. `copy .env.example .env` (Windows) or `cp .env.example .env` (Linux) — the defaults work as-is
7. Start Docker Desktop and wait for it to finish loading
8. `docker compose up --build` (only needs `--build` the very first time)
9. Open **http://localhost:8080** (your app, includes a link to the teaser) and **http://localhost:8081** (phpMyAdmin)

## Prerequisites: installing Git and Docker

You need two things installed before Quickstart works: **Git** and
**Docker Desktop** (or Docker Engine on Linux). Pick your OS below.

### Windows

1. **Install Git** — download from [git-scm.com](https://git-scm.com/downloads) and accept the defaults.
2. **Install Docker Desktop** — download from [docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop) and accept the defaults. If it asks you to enable WSL2, let it — reboot when prompted.

That's it. Launch Docker Desktop once and wait for the whale icon in the
system tray to stop animating before moving on to Quickstart.

If Docker Desktop refuses to start, the most common cause is hardware
virtualization being disabled in BIOS/UEFI — check Task Manager →
Performance → CPU → it should say "Virtualization: Enabled".

### GNU/Linux (Ubuntu / Debian)

1. **Install Git:**
   ```bash
   sudo apt update && sudo apt install -y git
   ```

2. **Install Docker Engine + Compose plugin** via Docker's official
   repository — the version shipped by default in Ubuntu/Debian repos
   (`docker.io`) is usually outdated, so don't use that:
   ```bash
   sudo apt-get update
   sudo apt-get install -y ca-certificates curl
   sudo install -m 0755 -d /etc/apt/keyrings
   sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
   sudo chmod a+r /etc/apt/keyrings/docker.asc
   echo \
     "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
     $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
     sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
   sudo apt-get update
   sudo apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
   ```
   (Swap `ubuntu` for `debian` in both URLs above if you're on Debian.)

3. **Let Docker run without `sudo`** (optional but recommended):
   ```bash
   sudo usermod -aG docker $USER
   ```
   Then log out and back in (or run `newgrp docker`) for it to take effect.

4. **Verify both are working:**
   ```bash
   git --version
   docker run hello-world
   docker compose version
   ```

On Fedora/RHEL/other distros, swap the `apt` steps for the equivalent `dnf`
instructions at
[docs.docker.com/engine/install](https://docs.docker.com/engine/install/) —
the Git and post-install steps are the same either way.

## Quickstart (for MS-Windows)

- Start Docker Desktop
- Click Windows key, followed by run "Git CMD"

```bash
git clone https://github.com/czekster/php-mysql-lab.git
cd php-mysql-lab
copy .env.example .env          # the default values work out of the box
docker compose up --build -d    # -d means it will run "detached"
```

Then open:
- **http://localhost:8080** — your app (`src/index.php`)
- **http://localhost:8080/teaser/** — a working login + results page, see `src/teaser/README.md`
- **http://localhost:8081** — phpMyAdmin

## Stopping, resuming, and resetting

You will need these commands regularly — not just on first setup.

| When | Command | What happens to your data |
|---|---|---|
| Pausing for the day, closing your laptop | `docker compose down` | Kept — your database and code are untouched |
| Resuming later (next session, after a reboot) | `docker compose up -d` | Picks up right where you left off |
| Your database is in a broken/weird state and you want a clean slate | `docker compose down -v` | **Wiped** — `-v` deletes the database volume too |
| You changed `web/Dockerfile` (e.g. added a PHP extension) | `docker compose up -d --build` | Kept — only rebuilds the image, not the data |
| Just editing `.php` files in `src/` | Nothing — save and refresh your browser | N/A — no restart needed at all |

The `-d` flag runs containers in the background so your terminal is free to
use; drop it (`docker compose up`) if you want to watch the logs stream live,
which is often useful while debugging.

## Logging into phpMyAdmin

You won't be asked for a username or password — phpMyAdmin is configured to
log you in automatically as the `student` database user (that's what
`PMA_USER`/`PMA_PASSWORD` in `docker-compose.yml` do). It's still real
authentication against MariaDB under the hood, just without a form to fill
in.

Once you're in, use it to create tables, run queries, and inspect data while
you build, instead of writing raw SQL from the command line.

*Security note: both `web` (8080) and `phpmyadmin` (8081) are bound to
`127.0.0.1` only — reachable from your own machine, not from other devices
on your network, regardless of firewall settings. Don't remove the
`127.0.0.1:` prefix from the ports in `docker-compose.yml` unless you
specifically need to reach this from another device.*

## Working on your app

Everything in `src/` is live-mounted into the `web` container — edit a `.php`
file, save, refresh the browser. No rebuild, no restart. See the table above
for the handful of cases where you *do* need to run a command.

## Next steps

Once `docker compose up --build` is running and both pages load:

1. **Design your schema in phpMyAdmin.** Create the tables your app needs —
   see the login above. This is faster than writing `CREATE TABLE` by hand.
2. **Edit `src/index.php` and add more `.php` files as you build out your
   app.** Everything in `src/` is live — save a file, refresh the browser,
   see the change. No rebuild step for code changes.
3. **Connect to the database from your own PHP files** the same way
   `src/index.php` does — host is always `db` (the service name from
   `docker-compose.yml`), not `localhost`, since your code runs *inside* the
   `web` container talking to another container.

---

*Note for instructors: this repo only references public images (`php`,
`mariadb`, `phpmyadmin` from Docker Hub) plus one small custom `Dockerfile` —
nothing needs pre-building or hosting on your own infrastructure. If you
later want a fully pre-built custom image (e.g. for an offline/exam
environment with no internet access), push one to GitLab's built-in
Container Registry instead — that adds a rebuild-and-push step on every
update, so it's only worth it if you specifically need offline access.*