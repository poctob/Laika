<?php

namespace App\Util;

class DateTimeUtil {
	/**
	 * Generates a list of strings that represent a period between two dates
	 * calculated by using specified interval.
	 *
	 * @param
	 *        	start Start date.
	 * @param
	 *        	end End date.
	 * @param
	 *        	inter Interval
	 * @return List of string with time periods.
	 */
	public static function getTimeSpan($start, $end, $inter) {
		$retval = array ();
		$start_time = self::safeParseTimeString ( $start );
		$end_time = self::safeParseTimeString ( $end );
		if (isset($start_time) && isset($end_time) && $end_time > $start_time) {			
			$diff = $end_time->diff ( $start_time );		
			$mins = ($diff->h * 60) + $diff->i;		
				
			if ($mins > 0 && is_numeric($inter) && $inter > 0) {
				$dt_string = $start_time->format ( 'H:i' );
				array_push ( $retval, $dt_string );
				$interval = new \DateInterval ( 'PT' . $inter . 'M' );

				while ( $mins > 0 && $end_time > $start_time ) {
					$start_time->add ( $interval );
					$dt_string = $start_time->format ( 'H:i' );
					array_push ( $retval, $dt_string );
					$diff = $end_time->diff ( $start_time );
					$mins = ($diff->h * 60) + $diff->i;
				}
			}
		}
		return $retval;
	}
	
	/**
	 * Safe parsing of an integer from string
	 *
	 * @param
	 *        	input Input string to parse.
	 * @return parsed integer or 0
	 */
	protected static function safeParseTimeString($input) {
		$dt = new \DateTime ();
		if (isset ( $input )) {
			try {
				$hour = strtok ( $input, ":" );
				$minute = strtok ( ":" );	
				if(is_numeric($hour) && is_numeric($minute))
				{			
					$dt->setTime ( intval ( $hour ), intval ( $minute ) );		
					return $dt;
				}
			} catch ( Exception $e ) {
				echo 'Time format exception: ', $e->getMessage (), "\n";
			}
		}
		return null;
	}
}