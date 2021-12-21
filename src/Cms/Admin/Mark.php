<?php

namespace Modules\Cms\Admin;

use Duxravel\Core\UI\Form;
use Duxravel\Core\UI\Table;
use Modules\Cms\Model\CmsMark;

class Mark extends \Modules\System\Admin\Expend
{

    public string $model = CmsMark::class;

    protected function table(): Table
    {
        $table = new Table(new $this->model());
        $table->title('模板标记');
        $table->action()->button('添加', 'admin.cms.mark.page')->icon('plus')->type('dialog');

        $table->column('#', 'mark_id')->width(80);
        $table->column('名称', 'name');
        $column = $table->column('操作')->width('180')->align('right');
        $column->link('编辑', 'admin.cms.mark.page', ['id' => 'mark_id'])->type('dialog');
        $column->link('删除', 'admin.cms.mark.del', ['id' => 'mark_id'])->type('ajax', ['method' => 'post']);
        return $table;
    }

    public function form(int $id = 0): Form
    {
        $form = new Form(new $this->model());
        $form->dialog(true);
        $form->setKey('mark_id', $id);
        $info = $form->info();
        $form->text('标记名称', 'name');
        $form->radio('标记类型', 'type', [
            'text' => '纯文本',
            'editor' => '富文本',
            'image' => '图片',
            'file' => '文件',
        ])->switch('type');
        $form->textarea('标记内容', 'type_text')->value($info->type === 'text' ? $info->content : '')->group('type', 'text');
        $form->editor('标记内容', 'type_editor')->value($info->type === 'editor' ? $info->content : '')->group('type', 'editor');
        $form->image('标记内容', 'type_image')->value($info->type === 'image' ? $info->content : '')->group('type', 'image');
        $form->file('标记内容', 'type_file')->value($info->type === 'file' ? $info->content : '')->group('type', 'file');
        $form->before(function ($data, $type, $model) {
            $model->content = $data['type_' . $data['type']];
        });
        return $form;
    }

}
