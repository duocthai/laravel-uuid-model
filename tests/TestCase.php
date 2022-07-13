<?php

namespace DT\Laravel\Test;

use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    public function setUp():void
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => $this->getTempDirectory().'/database.sqlite',
            'prefix' => '',
        ]);
    }

    protected function resetDatabase()
    {
        file_put_contents($this->getTempDirectory().'/database.sqlite', null);
    }

    public function getTempDirectory()
    {
        return __DIR__.'/temp';
    }


    protected function setUpDatabase()
    {
        $this->resetDatabase();
        $this->createTable('samples');
    }

    protected function createTable($tableName)
    {
        $this->app['db']->connection()->getSchemaBuilder()->create($tableName, function (Blueprint $table) use ($tableName) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }
}
