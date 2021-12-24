<?php

namespace Modules\Cms\Web;

use Modules\Article\Resource\ArticleCollection;
use Modules\Cms\Web\Base;

class Form extends Base
{
    public function index($id)
    {
        $formInfo = \Duxravel\Core\Service\Form::form($id);
        $this->meta($formInfo->name);
        $this->assign('formInfo', $formInfo);
        return $this->view($formInfo->tpl_list);
    }

    public function info($id)
    {
        [$info, $formInfo] = \Duxravel\Core\Service\Form::info($id);

        $tpl = $formInfo->tpl_info ?: 'page';
        $this->meta($formInfo->name);
        $this->assign('formInfo', $formInfo);
        $this->assign('info', $info);
        return $this->view($tpl);
    }

    public function push($id)
    {
        $formInfo = \Duxravel\Core\Service\Form::push($id);
        return app_success('提交成功' . ($formInfo->audit ? '，请耐心等待审核' : ''));
    }
}
