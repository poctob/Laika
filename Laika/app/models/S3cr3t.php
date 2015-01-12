<?php
class S3cr3t extends Eloquent{
	protected $table = 's3cr3t';
	
	public $timestamps = false;
	
	public function employee()
	{
		return $this->belongsTo('Employee');
	}
}