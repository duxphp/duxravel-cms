<?php

namespace Modules\Cms\Listeners;

/**
 * 数据安装接口
 */
class InstallSeed
{

    /**
     * @param $event
     * @return array[]
     */
    public function handle($event)
    {
        return \Modules\Cms\Seeders\DatabaseSeeder::class;
    }
}
