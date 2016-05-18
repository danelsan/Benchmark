<?php

namespace Benchmark;

class Bench implements IBench {
	static public $_instance;
	private $marks;
	private $started;
	
	public function __construct( ) {
		
	}
	
	public static function start() {
		$bench = Benchmark::factory();
		$bench->clear();
	}
	
	public static function stop() {
		Benchmark::factory()->stop();
	}
	
	public static function mark( $name ) {
		$bench = Benchmark::factory();
		$bench->setMark( $name, new Timer($name) );
	}
	
	public static function getMark( $name ) {
		return Benchmark::factory()->getMark($name);
	}	
	
	/**
	 * Return Millisecond time
	 * 
	 * @return float
	 */
	public static function getTotalBenchTime() {
		$bench = Benchmark::factory();
		$marks = $bench->getMarks();
		$len_marks = count( $marks );
		if ( $len_marks != 0) {
			$last_timer =  $marks[ $len_marks-1 ];
			$last_timer->stop();
			return ($last_timer->getStop() - $marks[0]->getStart()) * 1000;
		}
	}

	public static function getAllMarks() {
		$bench = Benchmark::factory();
		$result = array();
		foreach ($bench->getMarks() as $k=>$timer) {
			$result[$k] = $bench->getMark( $timer->getName() );
		}
		return $result;
	}
}
