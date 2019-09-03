<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;

$sc = new DependencyInjection\ContainerBuilder();

$sc->register('request', \YuZhi\Http\Request::class);
$sc->register('response', \YuZhi\Http\Response::class);
$sc->register('context', 'Symfony\Component\Routing\RequestContext');
$sc->register('request', \YuZhi\Http\Request::class)
    ->setArguments(array(\YuZhi\Routing\Route::getRouteCollection(), new Reference('context')));

return $sc;