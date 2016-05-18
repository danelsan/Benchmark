<?php

namespace Benchmark;

class Timer {
	private $start;
	private $stop;
	private $name;
	
	public function __construct( $name ) {
		if ( !is_string( $name ) )
			throw new \Exception("Name of Timer isn t a string");
		
		$this->name = $name;
		$this->start();
		$this->stop = NULL;
	}
	
	public function start() {
		$this->start = microtime(true);
	}
	
	public function stop() {
		$this->stop = microtime(true);
	}
	
	public function getStart() {
		return $this->start;
	}
	
	public function getStop() {
		return $this->stop;
	}
	
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Return float in ms
	 * 
	 * @return float
	 */
	public function benchtime() {
		if ( is_null( $this->getStop() ) )
			$this->stop();
		return ($this->stop - $this->start) * 1000;
	}
}
