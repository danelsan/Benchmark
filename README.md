# Benchmark
Benchmark is a library write in PHP for usefull bechmark your application


#Example for use Benchmark
<?php

use Benchmark\Bench;

Bench::start();

sleep(30);

Bench::stop();

echo Bench::getTotalBenchTime();
