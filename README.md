# 🎓 Student Job Portal System

## 📖 Overview

The **Student Job Portal System** is a web application that connects students with employers.
It allows students to search and apply for jobs, while employers can post job opportunities and manage applicants efficiently.

---

## ✨ Key Features

### 👨‍🎓 Student Module

* User registration and login
* Browse available job listings
* Apply for jobs
* View application status

### 🏢 Employer Module

* Employer registration and login
* Post new job opportunities
* View student applications
* Update application status

---

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Database:** MySQL

---

## 📂 Project Structure

```id="sl0gdx"
student-job-portal/
│
├── assets/              # CSS, images
├── employer/            # Employer functionalities
│   ├── dashboard.php
│   ├── post_job.php
│   ├── view_applicants.php
│   └── update_status.php
│
├── student/             # Student functionalities
│
├── includes/            # Common files (DB connection, functions)
├── uploads/             # Uploaded resumes/files
│
├── apply.php
├── config.php
├── dashboard.php
├── index.php
├── job_list.php
├── login.php
├── register.php
└── employer_login.php
```

---

## ⚙️ Setup Instructions

1. Install a local server (e.g., XAMPP)
2. Copy project folder into:

   ```
   htdocs/
   ```
3. Start **Apache** and **MySQL**
4. Open **phpMyAdmin** and import your database
5. Run the project:

   ```
   http://localhost/student-job-portal
   ```

---

## 🔧 Configuration

Edit database settings in:

config.php

Example:

$conn = mysqli_connect("localhost", "root", "", "job_portal_db");
```

---

## 🚀 Future Enhancements

* Email notification system
* Admin dashboard
* Advanced job filtering
* Improved UI design

---

## 👩‍💻 Author

Dilki Nimeshika

---

## ⭐ Acknowledgement

If you found this project useful, consider giving it a ⭐ on GitHub!
