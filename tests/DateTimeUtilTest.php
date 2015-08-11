<?php
use App\Util\DateTimeUtil; 
class DateTimeUtilTest extends TestCase {
	
	public function testSafeParseTimeString()
	{
		//valid data test case
		$result = DateTimeUtil::getTimeSpan('07:00', '23:00', '30');
		print_r($result);
		$this->assertTrue(count($result) == 33);
		
		//bad start/end times
		$result = DateTimeUtil::getTimeSpan('07:00', '06:00', '30');
		print_r($result);
		$this->assertTrue(count($result) == 0);
		
		//bad start/end times2 
		$result = DateTimeUtil::getTimeSpan('junk', '06:00', '30');
		print_r($result);
		$this->assertTrue(count($result) == 0);
		
		//interval
		$result = DateTimeUtil::getTimeSpan('01:00', '06:00', 'junk');
		print_r($result);
		$this->assertTrue(count($result) == 0);
	}
}