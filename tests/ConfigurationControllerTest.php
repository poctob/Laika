<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfigurationControllerTest extends TestCase
{
   use WithoutMiddleware;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPost()
    {
        $this->post('/configuration/getJSON', [
        'configID' => 'TestKey1',
        'configValue' => 'TestValue1'
            ])
             ->seeJson([
                 'created' => true,
             ]);
    }
}
