<?php
class Employee extends Eloquent{
	protected $table = 'employee';
	
	public $timestamps = false;
	
	public function s3cr3t()
	{
		return $this->hasOne('S3cr3t');
	}
}