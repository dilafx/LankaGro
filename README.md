# LankaGro - Agricultural Management Platform

LankaGro is a comprehensive web platform built with Laravel and Livewire, designed to serve as a central hub for agricultural information. It features a powerful admin dashboard for managing content and a public-facing site for farmers and visitors to access news, events, and agricultural solutions.


<img width="1917" height="881" alt="Screenshot 2025-11-07 222456" src="https://github.com/user-attachments/assets/ab51d413-aa6c-4d5d-8324-e16c777f9528" />

## About The Project

This project is an agricultural portal that provides valuable resources to farmers. It separates concerns between administrators, who manage the site's content, and the public users, who consume it. The admin panel is built as a single-page application (SPA) experience using Livewire components, while the public site serves information dynamically from the database.

## Key Features

### Admin Panel (Admin / Super Admin)

* **Secure Dashboard:** A central dashboard with at-a-glance statistics for users, news, events, and other content.
* **Role-Based Access Control (RBAC):**
    * **Super Admin:** Can manage other users and system settings (based on `IsSuperAdmin` middleware).
    * **Admin:** Can manage all content modules (based on `IsAdmin` middleware).
* **Content Management (CRUD):** Full Create, Read, Update, and Delete functionality for:
    * News Articles
    * Events
    * Tutorials
    * Crop Solutions
* **User Management:** Admins can view, create, edit, and delete users.

### Public User/Guest Site

* **Homepage:** Displays highlights, latest news, and upcoming events.
* **News & Articles:** View published news articles (read-only).
* **Events:** Browse upcoming events and register as a guest (no account needed).
* **Tutorials:** Access video and text-based guides.
* **Crop Solutions:** Find solutions to common farming problems, categorized by crop and problem type.
* **Static Pages:** "About Us" and "Contact Us" pages.

## Technology Stack

* **Backend:** Laravel, Livewire 3 (Volt)
* **Frontend:** Tailwind CSS, Blade
* **Database:** MySQL

## Getting Started

Follow these instructions to get a local copy up and running for development and testing.

### Prerequisites

* PHP (>= 8.2)
* Composer
* Node.js & npm
* A local database server (e.g., MySQL)

### Installation

1.  **Clone the repository:**
    ```sh
    git clone (https://github.com/dilafx/LankaGro.git)
    cd LankaGro
    ```

2.  **Install PHP dependencies:**
    ```sh
    composer install
    ```

3.  **Install JavaScript dependencies:**
    ```sh
    npm install
    ```

4.  **Set up your environment file:**
    ```sh
    cp .env.example .env
    ```

5.  **Generate an application key:**
    ```sh
    php artisan key: generate
    ```

6.  **Configure your `.env` file:**
    Open the `.env` file and set up your database connection, primarily:
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lankagro
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Run database migrations:**
    This will create all the tables (users, news, events, tutorials, crop_solutions, etc.).
    ```sh
    php artisan migrate
    ```

8.  **Create the storage link:**
    This is crucial for making uploaded images (like for news and tutorials) publicly accessible.
    ```sh
    php artisan storage:link
    ```

9.  **Build assets and run the server:**
    Open two terminals.
    * In the first terminal, run the Vite development server:
        ```sh
        npm run dev
        ```
    * In the second terminal, run the Laravel server:
        ```sh
        php artisan serve
        ```

Your site should now be running at `http://127.0.0.1:8000`.

## Admin Access

To access the admin dashboard, you must assign an admin role to a user.

1.  Register a new user through the standard registration form on the site.
2.  Access your database (e.g., using phpMyAdmin or a tool like TablePlus).
3.  Open the `users` table.
4.  Find the user you just created.
5.  Change the value in the `role` column from `user` to `superadmin`.
6.  Log in with that user. You will now be redirected to the admin dashboard (`/admin/dashboard`) and have access to all management sections.
