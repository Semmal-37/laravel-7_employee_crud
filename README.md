#Project Title
Employee CRUD Application with Laravel

#Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Running this app Locally

First, clone the repository to your local machine:

```bash
git clone https://github.com/nlsnmr/laravel5.7-crud.git
```

Install dependencies:
```bash
composer install
```

Setup the local configurations:
> By default this app can send email after each project creation.  
> On the `.env` file is set with `MAIL_DRIVER=log`, when set with smtp, username, etc it should send normally the email
```bash
cp .env.example .env
```

After database creation:
```bash
php artisan migrate
```
Install datatables package:
 ```bash
 composer require yajra/laravel-datatables-oracle
 ```
 After that you need to set providers and alias.
 config/app.php
  ```bash
 .....
'providers' => [
	....
	Yajra\DataTables\DataTablesServiceProvider::class,
]
'aliases' => [
	....
	'DataTables' => Yajra\DataTables\Facades\DataTables::class,
]
.....
 ```
Install Maatwebsite Package:
```bash
composer require maatwebsite/excel
````
Now open config/app.php file and add service provider and aliase.
config/app.php
```bash
'providers' => [
  .......
  Maatwebsite\Excel\ExcelServiceProvider::class,
 
 ],  

'aliases' => [ 
  .......
  'Excel' => Maatwebsite\Excel\Facades\Excel::class,

], 

````
Generate key:
```bash
php artisan key:generate
````

Finally, run the development server:

```bash
php artisan serve
```

The app will be available at: **127.0.0.1:8000**  
    
