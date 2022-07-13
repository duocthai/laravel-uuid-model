# Laravel Uuid Model

[![Build Status](https://travis-ci.com/duocthai/laravel-uuid-model.svg?branch=master)](https://travis-ci.com/duocthai/laravel-uuid-model)
[![Latest Stable Version](https://poser.pugx.org/DT/laravel-uuid-model/version)](https://packagist.org/packages/duocthai/laravel-uuid-model)
[![License](https://poser.pugx.org/DT/laravel-uuid-model/license)](https://packagist.org/packages/duocthai/laravel-uuid-model)

Using `uuid` in eloquent model.

## Installation

```bash
composer require DT/laravel-uuid-model
```

## Usage

Create primary key as string type.

```php
/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
	Schema::create('example', function(Blueprint $table) {
		$table->uuid('id')->primary();
		// ...
	});
}
```

And, Extends `DT\Laravel\Uuid\Model` in your model.

```php
use DT\Laravel\Uuid\Model;

class Example extends Model
{
	//...
}
```
