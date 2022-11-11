## Todo

<p align="center"><img src="app.png"/></p>

### Requirements

* PHP 7.4.*
* Nodejs v12.22.9
* NPM 8.5.1
* Apache2/Nginx
* MySQL

### Getting Started

First clone the application:

```bash
git clone https://github.com/CliffMathebula/blog_post
```

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies (Optional):

> Run only if you would like to make changes to the front-end

```bash
npm install
```

```bash
npm run dev
```

Rename `.env.example` to `.env` then set the app key by running the following command:

```bash
php artisan key:generate --ansi
```

Create a new Database and configure it in the `.env` then run the `migrate` command:

```bash
php artisan migrate
```

Run the application!

```bash
php artisan serve
```

> Don't forget to configure the default email account in the `.env` file.

## License

This blog_post application is a open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
