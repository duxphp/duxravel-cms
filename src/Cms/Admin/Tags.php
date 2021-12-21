<?php

namespace Modules\Cms\Admin;

use Duxravel\Core\UI\Table;
use Modules\Cms\Model\CmsTags;

class Tags extends \Modules\System\Admin\Expend
{



    protected function table(): Table
    {
        $model = config('tagging.tag_model');
        $table = new Table(new $model());
        $table->title('标签管理');

        $table->filter('标签', 'name', function ($query, $value) {
            $query->where('name', 'like', '%' . $value . '%');
        })->text('请输入标签名称')->quick();

        $table->action()->button('清理标签', 'admin.cms.tags.empty')->type('ajax');

        $table->column('标签', 'name');
        $table->column('引用', 'count')->width(100);

        return $table;
    }

    public function empty()
    {
        $model = config('tagging.tag_model');
        $model::deleteUnused();
        return app_success('清理标签成功');
    }

}
