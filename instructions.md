# HealthMate Setup Guide

## Prerequisites

- XAMPP, WAMP, or similar local server environment
- Internet connection (required for CDN access)
- MySQL Database Server
- PHP 7.4 or higher


## Installation Steps


### 1. Database Setup
1. Open phpMyAdmin (or your preferred MySQL management tool)
2. Create a new database:
   ```sql
   CREATE DATABASE healthmate;
   ```
3. Select the newly created database
4. Click on "Import" in the top navigation
5. Choose the database file from the project folder
6. Click "Go" to import the database structure and data


### 2. Configure Port Settings
1. Open the `config.php` file in the project root
2. Locate the PORT configuration:
3. Replace `YOUR_PORT_NUMBER` with your local server port (typically 3306)


### 3. Project Deployment
1. Navigate to your web server's root directory
   - For XAMPP: `C:/xampp/htdocs/`
2. Create a new folder named "healthmate"
3. Copy all project files into this folder
4. Ensure the folder structure maintains "healthmate" as the root directory


### 4. Internet Connectivity
The project relies on several CDN services for:

- Tailwind CSS
- DataTables
- JQuery
- FontAwesome

Ensure you have a stable internet connection while using the application.


### 5. Verify Installation
1. Start your local server (Apache and MySQL)
2. Open your web browser
3. Navigate to: `http://localhost/healthmate`
4. You should see the HealthMate Login Page


## Troubleshooting
- If the database connection fails, verify your MySQL credentials in the config file
- If styles aren't loading, check your internet connection
- If the URL isn't working, ensure "healthmate" is the root folder name
- For port conflicts, try changing to an unused port number


## Ready to Go!
The application should now be running locally. Explore the features and start managing your health journey with HealthMate!
