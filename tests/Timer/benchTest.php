<?php

use Benchmark\Bench;

class benchTest extends PHPUnit_Framework_TestCase {
	private $bench;
	
	public function setUp() {
		
	}
	
	public function testBench() {
		Bench::start();
		sleep(2);
		Bench::stop();
		$init =  Bench::getMark('bench_initial');
		$this->assertTrue( $init['ms'] > 2000 );
	}
	
	public function testBenchError() {
		Bench::start();
		Bench::mark('bootstrap');
		sleep(1);
		Bench::stop();
		try {
			$init =  Bench::getMark('bootstrapd');
			$ctrl = false;
		} catch (\Exception $e ) {
			$ctrl = true;
		}
		$this->assertTrue( $ctrl );
		$bench_total = Bench::getTotalBenchTime();
		echo $bench_total;
		$this->assertTrue( $bench_total > 1000 );
	}
}
