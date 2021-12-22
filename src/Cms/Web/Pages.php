<?php

namespace Modules\Cms\Web;

use Modules\Article\Resource\ArticleCollection;
use Modules\Cms\Web\Base;

class Pages extends Base
{
    public function index($id)
    {
        $info = \Modules\Cms\Model\CmsPage::find($id);
        if (!$info) {
            app_error('页面不存在', 404);
        }
        $tpl = $info->tpl ?: 'page';
        $this->meta($info->name, $info->keywords, $info->description);
        $this->assign('info', $info ?: collect());
        return $this->view($tpl);
    }
}
