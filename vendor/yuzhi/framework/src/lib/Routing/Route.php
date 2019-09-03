<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Routing;


use Symfony\Component\Routing\RouteCollection;

class Route
{
    /**
     * @var RouteCollection
     */
    private static $routes;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        self::$routes = new RouteCollection();
    }

    static public function create()
    {
        return new static();
    }

    static public function get($name, $path, $callable)
    {
        if(is_string($callable)) {
            $callable = explode('@', $callable);
        }

        self::$routes->add($name, new \Symfony\Component\Routing\Route(
            $path, [
                '_controller' => $callable
        ]));
    }

    public static function getRouteCollection()
    {
        return self::$routes;
    }
}