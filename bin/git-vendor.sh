#!/usr/bin/env bash

APP_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

cd $APP_PATH/../

git init

git remote  add origin git@github.com:dumptecnologia/php-framework.git

git fetch

git checkout -f main

git pull
