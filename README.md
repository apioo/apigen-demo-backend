
# Demo

APIgen demo project

## Installation

To install the project you need to run the following commands:

* Install all dependencies via composer https://getcomposer.org:
  ```
  composer install
  ```
* Configure the correct database credentials at the `.env` file
* Execute all migrations
  ```
  php bin/fusio migrate
  ```
* Create an admin user
  ```
  php bin/fusio adduser
  ```
* Generate all tables
  ```
  php bin/fusio generate:table
  ```
* Generate all models
  ```
  php bin/fusio generate:model
  ```
* Run the login command to authenticate with the credentials provided to the `adduser` command
  ```
  php bin/fusio login
  ```
* Run the deploy command
  ```
  php bin/fusio deploy
  ```

The installation is now finished and you can start to use your API. You can find more information about Fusio at:
https://docs.fusio-project.org/

### Optional

* Generate an SDK for your API
  ```
  php bin/fusio generate:sdk
  ```
* Install the Fusio backend app to manage your API
  ```
  php bin/fusio marketplace:install fusio
  ```

## Docker

This project contains a Dockerfile which you can use to easily create a docker image of your API.

## GitHub

This project contains a GitHub workflow action to automatically generate a Docker image and push it to the GitHub
registry. If you do not host your files at GitHub you can also delete the `.github` folder.
