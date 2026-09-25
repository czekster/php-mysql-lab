# Teaser — Login + Results

> **In Codespaces:** use the **Ports** tab instead of the `localhost` links below
> (globe icon next to *phpmyadmin* for the database, next to port *80* for the app).

A minimal login flow: a form, a results page behind it, and one `users`
table.

## Set up the database (one-time)

1. Open phpMyAdmin at **http://localhost:8081** (no login needed — see main
   README).
2. Select the `app_db` database on the left.
3. Go to the **SQL** tab, paste the contents of `setup.sql`, click **Go**.

That creates the `users` table and adds one demo account:

```
Username: alice
Password: password123
```

## Try it

Open **http://localhost:8080/teaser/** and log in with the demo account.
