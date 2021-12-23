<?php

namespace Modules\Cms\Admin;

use Duxravel\Core\UI\Table;
use Modules\Cms\Model\CmsTags;

class Tags extends \Modules\System\Admin\Expend
{



    protected function table(): Table
    {
        $model = CmsTags::class;
        $table = new Table(new $model());
        $table->title('标签管理');

        $table->filter('标签', 'name', function ($query, $value) {
            $query->where('name', 'like', '%' . $value . '%');
        })->text('请输入标签名称')->quick();

        $table->column('标签', 'name');
        $table->column('引用', 'count')->width(100);

        return $table;
    }

}
