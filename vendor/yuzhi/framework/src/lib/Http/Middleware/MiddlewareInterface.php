<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Http\Middleware;


use Closure;

interface MiddlewareInterface
{
    /**
     * 中间件处理方法
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next);
}