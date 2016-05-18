# Benchmark
Benchmark is a library write in PHP for usefull bechmark your application

# Use composer
From root directory (where is composer.json) run:

composer update


# Example for use Benchmark
<?php

include 'vendor/autoload.php';

use Benchmark\Bench;

echo "Start benchmark\n";
Bench::start();

sleep(30);

Bench::stop();

echo "Stop benchmark\n";
echo "Milliseconds: ". Bench::getTotalBenchTime() . "\n";

# Modify source
You are free to modify all projects for best performace.

