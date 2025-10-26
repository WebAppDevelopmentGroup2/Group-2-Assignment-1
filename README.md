Online Student Grading Portal (Group 2)

PROJECT OVERVIEW
This is a simple Online Grading Portal built using PHP and MySQL.  
It allows lecturers to:
- Add student grades  
- Automatically calculate GPA points  
- View all grades and filter by student or course  
- Check each student’s GPA in real time  


DATABASE SETUP

1. Open phpMyAdmin or MySQL terminal.  
2. Create a new database:
   ```sql
   CREATE DATABASE grading_portal;
   USE grading_portal;
   ```
3. Create the following tables:

   ```sql
   CREATE TABLE students (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL
   );

   CREATE TABLE courses (
       id INT AUTO_INCREMENT PRIMARY KEY,
       course_code VARCHAR(10) NOT NULL,
       course_title VARCHAR(100) NOT NULL,
       credit_unit INT NOT NULL,
       semester VARCHAR(20) NOT NULL
   );

   CREATE TABLE grades (
       id INT AUTO_INCREMENT PRIMARY KEY,
       student_id INT NOT NULL,
       course_code VARCHAR(10) NOT NULL,
       score DECIMAL(5,2) NOT NULL,
       grade VARCHAR(2),
       gpa_point DECIMAL(3,2),
       FOREIGN KEY (student_id) REFERENCES students(id)
   );
   ```


CONFIGURATION

Edit `db_connect.php` and set your MySQL credentials:
```php
$host = "localhost";
$user = "root";
$pass = "";  // leave blank unless you set a password
$db = "grading_portal";
$port = 3307; // custom MySQL port
```


 HOW TO RUN

1. Place your project folder `grading_portal` in:
   C:\xampp\htdocs\
2. Start Apache and MySQL from the XAMPP Control Panel.  
3. Open your browser and visit:
   ```
   http://localhost/grading_portal/index.php
  
4. Use the pages to:
   - Add grades  
   - View grades and GPA by student or course    



🧑‍💻 Group Members
| Name | Matric No |

| Ogholoh Omosoria Diamond  | 23/1085 | -Backend & Frontend (db_connect, add_grade, gpa_calc, index.php, style.css, grading_portal.sql)

| Shedrack Clinton Prince | 23/2225 | - Frontend(viewGrade)
| Okwuchi Lucky Loretta | 23/1636| - Documentation(Readme.md)


👩‍💻 Developer
Project Lead: Ogholoh Omosoria Diamond
Language: PHP, HTML, CSS  
Database: MySQL

Assignment Details: 
Assignment 1
Group 2 


## 🔗 Repository Link
https://github.com/WebAppDevelopmentGroup2/Group-2-Assignment-1
