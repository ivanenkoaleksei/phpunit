composer init --name="my/phpunit-project" --require-dev=phpunit/phpunit --no-interaction
composer install

composer require --dev phpunit/phpunit

./vendor/bin/phpunit - run test