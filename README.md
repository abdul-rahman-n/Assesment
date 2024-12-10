# Laravel Assesment

This project is a Laravel-based web application with user authentication, profile editing, address management, and a dashboard. The application uses Laravel's built-in authentication scaffolding, CRUD operations, and RESTful routes for managing user profiles and addresses.

The project is designed with modularized functionality, following Laravel's best practices, and has a modern and user-friendly front-end with Bootstrap 5.


## Project Features
- **User Authentication**: 
    **Login**
    **Registration**
    **Logout functionality**
- **User Dashboard**: 
    **Displays user information**
    **Shows profile data (father's name & mother's name)**
    **Displays address information with CRUD functionality**
- **Profile Management**: 
    **Allows users to edit their father’s name and mother’s name**
    **Displays updated values on the dashboard**
- **Address Management**: 
    **Users can Add or Edit addresses**
    **Users can Add or Edit addresses**
    **Logout functionality**
- **Responsive UI**: 
    **Designed using Bootstrap 5 for a clean, user-friendly, and responsive interface**

## Requirements
- PHP 8.0+
- Laravel 8.0+
- Composer
- MySQL or any other supported database
- Bootstrap 5

## Installation

### 1. Clone the Repository

Clone the project from GitHub:

```bash

git clone git@github.com:abdul-rahman-n/Assesment.git
cd Assesment

```


### 2. Install Dependencies

Run the following command to install the project dependencies:

```bash

composer install

```


### 3. Set Up Environment Variables

Copy the .env.example file to .env:

```bash

cp .env.example .env

```

Open the .env file and set up your database configuration:

```env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

```

### 4. Generate Application Key

Generate the Laravel application key:

```bash

php artisan key:generate

```


### 5. Run Migrations

Run the database migrations to create the necessary tables:

```bash

php artisan migrate

```


## Usage

### 1. Start the Development Server

Start the Laravel development server:

```bash

php artisan serve

```

The application will be available at http://localhost:8000.


### 2. How to Use
- **Register a new account from the registration page (/register) or log in if you already have one**
- **After logging in, you'll be redirected to the Dashboard.**
- **From there, you can:**:
    **View and edit your profile information.**
    **Manage addresses.**
    **Log out from the dashboard using the logout button on the top right corner.**

## Routes

### Authentication Routes

```bash

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

```

### Dashboard & Profile Routes

```bash

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});

```

### Address Management Routes

```bash

Route::middleware('auth')->group(function () {
    Route::get('addresses/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('addresses', [AddressController::class, 'store'])->name('address.store');
    Route::get('addresses/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('addresses/{id}', [AddressController::class, 'update'])->name('address.update');
});


```