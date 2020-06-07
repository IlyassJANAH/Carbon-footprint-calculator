# Carbon-footprint-calculator

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites
  * [Composer](https://getcomposer.org)
  * [PHP 7.4.* ](http://php.net/downloads.php) or higher
  * [MySQL](https://www.mysql.com/fr/)
  * [NPM](https://www.npmjs.com/get-npm)

### Installing

* Run those commands on terminal:
	```
	composer install
	```
	```
	npm install
	```
* Open MySQL console or PhpMyadmin and create a database with the name "backendtest"
* Create the database schema
1. Open the project in your IDE
2. Go to terminal and run:
	```
	php bin/console make:migration
	```
	```
	php bin/console doctrine:migrations:migate
	```
5. The database schema will be created automaticaly when you run the project.


## Running the project

To run the project:
	```
	symfony server:start
	```
On the browser: http://127.0.0.1:8000    

## Author

* **Ilyass JANAH** [LinkedIn](https://www.linkedin.com/in/janah-ilyass-1354a7a0/)






