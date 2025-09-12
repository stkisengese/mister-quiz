# Mister Quiz

<p align="center">
  <img src="/public/images/mister_quiz.png" width="400" alt="Mister Quiz Logo">
</p>

Mister Quiz is a web-based quiz game inspired by "Who Wants to Be a Millionaire?". It allows users to register, test their knowledge across various categories, and compete for a spot on the leaderboard. This project is built with PHP and the Laravel framework.

## Features

- **User Authentication:** Users can register for an account and log in to play.
- **Quiz Gameplay:** Logged-in users can start a quiz with questions from multiple categories (Art, History, Geography, Science, Sports). The application saves progress, allowing users to refresh the page or come back later to finish a quiz.
- **Scoring and XP:** Users earn XP for correct answers, which contributes to their rank.
- **User Profiles:** Each user has a profile page displaying their username, email, total XP, rank, and detailed stats on their performance in each category.
- **Leaderboard:** A public leaderboard showcases the top 10 players based on their total XP.

## Tech Stack

- **Backend:** PHP 8+ with Laravel 10
- **Frontend:** Blade templates, CSS, and JavaScript
- **Database:** MySQL/sqlite3

## Getting Started

Follow these steps to get the project up and running on your local machine.

### 1. Clone the Repository
```bash
git clone https://github.com/stkisengese/mister-quiz.git
cd mister-quiz
```

### 2. Install Dependencies
Install both Composer (PHP) and Node.js dependencies.
```bash
composer install
npm install
```

### 3. Set Up Environment
Create your environment file and generate an application key.
```bash
cp .env.example .env
php artisan key:generate
```
Next, open the `.env` file and configure your database connection details (DB_DATABASE, DB_USERNAME, DB_PASSWORD). The recommended database name is `mister_quiz`.

### 4. Set Up the Database
Make sure you have a MySQL server running. Create a database for the project.
```sql
CREATE DATABASE mister_quiz;
```

### 5. Run Migrations and Seed Data
Run the database migrations to create the necessary tables.
```bash
php artisan migrate
```
To populate the database with questions and answers, you can use the provided SQL file. You can import `questions_and_answers.sql` into your `mister_quiz` database using a tool like phpMyAdmin or the command line.

> **Note:** A dump file with questions and answers is available [here](https://assets.01-edu.org/mister-quiz/questions_and_answers.sql).

### 6. Compile Frontend Assets
```bash
npm run dev
```

### 7. Serve the Application
```bash
php artisan serve
```
The application will be available at `http://127.0.0.1:8000`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).