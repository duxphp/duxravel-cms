<?php

namespace Modules\Cms\Seeders;

use Illuminate\Database\Seeder;

class CmsMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_menu_items')->delete();
        
        \DB::table('cms_menu_items')->insert(array (
            0 => 
            array (
                'item_id' => 1,
                'parent_id' => NULL,
                'menu_id' => 2,
                'name' => '关于我们',
                'url' => 'www.duxravel.com',
                '_lft' => 1,
                '_rgt' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ),
        ));
        
        
    }
}