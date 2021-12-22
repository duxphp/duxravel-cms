<?php

namespace Modules\Cms\Web;

use Modules\Cms\Web\Base;

class Index extends Base
{

    public function index()
    {
        return $this->view('index');
    }
}
