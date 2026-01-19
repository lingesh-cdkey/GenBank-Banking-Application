CREATE DATABASE genbank;
USE genbank;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  account_no VARCHAR(20) UNIQUE,
  password VARCHAR(100),
  balance DECIMAL(10,2) DEFAULT 0
);

CREATE TABLE transactions (
  txn_id INT AUTO_INCREMENT PRIMARY KEY,
  account_no VARCHAR(20),
  txn_type VARCHAR(20),
  amount DECIMAL(10,2),
  txn_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, account_no, password, balance)
VALUES ('Lingesh', 'GB1001', '1234', 50000);
