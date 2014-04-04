#!/bin/bash
git pull
npm install
php composer.phar install
php app/console cache:clear --env=prod
php app/console assets:install --env=prod --symlink
php app/console assetic:dump --env=prod
chmod 777 -R app/cache
chmod 777 -R app/logs
chmod 777 -R app/spool
chmod 777 -R app/uploads