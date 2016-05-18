<?php

namespace Benchmark;

interface IBench {
	public static function start();
	public static function stop();	
	public static function mark( $name );
	public static function getMark( $name );
	public static function getTotalBenchTime();
	public static function getAllMarks();
}
