<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------

require __DIR__.'/../vendor/autoload.php';

$app = new YuZhi\Foundation\Application(
    realpath(__DIR__.'/../')
);

$kernel = $app->make();

$response = $kernel->handle(
    $request = \YuZhi\Http\Request::gain()
);

$response->send();

$kernel->terminate($request, $response);