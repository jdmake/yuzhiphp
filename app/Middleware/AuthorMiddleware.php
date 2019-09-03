<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace App\Middleware;


use Closure;
use YuZhi\Http\Middleware\MiddlewareInterface;

class AuthorMiddleware implements MiddlewareInterface
{

    /**
     * 中间件处理方法
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response;
    }
}