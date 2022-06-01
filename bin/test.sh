#!/usr/bin/env bash

APP_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

cd $APP_PATH/../

docker run -ti --rm  -v  $PWD:/app -w /app --user $(id -u):$(id -g) --dns 8.8.8.8 php:latest php ./vendor/bin/phpunit --testdox tests