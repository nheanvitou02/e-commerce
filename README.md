# e-commerce

<p align="center"><img src="https://www.pngkey.com/png/detail/251-2510486_logo-ecom-e-commerce-logo.png" width="400" alt="Logo"></p>

# How to clone project

How to clone project git repository help to follow this command

### `git clone https://github.com/nheanvitou02/e-commerce.git`

# How to run project

This repository project There are 2 project server and client

## Run server or backend project

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


### Software required run project

- **[Composer](https://getcomposer.org/download/)**
- **[PHP](https://www.php.net/downloads.php/)**
- **[XAMPP](https://www.apachefriends.org/)**

### command and step to run

How to run backend project plz help to follow this step 

### `Open Folder project on VS code`
- **[Install Vs code](https://code.visualstudio.com/download/)**

### `cd server`
Cd to folder directory server

### `create file call .env`
File `.env` content copy from file `.env.example`

### `composer install or composer update`
Run to install dependencies of project

### `php artisan migrate`
Run migratetion to create table in databass 
<br />
After run migrate plz make sure aleady create databass in `mysql phpmyadmin` name databass like value env  

### `php artisan serve`
Runs the app in the development mode.
Open [open app](http://127.0.0.1:8000/) to view it in your browser.

## Project structure and pattern 
In the project we are using `MVC` pattern 
<p><a href="https://www.tutorialspoint.com/design_pattern/mvc_pattern.htm" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/1200px-MVC-Process.svg.png" width="400" alt="Laravel Logo"></a></p>

## Run client or frontend project

<p align="center"><a href="https://reactjs.org/docs/getting-started.html" target="_blank"><img src="https://www.datocms-assets.com/14946/1638186862-reactjs.png?auto=format&fit=max&w=1200" width="400" alt="Laravel Logo"></a></p>


### Software required run project

- **[Node js](https://nodejs.org/en/)**

### command and step to run
How to run frontend project plz help to follow this step 

### `Open Folder project on VS code`
- **[Install Vs code](https://code.visualstudio.com/download/)**

### `cd client`
Cd to folder directory client

### `npm intsall`
Run to install dependencies of project

### `npm start`
Runs the app in the development mode.\
Open [Admin](http://localhost:3000) to view it in your browser \
Open [Client](http://localhost:3000/client) to view it in your browser

The page will reload when you make changes.\
You may also see any lint errors in the console.

# Environment
- **dev**
- **stage**
- **production**

# UML databass diagram 
- **[Tool using](https://app.diagrams.net/)**
<p><img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/336040369_5998398566861958_3229764456201448372_n.png?stp=dst-png_p206x206&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_eui2=AeHVwM4xYOs--LpQNgYM0p050evNMm9SMA7R680yb1IwDif517WWcFYIxWpqwgwFsVdPjrTjQFs1o56n9izLj9XW&_nc_ohc=jXC5WqLBuZgAX8nnepR&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdSbObVlokea4wjqyOuhEONXPx4xH6rr9zOYXPntNNmjxg&oe=643803A6" width="500" alt="Laravel Logo"></p>
