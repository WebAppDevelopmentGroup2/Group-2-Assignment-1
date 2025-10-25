# Student Grading Portal (Group 2)

## Project Overview
This is a simple web-based Grading Management System built using PHP and MySQL.  
It allows lecturers to:
- Add student grades  
- Automatically calculate GPA points  
- View all grades and filter by student or course  
- Check each student’s GPA in real time  


---

## 📁 Folder Structure
```
grading_portal/
│
├── add_grade.php         # Add new student grades
├── viewGrade.php       # View and filter all grades
├── gpa_calc.php          # GPA calculation function
├── db_connect.php        # MySQL database connection
├── style.css             # Styling for all pages
└── README.md             # Project documentation
```

---

## 🧱 Database Setup

1. Open **phpMyAdmin** or MySQL terminal.  
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

---

## ⚙️ Configuration

Edit `db_connect.php` and set your MySQL credentials:
```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "grading_portal";
```

---

## 🚀 How to Run

1. Place your project folder `grading_portal` in:
   C:\xampp\htdocs\
2. Start Apache and MySQL from the XAMPP Control Panel.  
3. Open your browser and visit:
   ```
   http://localhost/grading_portal/add_grade.php
   http://localhost/grading_portal/view_grades.php
  
4. Use the pages to:
   - Add grades  
   - View grades and GPA by student or course    

---

## 🧑‍💻 Group Members
| Name | Matric No |
|------|------------|
| Ogholoh Omosoria Diamod  | (23/1085) |
| [Member 2] | (Matric No) |
| [Member 3] | (Matric No) |
| [Member 4] | (Matric No) |
| 

👩‍💻 Developer
Project Lead: Ogholoh Omosoria Diamond  
Language: PHP, HTML, CSS  
Database: MySQL

## 🏫 Assignment Details
**Course:**   
Assignment:Assignment 1 – PHP & MySQL Practical  
Group: Group 2 


## 🔗 Repository Link
https://github.com/WebAppDevelopmentGroup2/Group-2-Assignment-1
