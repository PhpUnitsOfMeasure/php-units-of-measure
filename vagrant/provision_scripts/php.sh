#! /usr/bin/env bash

# Config
WORKING_DIR=/tmp/makework

apt-get install -y curl php5 php5-cli

# Composer
mkdir -p $WORKING_DIR && cd $WORKING_DIR
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
