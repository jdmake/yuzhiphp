<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/3
// +----------------------------------------------------------------------


namespace App\Controllers\Home;


use YuZhi\Controller\AbsController;

class DefaultController extends AbsController
{

    public function indexAction()
    {
        return $this->response('dasdas');
    }


}