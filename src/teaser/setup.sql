-- Paste this into phpMyAdmin (http://localhost:8081) → app_db → SQL tab → Go.
-- Safe to re-run any time — drops and recreates the table from scratch.

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id   INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
);

INSERT INTO users (user, pass) VALUES ('alice', 'password123');
