# 🏠 EasyColoc — Roommate Expense Management Platform

> A full-stack web application to manage shared living expenses — track costs, auto-calculate debts, and know exactly who owes what to whom. No more manual calculations or conflicts.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP%208.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white)

---

## ✨ Features

### 🔐 Authentication & Roles
- Registration and login via Laravel Breeze
- **First registered user** is automatically promoted to **Global Admin**
- Three roles: `Global Admin`, `Owner`, `Member`
- Banned users are auto-disconnected and blocked from all access

### 🏘️ Colocation Management
- Create a colocation (creator becomes Owner automatically)
- Invite members via unique email token
- Accept or decline invitations
- **One active colocation per user** — enforced at creation and invitation
- Owner can remove members or cancel the colocation
- Members can leave freely (except Owner)

### 💸 Expense Tracking
- Add shared expenses (title, amount, date, category, payer)
- Full expense history per colocation
- Filter expenses by month
- Statistics by category and month
- Delete expenses

### 📊 Balance & Debt Calculation
- Auto-calculates each member's balance: `total paid − individual share`
- Simplified settlement view: **"who owes what to whom"**
- Debt reduction by recording payments ("Mark as paid")
- Balances recalculate instantly on every change

### ⭐ Reputation System
- **+1** when leaving or colocation cancelled with no debt
- **−1** when leaving or colocation cancelled with outstanding debt
- Special rule: if Owner removes a member with debt, the debt is transferred to the Owner

### 🛡️ Global Admin Dashboard
- Platform-wide statistics: users, colocations, total expenses
- Ban / unban users
- View all active and cancelled colocations

---

## 👥 Actors & Roles

| Role | Permissions |
|---|---|
| **Member** | View colocation, add expenses, mark payments, leave |
| **Owner** | All Member actions + invite/remove members, manage categories, cancel colocation |
| **Global Admin** | Platform stats, ban/unban users — can also be Owner or Member |

---

## 🗄️ Database Schema

| Table | Description |
|---|---|
| `users` | Auth + global admin flag + reputation score |
| `colocations` | Colocation info, status (active/cancelled) |
| `memberships` | Pivot: user ↔ colocation, role, joined_at, left_at |
| `invitations` | Token-based invitations with status |
| `expenses` | Amount, payer, date, category |
| `categories` | Expense categories per colocation |
| `payments` | Settlement records between two members |

---

## 🛠️ Tech Stack

| Technology | Usage |
|---|---|
| Laravel 11 | MVC framework, routing, Eloquent ORM |
| PHP 8.2+ | Backend logic, business rules |
| MySQL | Relational database |
| Laravel Breeze | Authentication scaffolding |
| Blade | Server-side templating |
| TailwindCSS | Responsive UI |
| Vite | Asset bundling |
| PHPUnit | Automated testing |

---

## 🚀 Getting Started

```bash
git clone https://github.com/lioubiarabi/EasyColoc.git
cd EasyColoc
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`, then:

```bash
php artisan migrate --seed
php artisan serve
```

Open `http://localhost:8000`

> 💡 The **first account you register** will automatically become the Global Admin.

### Test Credentials (after seeding)
```
Admin:   admin@easycoloc.ma  / password
Owner:   owner@easycoloc.ma  / password
Member:  member@easycoloc.ma / password
```

---

## 📐 Key Business Rules

- A user can only be in **one active colocation** at a time
- Invitations are **email-bound** — the invited email must match the registering user
- Owner cannot leave — they must cancel the colocation or transfer ownership
- Cancelling with unpaid debts applies reputation penalties to concerned members
- If an owner removes a member with debt → the debt is reassigned to the owner
- Cancelled bookings within 24h of event → 50% refund policy

---

## 📄 Documentation

All UML diagrams are in the `docs/` folder:
- **Use Case Diagram** — 3 actors, full interaction map
- **Class Diagram** — domain model with relations
- **ERD** — full database schema

---

## 🎯 Project Context

Built at **Youcode** as a 5-day sprint (Feb 23–27, 2026). The goal: replace the chaos of WhatsApp debt tracking and manual splits with a clean, role-based web application that auto-calculates who owes what to whom in real time.

---

## 💡 What I Learned

- Designing complex role systems (3 actor types, overlapping permissions)
- Token-based invitation flows with email validation
- Automatic debt calculation and settlement simplification algorithms
- Eloquent `belongsToMany` with pivot table attributes (`role`, `left_at`)
- Form Request validation and server-side authorization policies
- Protecting routes based on role with Laravel middleware
- Building an admin moderation dashboard

---

## 👤 Author

**Lioubi Arabi** — Youcode Web Development Student  
[![GitHub](https://img.shields.io/badge/GitHub-lioubiarabi-181717?style=flat-square&logo=github)](https://github.com/lioubiarabi)

---

*Because "who paid for the wifi last month?" should never start an argument again 🏠*
