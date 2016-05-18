<?php

use Benchmark\Timer;

class timerTest extends PHPUnit_Framework_TestCase {
	private $timer;
	
	public function setUp() {
		$this->timer = new Timer('init');
	}
	
	public function testTimer() {
		$this->assertEquals('init',$this->timer->getName() );
		$this->assertTrue( is_float($this->timer->getStart()) );
		$this->assertTrue( is_null($this->timer->getStop()) );
		$this->assertTrue( is_float($this->timer->benchtime()) );
		$this->assertTrue( is_float($this->timer->getStop()) );
	}

	public function testTimerError() {
		try {
			$c = new Timer(4);
			$ctrl = false;
		} catch (\Exception $e ) {
			$ctrl = true;
		}
		$this->assertTrue( $ctrl );
		
	}
}
