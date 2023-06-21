<p align="center"><a href="https://github.com/khumam/laravel-galaxy" target="_blank"><img src="https://raw.githubusercontent.com/khumam/laravel-galaxy/main/public/logo/main.svg" width="400" alt="Laravel Galaxy Logo"></a></p>


## About Laravel Galaxy

Laravel Galaxy is an Laravel's boilerplate (at least for now) with modified feature that will create the dynamic CRUD or the data management service. This dynamic data will read your models list. 

## What is the inside of Laravel Galaxy?

- We use Laravel 10
- Laravel Sail
- Laravel Breeze
- Laravel Socialite
- Galaxy features 

## Installation

If you want to install the Laravel Galaxy, make sure you have docker installed on your machine, because we will use Laravel Sail (You can use php artisan serve manualy but set your db to manualy too).

> Atentions please!
>
> Please note that this is in beta and development process. You will find a lot of bugs

First clone this repository
```
git clone git@github.com:khumam/laravel-galaxy.git
```

Next we need to install the composer, run
```
composer install
```

Then you also need to init the npm because we use Laravel Breeze, run
```
npm install
```

Make sure you already copied the .env and fill with the credentials. Make sure this database filled with (if you use your db configuration, ignore it)
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravelgalaxy
DB_USERNAME=sail
DB_PASSWORD=password
```

Run the Laravel using Sail and npm
```
./vendor/bin/sail up -d
npm run dev
```

## Usage

You can create the model and migrations as usual. Run
```
php artisan make:model YourModelName -m
```

Those command will create two files
- Your model
- Your migration's model

Then fill the migration with whatever you need (You can use uuid instead of id because in this boilerplate all data use uuid). Don't forget to migrate it. And if you use sail, run
```
./vendor/bin/sail artisan migrate
```

Then open your model file. Add this 
```
protected $fillable = [
    // list all of your fillable column
];

protected $hidden = [
    // list of hidden column such as password, token, etc
];
```

Go and check `http://localhost:80/galaxy`
