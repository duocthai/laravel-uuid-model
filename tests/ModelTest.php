<?php

namespace DT\Laravel\Test;

use DT\Laravel\Uuid\Model;

class ModelTest extends TestCase
{
    public function testCreatingUuid()
    {
        $model = UUidModel::create([
            'name' => 'Test'
        ]);

        $this->assertArrayHasKey('id', $model);

        // example: 8b5dd34b-624b-4c9c-b432-217c1fa94607
        $this->assertRegExp('/^[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}$/', $model->id);
    }
}

class UuidModel extends Model
{
    protected $table = 'samples';
}
