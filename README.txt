Instructions -
==============

**Admin Panel Management using Laravel with Bootstrap **

## Features
-----------
1. Login, Logout.
2. Create, Update, Delete Post of reminders.

#Implement delete using ajax
-----------------------------
I'm using with delete fuctionality in datatable but not implement ajax

## Installation

Download the code from repository.
Unzip the zip file.

Open browser; goto [localhost/phpmyadmin](http://localhost/phpmyadmin).

Create a database with name "hauper_reminds_db" and import the file "hauper_reminds_db.sql" in that database.

Copy the remaining code into your root directory:

for example, for windows

**WAMP : c:/wamp/www/reminderApps**

OR

**XAMPP : c:/xampp/htdocs/reminderApps**


Open browser; goto [localhost/reminderApps](http://localhost/reminderApps) and press enter:

Then enter URL:
---------------
http://127.0.0.1:8000/


You can use migration with seeder of users
------------------------------------------
=> php artisan migration
=> php artisan db:seed


The login screen will appear.
To login, I am going to provide the user-email ids and password below.

Account Details:
----------------
email : admin@yopmail.com
password : 123456

email : user@yopmail.com
password : 123456


You can configuration for SMTP of email
---------------------------------------
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=YOUREMAIL
MAIL_PASSWORD=YOURPASSWORD
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"