<?php

class DBManager
{
	public function createSchema($replace = false)
	{
		$this->createTables($replace);	
	}
	
	private function createTables($replace = false)
	{
		
		$this->createTable('clock_event',$replace);
		$cols = array(
				array('type'=>'text','name'=>'description'),
				array('type'=>'string','name'=>'name')				
		);
		$this->createColumns('clock_event', $cols);
		
		$this->createTable('clock_out_reasons',$replace);
		$cols = array(				
				array('type'=>'string','name'=>'name')
		);
		$this->createColumns('clock_out_reasons', $cols);

		$this->createTable('clock_event_trans',$replace);
		$cols = array(
				array('type'=>'datetime','name'=>'timestamp'),
		);
		$this->createColumns('clock_event_trans', $cols);
		$this->addForeignKey('clock_event_trans', 'clock_event_id', 'clock_event', 'id');
		$this->addForeignKey('clock_event_trans', 'clock_out_reason', 'clock_out_reasons', 'id');
		
		$this->createTable('s3cr3t',$replace);
		$cols = array(
				array('type'=>'string','name'=>'pass'),
				array('type'=>'string','name'=>'salt')
		);
		$this->createColumns('s3cr3t', $cols);
		
		$this->createTable('employee',$replace);
		$cols = array(
				array('type'=>'boolean','name'=>'active'),
				array('type'=>'string','name'=>'address'),
				array('type'=>'string','name'=>'comment'),
				array('type'=>'string','name'=>'email'),
				array('type'=>'string','name'=>'name'),
				array('type'=>'string','name'=>'phone'),
		);
		$this->createColumns('employee', $cols);
		$this->addForeignKey('employee', 's3cr3t_id', 's3cr3t', 'id');
		
		$this->createPivotTable('employee_clock_event','employee','clock_event',$replace);
		
		$this->createTable('position',$replace);
		$cols = array(
				array('type'=>'string','name'=>'comment'),
				array('type'=>'string','name'=>'name')
		);
		$this->createColumns('position', $cols);
		
		$this->createPivotTable('employee_position','employee','position',$replace);
		
		$this->createTable('privilege',$replace);
		$cols = array(				
				array('type'=>'string','name'=>'name')
		);
		$this->createColumns('privilege', $cols);
		
		$this->createPivotTable('employee_privilege','employee','privilege',$replace);
		
		$this->createTable('time_off_status',$replace);
		$cols = array(
				array('type'=>'string','name'=>'name')
		);
		$this->createColumns('time_off_status', $cols);
		
		$this->createTable('time_off',$replace);
		$cols = array(
				array('type'=>'datetime','name'=>'start'),
				array('type'=>'datetime','name'=>'end'),
		);
		$this->createColumns('time_off', $cols);
		$this->addForeignKey('time_off', 'employee_id', 'employee', 'id');
		$this->addForeignKey('time_off', 'status_id', 'time_off_status', 'id');
		
		$this->createTable('configuration',$replace);
		$cols = array(
				array('type'=>'string','name'=>'configID'),
				array('type'=>'string','name'=>'configValue'),
		);
		$this->createColumns('configuration', $cols);
		
		$this->createTable('shift',$replace);
		$cols = array(
				array('type'=>'datetime','name'=>'start'),
				array('type'=>'datetime','name'=>'end'),
		);
		$this->createColumns('shift', $cols);
		$this->addForeignKey('shift', 'employee_id', 'employee', 'id');
		$this->addForeignKey('shift', 'position_id', 'position', 'id');

	}
	
	private function createTable($table, $replace = false)
	{
		if(!$replace && Schema::hasTable($table))
		{
			return;
		}

		Schema::dropIfExists($table);

		Schema::create(
			$table, 
			function($table)
			{
				$table->increments('id');			
			}
		);
	}
	
	private function createPivotTable($table, $table_one, $table_two, $replace = false)
	{
		if(!$replace && Schema::hasTable($table))
		{
			return;
		}
		
		Schema::dropIfExists($table);
		
		if(Schema::hasTable($table_one) && Schema::hasTable($table_two))
		{
			Schema::create(
				$table,
				function($table) use ($table_one, $table_two)
				{
					$table->integer($table_one.'_id')->unsigned();
					$table->foreign($table_one.'_id')->references('id')->on($table_one);
					
					$table->integer($table_two.'_id')->unsigned();
					$table->foreign($table_two.'_id')->references('id')->on($table_two);
				}
			);
		}
	}
	
	private function createColumns($table, $columns)
	{
		if(Schema::hasTable($table))
		{
			foreach($columns as $column)
			{				
				if(!Schema::hasColumn($table, $column['name']))
				{
					Schema::table(
						$table,
						function($table_name) use ($column)
						{
							$table_name->$column['type']($column['name']);
						}
					);
				}
			}
		}
	}
	
	private function addForeignKey($source_table, $source_column, $destination_table, $destination_column)
	{
		if(Schema::hasTable($source_table) && 		
				!Schema::hasColumn($source_table, $source_column) &&
				Schema::hasTable($destination_table) &&
				Schema::hasColumn($destination_table, $destination_column))
		{
			Schema::table(
				$source_table,
				function($source_table) use($source_column,$destination_column,$destination_table)
				{
					$source_table->integer($source_column)->unsigned();
					$source_table->foreign($source_column)->references($destination_column)->on($destination_table);
				}
			);
		}
	}

}