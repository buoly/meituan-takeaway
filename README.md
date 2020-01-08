<h1 align="center"> meituan-takeaway </h1>

<p align="center"> 美团外面开发平台PHP对接SDK</p>


## 安装

```shell
$ composer require buoly/meituan-takeaway
```

## 使用

```php
use Buoly\MeituanTakeaway\MeituanTakeaway;
.
.
.

$config = [
    'app_id' => 4625,
    'app_secret' => '6b69d70eb76f6189a1fb9ba9a80f2df2',
    'log_path' => 'logs/meituan.log',
];

$meituan = new MeituanTakeaway($config);

$shop = [.....];
$meituan->order->create($shop);

$order = [.....];
$meituan->order->create($order);

```

## License

MIT