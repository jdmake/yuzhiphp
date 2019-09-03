<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Http;


class Request extends \Symfony\Component\HttpFoundation\Request
{
    public static function gain()
    {
        return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
    }
}