-- ==============================
-- GenBank Database Schema
-- ==============================

CREATE DATABASE IF NOT EXISTS genbank;
USE genbank;

-- ==============================
-- Users Table (Account Holders)
-- ==============================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    account_no VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance DECIMAL(12,2) DEFAULT 0.00,
    account_status ENUM('ACTIVE','BLOCKED') DEFAULT 'ACTIVE',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==============================
-- Transactions Table
-- ==============================
CREATE TABLE transactions (
    txn_id INT AUTO_INCREMENT PRIMARY KEY,
    account_no VARCHAR(20) NOT NULL,
    txn_type ENUM('DEPOSIT','WITHDRAW') NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    balance_after DECIMAL(12,2) NOT NULL,
    txn_status ENUM('SUCCESS','FAILED') DEFAULT 'SUCCESS',
    txn_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (account_no) REFERENCES users(account_no)
);

-- ==============================
-- Login Activity Table (Security)
-- ==============================
CREATE TABLE login_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    account_no VARCHAR(20),
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(50),
    login_status ENUM('SUCCESS','FAILED')
);

-- ==============================
-- Sample User Data
-- ==============================
INSERT INTO users 
(name, email, phone, account_no, password, balance)
VALUES
('M Lingesh', 'lingesh@gmail.com', '9876543210', 'GB1001', '1234', 50000.00);

-- ==============================
-- Sample Transactions
-- ==============================
INSERT INTO transactions
(account_no, txn_type, amount, balance_after)
VALUES
('GB1001', 'DEPOSIT', 10000.00, 60000.00),
('GB1001', 'WITHDRAW', 5000.00, 55000.00);
