<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------

namespace YuZhi\Foundation;

use YuZhi\Foundation\Http\HttpKernel;

class Application
{
    private $basePath;

    /**
     * Application constructor.
     * @param $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }


    public function make()
    {
        return new HttpKernel($this->basePath);
    }
}