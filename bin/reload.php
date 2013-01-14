#!/usr/bin/env php
<?php

require_once __DIR__.'/base_script.php';

build_bootstrap();

show_run("Destroying cache dir manually", "rm -rf app/cache/*");

show_run("Creating directories for app kernel", "mkdir -p app/cache/dev app/cache/test app/logs web/uploads");

show_run("Warming up dev cache", "php app/console --env=dev cache:clear");
//show_run("Warming up test cache", "php app/console --env=test cache:clear");

show_run("Changing permissions", "chmod -R 777 app/cache app/logs web/uploads");

exit(0);
