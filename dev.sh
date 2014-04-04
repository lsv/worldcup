#!/bin/bash
php app/console cache:clear --env=dev
rm web/js/*
rm web/css/*
php app/console assets:install --env=dev --symlink
php app/console assetic:dump --env=dev
chmod 777 -R app/cache
chmod 777 -R app/logs