<?php

namespace Modules\Cms\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CmsMenuTableSeeder::class);
        $this->call(CmsMenuItemsTableSeeder::class);
        $this->call(CmsMarkTableSeeder::class);
    }
}
