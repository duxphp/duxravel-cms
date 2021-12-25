<?php

namespace Modules\Cms\Seeders;

use Illuminate\Database\Seeder;

class CmsMarkTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cms_mark')->insert([
            [
                'name' => '模板说明',
                'type' => 'text',
                'content' => '这是一个默认的新闻中心演示模板，包含了常用的标签示例，您可以重新创建主题，或者修改该主题进行使用。',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);


    }
}