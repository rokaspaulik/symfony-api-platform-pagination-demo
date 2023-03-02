# Versions

Symfony 6.2 and PHP 8.1

## Usage

```bash
# initial commands
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

# start local server
symfony serve

# visit /api route and here we go...
```

## License

[MIT](https://choosealicense.com/licenses/mit/)