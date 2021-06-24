<p align="center"><a href="#" height="150"><img height="150" src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="auto"><img height="150" src="https://vuejs.org/images/logo.svg" width="auto"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About
GitHub Trending Repositories
using Vue JS, REST API & Laravel

- [Laravel 8](https://laravel.com/).
- [Vue Js 2.x](https://vuejs.org/).
- Github Api
- [Axios](https://www.npmjs.com/package/axios).
- [Bootstrap 4.6](https://getbootstrap.com/).

Those are the main core packages.
## How to config & install .
    `git clone https://github.com/dibakarmitra/github-trending-app.git`
    `cd github-trending-app`
    `composer install`
    `npm install`
    - rename the .env-test file to .env and configure the database and github oauth app
      .env file config parts  
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=github_trending_app
        DB_USERNAME=root
        DB_PASSWORD=
        
        your can create your [github oauth app id & secret](https://github.com/settings/apps).
        
        GITHUB_CLIENT_ID=your github_client_id 
        GITHUB_CLIENT_SECRET=your github_cleint_secret
        GITHUB_REDIRECT_URL="http://github-trending-app.test/login/github/callback"
     
    `php artisan migrate` or import the file to database (https://github.com/dibakarmitra/github-trending-app/blob/master/github_trending_app.sql)
    `php artisan serve` or copy the folder to server folder
    
  please change the "http://github-trending-app.test" according to your.
  
  ##Screenshots
  
 <p align="center"><img src="https://github.com/dibakarmitra/github-trending-app/blob/master/screenshots/Screenshot%20(18).png?raw=true" width="50%"><img height="150" src="https://github.com/dibakarmitra/github-trending-app/blob/master/screenshots/Screenshot%20(21).png?raw=true" width="50%">
<img src="https://github.com/dibakarmitra/github-trending-app/blob/master/screenshots/Screenshot%20(22)_LI.jpg?raw=true" width="50%"><img height="150" src="https://github.com/dibakarmitra/github-trending-app/blob/master/screenshots/Screenshot%20(23).png?raw=true" width="50%">
</p>
    
    
