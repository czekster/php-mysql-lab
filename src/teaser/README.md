# Teaser — Login + Results

> **In Codespaces:** use the **Ports** tab instead of the `localhost` links below
> (globe icon next to *phpMyAdmin* for the database, next to *App* for the app).

A minimal login flow: a form, a results page behind it, and one `users` table.

## Database

The `users` table is created automatically the first time the database starts
(MariaDB runs `setup.sql` on first launch).

Demo account: username `alice`, password `password123`

## Reset the table

phpMyAdmin → `app_db` → **SQL** tab → paste `setup.sql` → **Go**.

## Try it

Open **http://localhost:8080/teaser/** (or the *App* port in Codespaces) and log in.
