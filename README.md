laravel-schema-extend
=====================

- 让 laravel 的 Schema 支持 MySQL “表注释” 和 row_format。


## 使用前的准备


在配置文件 `config/app.php` 中替换“别名”

```php
'aliases' => array(
    ...
    // 'Schema' => 'Illuminate\Support\Facades\Schema',
    'Schema'    => 'Qinxue\LaravelSchemaExtend\Facade',
),
```

## comment 使用方法

```php
Schema::create('tests', function ($table) {
    $table->comment = '表注释';
});
```

## row_format 使用方法

```php
Schema::create('tests', function ($table) {
    $table->rowFormat = 'compact';
});
```
