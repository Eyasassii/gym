## Pre-requisites
    PHP 8
    nodejs 16
    Mysql
    Apache/Nginx Server 
    Composer (requires PHP)

Consider installing a "local web development" solution such as 

    MAMP
    WAMP
    XAMPP


run the following commands to install the project

```bash
    git clone https://github.com/Eyasassii/gym.git
    cd gym
    composer install
    npm install
    npm run dev
```


run the following commands to migrate your database
```bash
    php artisan migrate
    php artisan db:seed --class=DatabaseSeeder
```

## Launch project

To run the project, you need to run this command

```bash
    php artinsan serve
```