# This script helps to install and deploy the generated API
# Please take a look at the README.md file for more information
# More information about APIgen at https://apigen.app/

$USERNAME = Read-Host -Prompt 'Input your username'
$EMAIL = Read-Host -Prompt 'Input your email'
$PASSWORD = Read-Host -Prompt 'Input your password'

composer install --no-dev --optimize-autoloader --classmap-authoritative
php bin/fusio migrate --no-interaction
php bin/fusio adduser --role=1 --username="$USERNAME" --email="$EMAIL" --password="$PASSWORD"
php bin/fusio generate:table
php bin/fusio generate:model
php bin/fusio login --username="$USERNAME" --password="$PASSWORD"
php bin/fusio deploy
php bin/fusio generate:sdk --raw --output="../frontend/src/app/generated"
php bin/fusio marketplace:install fusio
