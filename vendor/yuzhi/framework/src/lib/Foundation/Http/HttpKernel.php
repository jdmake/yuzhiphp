<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace YuZhi\Foundation\Http;



use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use YuZhi\Controller\ControllerResolver;
use YuZhi\Http\Middleware\Middleware;
use YuZhi\Routing\Listener\RouterListener;
use YuZhi\Routing\Route;

class HttpKernel
{
    private $basePath;

    /** @var \Symfony\Component\HttpKernel\HttpKernel */
    private $kernel;

    /**
     * HttpKernel constructor.
     * @param $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }


    /**
     * 处理将其转换为响应的请求
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function handle($request)
    {

        /**
         * 获取路由器
         */
        Route::create();
        require $this->basePath . '/config/routing.php';
        $matcher = new UrlMatcher(Route::getRouteCollection(), new RequestContext());

        /**
         * 载入服务容器
         */
        $container = require $this->basePath . '/vendor/yuzhi/framework/src/lib/container.php';

        /**
         * 实例化事件派遣器
         */
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));

        /**
         * 实例化控制器选择器
         */
        $controllerResolver = new ControllerResolver($container);

        /**
         * 实例化控制器参数选择器
         */
        $argumentResolver = new ArgumentResolver();

        /**
         * 实例化响应请求
         */
        $this->kernel = new \Symfony\Component\HttpKernel\HttpKernel(
            $dispatcher,
            $controllerResolver,
            new RequestStack(),
            $argumentResolver
        );

        return $this->kernel->handle($request);
    }

    /**
     * 终止请求
     *
     * 应该在发送响应之后和关闭内核之前调用。
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        $this->kernel->terminate($request, $response);
    }

}