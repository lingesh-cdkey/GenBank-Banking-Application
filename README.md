# 🏦 GenBank – Full Stack Banking Application

GenBank is a full-stack banking web application designed to simulate real-world
banking operations. The project focuses on secure account management, transaction
processing, and database integrity using modern web development practices.

This application was developed as an academic and portfolio project to demonstrate
full-stack development skills and database-driven system design.

---

## 🚀 Key Features

### 🔐 User Authentication
- Secure login system using account number and password
- Session management to protect unauthorized access
- Login activity tracking for security auditing

### 💰 Account Management
- Real-time balance display
- Account status control (ACTIVE / BLOCKED)
- Customer profile management

### 🔄 Transaction System
- Deposit money functionality
- Withdraw money with balance validation
- Automatic transaction history recording
- Balance snapshot stored after every transaction

### 📊 Transaction History
- Complete transaction log with date and status
- Supports financial audit and user tracking
- Sorted by most recent activity

---

## 🛠️ Technology Stack

### Frontend
- HTML5 – Structure
- CSS3 – Styling & layout

### Backend
- PHP – Server-side logic
- Session handling & form processing

### Database
- MySQL – Relational database
- Foreign keys & constraints
- Normalized schema design

---

## 🗂️ Database Design Overview

| Table Name     | Purpose |
|---------------|--------|
| users         | Stores customer and account details |
| transactions  | Records all deposits and withdrawals |
| login_logs    | Tracks login activity for security |

---

## 📁 Project Structure

