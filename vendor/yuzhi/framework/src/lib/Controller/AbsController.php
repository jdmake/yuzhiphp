<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Controller;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use YuZhi\Http\Request;
use YuZhi\Http\Response;

class AbsController
{
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * AbsController constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * 获取服务
     * @param $id
     * @return object|null
     * @throws \Exception
     */
    protected function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * 获取 request
     * @return Request
     * @throws \Exception
     */
    protected function request()
    {
        return $this->get('request');
    }

    /**
     * 获取 response
     * @param $content
     * @return Response
     * @throws \Exception
     */
    protected function response($content)
    {
        return $this->get('response')->setContent($content);
    }

    /**
     * 获取输入
     * @param string $key
     * @param string $default
     * @return mixed
     * @throws \Exception
     */
    protected function input(string $key, $default = '')
    {
        return $this->request()->get($key, $default);
    }
}