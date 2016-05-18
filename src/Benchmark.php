<?php

namespace Benchmark;

class Benchmark  {
	static public $_instance;
	private $marks;
	private $started;
	
	public function __construct( ) {
		$this->clear();
	}
	
	public function __destruct( ) {
		unset($this->marks);
	}

	public function searchMark( $name ) {
		foreach ( $this->marks as $timer ) {
			if ( $timer->getName() == $name ) 
				return $timer;
		}
		throw new \Exception("March '$name' not found!");
	}
	
	public function stop() {
		$len_marks = count($this->marks);
		if ( $len_marks != 0) {
			$last_timer =  $this->marks[ $len_marks-1 ];
			$last_timer->stop();
		}
	}
	
	public function getMarks() {
		return $this->marks;
	}
	
	public function clear() {
		$this->marks = array();
		$this->setMark('bench_initial', new Timer('bench_initial') );
		$this->started = true;
	}
	
	public function getMark( $name ) {
		$timer = $this->searchMark($name);
	
		return array( 	'name' 	=> $timer->getName(),
				'start' => $timer->getStart(),
				'stop'	=> $timer->getStop(),
				'ms'	=> $timer->benchtime(),
		);
	}
	
	public function setMark($name, Timer $timer ) {
		$len_marks = count($this->marks);
		if ( $len_marks != 0) {
			$last_timer =  $this->marks[ $len_marks-1 ];
			$last_timer->stop();	
		}
		$this->marks[] = $timer;
	}
	
	public function isStarted() {
		return $this->started;
	}
	
	public static function factory() {
		if ( is_null(self::$_instance) ) {
			$bench = new Benchmark();
			self::$_instance = $bench;
		}
		return self::$_instance;
	}
}
