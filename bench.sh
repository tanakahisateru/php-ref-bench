#!/bin/sh

echo "Docker PHP 7.1\n"
docker run -it --rm -v "$PWD":/bench -w /bench php:7.1 \
php vendor/bin/phpbench run --report=default

# echo "Docker PHP 7.0\n"
# docker run -it --rm -v "$PWD":/bench -w /bench php:7.0 \
# php vendor/bin/phpbench run --report=default

echo "Docker PHP 5.6\n"
docker run -it --rm -v "$PWD":/bench -w /bench php:5.6 \
php -ddate.timezone=UTC vendor/bin/phpbench run --report=default
