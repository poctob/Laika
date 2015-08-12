<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class ConfigurationControllerTest extends TestCase
{
   use WithoutMiddleware;
   use DatabaseMigrations;
   
  /* public function setUp() {
       parent::setUp();
       DB::table('configuration')->delete();
       
   }*/

    public function testPost()
    {
        $keyName = 'configID';
        $keyValue = 'TestKey1';
        $this->post('/configuration/getJSON', [
        $keyName => $keyValue,
        'configValue' => 'TestValue1'
            ])
             ->seeJson([
                $keyName => $keyValue,
             ]);
    }
    
    public function testGet()
    {
        $keyName = 'configID';
        $keyValue = 'TestKey1';
        
        $this->post('/configuration/getJSON', [
        $keyName => $keyValue,
        'configValue' => 'TestValue1'
            ]);
        
        $this->get('/configuration/getJSON')
             ->seeJson([
                $keyName => $keyValue,
             ]);
    }
    
    public function testGetWithId()
    {
        $keyName = 'configID';
        $keyValue = 'TestKey1';
        
        $this->post('/configuration/getJSON', [
        $keyName => $keyValue,
        'configValue' => 'TestValue1'
            ]);
        
        $this->get('/configuration/getJSON/1')
             ->seeJson([
                $keyName => $keyValue,
             ]);
    }
    
    public function testPut()
    {
        $keyName = 'configID';
        $keyValue = 'TestKey1';
        
        $this->post('/configuration/getJSON', [
        $keyName => $keyValue,
        'configValue' => 'TestValue1'
            ]);
        
        $keyName = 'configID';
        $keyValue2 = 'TestKey2';
        
        $this->put('/configuration/getJSON', [
        $keyName => $keyValue2,
        'configValue' => 'TestValue1',
            'id' => 1
            ]);
        
        $this->get('/configuration/getJSON/1')
             ->seeJson([
                $keyName => $keyValue2,
             ]);
    }
    
     public function testDelete()
    {
        $keyName = 'configID';
        $keyValue = 'TestKey1';
        
        $this->post('/configuration/getJSON', [
        $keyName => $keyValue,
        'configValue' => 'TestValue1'
            ]);
        
        $this->delete('/configuration/getJSON',[
            'id'=>2
            ])->seeJson([
                'error' => true
             ]);
        
         $this->delete('/configuration/getJSON',[
             'id'=>1
         ])
             ->seeJson([
                'error' => false
             ]);
    }
}
