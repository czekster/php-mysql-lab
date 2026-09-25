-- Runs automatically the FIRST time the database starts.
-- To re-run: delete the codespace and create a new one.

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL   -- plain text ON PURPOSE (bad practice demo)
);

INSERT INTO users (username, password) VALUES
  ('admin', 'SuperSecret123'),
  ('alice', 'password1'),
  ('bob',   'qwerty');

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(8,2) NOT NULL
);

INSERT INTO products (name, price) VALUES
  ('Keyboard', 24.99), ('Mouse', 12.50), ('Monitor', 149.00);
