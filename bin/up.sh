#!/bin/bash

# exit when any command fails
set -e

# Ensure that Docker is running...
if ! docker info > /dev/null 2>&1; then
    echo -e "${WHITE}Docker is not running.${NC}" >&2

    exit 1
fi

if [ `whoami` == 'root' ]
  then
    echo "Please make sure to run the command without 'sudo'"
    exit 1;
fi


cd $(cd $(dirname "${BASH_SOURCE[0]}") && pwd)/..

DIR="vendor"

if [ ! -d "$DIR" ]; then
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
fi

./vendor/bin/sail up -d
