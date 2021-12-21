<?php

namespace Modules\Cms\Admin;

use Duxravel\Core\UI\Form;
use Duxravel\Core\UI\Table;

class Page extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\Cms\Model\CmsPage::class;

    /**
     * @return Table
     * @throws \Exception
     */
    protected function table(): Table
    {
        $table = new Table(new $this->model());
        $table->title('自定义页面');
        $table->action()->button('添加', 'admin.cms.page.page')->icon('plus')->type('dialog');

        $table->column('#', 'page_id')->width(80);
        $table->column('页面名称', 'name');
        $table->column('页面信息', 'keywords')->desc('description');
        $table->column('模板文件', 'tpl', static function($vo) {
            return $vo ? $vo . '.blade.php' : '-';
        });
        $column = $table->column('操作')->width('180')->align('right');
        $column->link('编辑', 'admin.cms.page.page', ['id' => 'page_id'])->type('dialog');
        $column->link('删除', 'admin.cms.page.del', ['id' => 'page_id'])->type('ajax', ['method' => 'post']);
        return $table;
    }

    /**
     * @param int $id
     * @return Form
     */
    public function form(int $id = 0): Form
    {
        $form = new Form(new $this->model());
        $form->dialog(true);
        $form->text('页面名称', 'name');
        $form->tags('页面关键词', 'keywords');
        $form->textarea('页面描述', 'description');
        $form->text('模板名称', 'tpl')->afterText('.blade.php')->prompt('模板名称为当前主题下的模板文件名');
        return $form;
    }

}
