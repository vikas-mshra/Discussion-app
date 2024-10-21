# Discussion Forum Application

This project is a **Discussion Forum Application** built using **PHP**, **MySQL**, and **Apache Tomcat** server, running on **XAMPP**. The application allows users to ask questions, provide answers, and engage in meaningful discussions, much like platforms such as StackOverflow.

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation Guide](#installation-guide)
- [Folder Structure](#folder-structure)
- [Usage](#usage)
- [Database Setup](#database-setup)
- [Contact](#contact)

## Project Overview

The **Discussion Forum Application** is designed to provide a platform where users can:
- Sign up and log in to their accounts.
- Post questions on different topics.
- Answer questions posted by other users.
- View categories and filter questions by category.
- Engage in meaningful discussions by adding answers to questions.

The application stores user information and questions/answers in a MySQL database, and uses PHP for server-side processing, including handling requests such as signups, logins, and storing questions/answers.

## Features

1. **User Authentication**: Users can register and log in to their accounts.
2. **Ask Questions**: Authenticated users can post questions categorized by topic.
3. **Answer Questions**: Users can post answers to questions and contribute to ongoing discussions.
4. **Category Browsing**: Questions are organized by categories, allowing users to easily navigate different topics.
5. **Responsive Design**: The frontend is designed with responsiveness in mind, using basic CSS for styling.

## Prerequisites

Before you begin, ensure you have the following installed:

- **XAMPP** (for Apache, PHP, and MySQL)
- **PHP 7.x+**
- **MySQL 5.x+**
- **Apache Tomcat** (if required for server-specific functionalities)

## Installation Guide

### Step 1: Set Up XAMPP
1. Download and install [XAMPP](https://www.apachefriends.org/index.html).
2. Once installed, open the XAMPP Control Panel and start **Apache** and **MySQL** services.

### Step 2: Clone/Download the Project
1. Download the project as a ZIP file and extract it to the `htdocs` folder of your XAMPP installation directory (usually `C:\xampp\htdocs` on Windows).
   - The folder structure should be something like `C:\xampp\htdocs\Discussion-app`.

### Step 3: Set Up the Database
1. Open **phpMyAdmin** by visiting [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Create a new database named `discuss`.
3. Import the provided SQL file (if available) or manually create the required tables by referring to the code in `common/db.php` and `server/requests.php`.

### Step 4: Configure Database Connection
1. Open `common/db.php`.
2. Ensure that the database connection parameters (host, username, and password) match your MySQL setup. For example:
    ```php
    $host = "localhost";
    $username = "root";
    $password = "";  // Default for XAMPP, change if required
    $database = "discuss";
    ```

### Step 5: Running the Application
1. After setting up the database and configuring the connection, you can access the application by visiting:
   - [http://localhost/Discussion-app](http://localhost/Discussion-app)

## Folder Structure

Here’s a quick look at the main directories and files in the project:

- **index.php**: The main landing page for the application.
- **/server/requests.php**: Handles server-side logic, including form submissions like adding questions or answers.
- **/common/db.php**: Manages database connection using MySQL.
- **/public/**: Contains static assets such as the logo (`logo.png`) and the main stylesheet (`style.css`).
- **/client/**: Contains all the PHP views like login, signup, categories, etc.:
  - `login.php`: Handles user login.
  - `signup.php`: Handles user registration.
  - `category.php`, `categorylist.php`: Manage categories.
  - `ask.php`: Form for asking a new question.
  - `questions.php`: Displays a list of questions.
  - `answer.php`: Handles answering questions.
  - `question-details.php`: Shows question details and its answers.
  - `header.php`: Common header/navigation.

## Usage

1. **Sign Up**: New users can sign up by clicking the **Sign Up** link in the navigation bar.
2. **Log In**: Existing users can log in by clicking **Login**.
3. **Ask Questions**: After logging in, users can ask questions by filling out the **Ask Question** form.
4. **Answer Questions**: Users can view detailed questions and post answers.
5. **Browse Categories**: Users can filter questions by category to explore specific topics.

## Database Setup

The application uses a **MySQL database**. Here's a basic structure of the required tables:

1. **users**: Stores user information like username, email, password, etc.
   - `id`, `username`, `email`, `password`, `address`, etc.
   
2. **questions**: Stores questions asked by users.
   - `id`, `title`, `content`, `user_id`, `category_id`, `created_at`, etc.

3. **answers**: Stores answers to the questions.
   - `id`, `answer`, `question_id`, `user_id`, `created_at`, etc.

## Contact

For any issues, feel free to reach out to the project owner via email: `vikas.mishra0796@gmail.com`.
