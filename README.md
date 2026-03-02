# 🏠 Splitmate - Apartment Expense Manager

**Splitmate** is a specialized web application built with **Laravel 12** designed to simplify shared living. It helps roommates track expenses, manage apartment settings, and handle settlements, all while providing a robust administration layer for platform oversight.



## ✨ Key Features

### 👥 User Management & Security
* **Automatic Admin Assignment**: The first user to register on the platform is automatically granted the `admin` role.
* **Ban System**: Admins can suspend (ban) and unsuspend users in real-time.
* **CheckBanned Middleware**: A security layer that instantly logs out and blocks access for any user with an inactive status.

### 🏢 Apartment Management
* **Role-Based Access (RBAC)**: 
    * **Owner**: The creator of the apartment. Has full control over settings, invitations, and deletion.
    * **Member**: Participants who can view and contribute to apartment expenses.
* **Active/Left Status**: Track whether a user is currently living in the apartment or has moved out, preserving historical financial data.
* **Custom Blade Directives**: Clean UI logic using `@admin` and `@owner($apartment)` tags to toggle visibility of sensitive actions.

### 📊 Dashboard & UI
* **Admin Panel**: A centralized place to search for users by name or email and manage their global access.
* **Responsive Design**: Built with Tailwind CSS for a modern, mobile-friendly experience.

## 🛠️ Technical Stack

* **Framework**: Laravel 12.x
* **Frontend**: Blade Templates & Tailwind CSS
* **Language**: PHP 8.3+
* **Database**: MySQL
* **Auth**: Custom logic with Middleware protection

## 🚀 Installation Guide

Follow these steps to get your local development environment running:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/mohamed-bouth/SplitMate.git
   cd splitmate
