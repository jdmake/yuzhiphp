<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Http\Middleware;


class Middleware
{
    private static $response;
    private static $queue;

    public static function init(array $queue, $controller, $arguments)
    {
        foreach ($queue as $value) {
            static::$queue[] = [
                [new $value, 'handle'],
                null
            ];
        }
        static::$queue = array_reverse(static::$queue);
        static::$queue[] = [
            $controller,
            $arguments
        ];
    }

    //调用中间件
    public static function dispatch($request)
    {
        return call_user_func(static::resolve(), $request);
    }

    //返回闭包函数
    public static function resolve()
    {
        return function ($request) {
            $middleware = array_shift(static::$queue);
            if ($middleware != null) {
                list($call, $param) = $middleware;
                return call_user_func_array($call, [$request, static::resolve()]);
            }
        };
    }

    public static function getResponse()
    {
        return static::$response;
    }

}