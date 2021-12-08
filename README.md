<h1 align="center"> Laravel Api Log </h1>

<p align="center"> a laravel simple record api logs through middleware.</p>

## 安装

```shell
$ composer require luffies/laravel-api-log
```

## 配置

发布配置文件
```shell
$ php artisan vendor:publish --tag=api-log-config
```

发布迁移文件
```shell
$ php artisan vendor:publish --tag=api-log-migrations
```

生成数据库结构
```shell
$ php artisan migrate
```

## 使用

在需要添加记录的路由中加入api.log中间件，也可以自定义中间件
```php
Route::get('/test', ['uses' => 'App\Http\Controllers\TestController@index'])->middleware('api.log');
```

## License

MIT