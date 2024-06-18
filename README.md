# Bookstore-Management
Final project of Software Engineering - Ton Duc Thang University. <br>
Final project includes 2 modules:
- Module for Customer to browse the online bookstore.
- Module for Admin to manage the Bookstore

## Project Description
**This is the Admin module of Bookstore Management project** <br>
This web application should be used by employees working at the Bookstore. <br> 
Functionalities includes:
- User authentication & security: 
    - Login, logout
    - Account created by Admin has its password hashed before storing to database
- Employee management:
    - Search for employee by entering their name
    - Basic CRUD: add new employee, read employee detail, update employee, delete employee
- Product management:
    - Search for product by entering their name
    - Basic CRUD: add new product, read product detail, update product, delete product
- Voucher management:
    - Search for voucher by entering their name
    - Basic CRUD: add new voucher, read voucher detail, update voucher, delete voucher

## Installation
- The project use XAMPP to install localhost server.
    - XAMPP should be installed before using the application.
    - All files in this repo should be placed in `C:\xampp\htdocs` directory
    - Database design and its initial data is stored in SQL script `database/quanlynhasach.sql`. This script should be imported to MySQL using phpMyAdmin.
- Run the project:
    - Open the XAMPP control panel, run the Apache and MySQL module.
    - Select the Admin action of MySQL module to open phpMyAdmin, then import the SQL script to initialize the database.
    - Select the Admin action of Apache module to run the application. Sample the email & password pair as below:
        - To login as admin, use: `admin@gmail.com` - `admin`
        - To login as other employee, which created by admin, use their email and id: `nvhoang@gmail.com` - `nv0012`. However, the functionalities for employees are not currently supported, since they haven't been implemented yet. 

## Authors
This module of the project has done by a group of 3 members:
- Uyen Tam Tat [Github](https://github.com/TUT888)
- Thuy Tien Duong [Github](https://github.com/tienduong-21)
- Hieu San Truong [Github](https://github.com/hs0512)