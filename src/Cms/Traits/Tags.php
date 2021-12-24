<?php

namespace Modules\Cms\Traits;

use Modules\Cms\Model\CmsTags;

/**
 * Class RoleHas
 * @package Duxravel\Core\Traits
 */
trait Tags
{

    /**
     * 标签关联
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(CmsTags::class, 'has', 'cms_tags_has', 'has_id', 'tag_id');
    }


    /**
     * 同步标签
     * @param $tags
     */
    public function retag($tags)
    {
        $tags = $this->formatTags($tags);
        // 获取已关联标签
        $infoTags = $this->tags->pluck('name')->toArray();

        $deletions = array_diff($infoTags, $tags);
        $additions = array_diff($tags, $infoTags);

        $this->untag($deletions);

        foreach ($additions as $vo) {
            $this->addTag($vo);
        }

    }

    /**
     * 删除标签
     * @param array $tags
     */
    public function untag($tags = [])
    {
        if ($tags) {
            $tags = $this->formatTags($tags);
        }else {
            $tags = $this->tags->pluck('name')->toArray();
        }
        foreach ($tags as $vo) {
            $tagInfo = $this->tags()->where('name', $vo)->first();
            // 移除关联
            $this->tags()->detach($tagInfo->tag_id);
            if ($tagInfo->count <= 1) {
                // 剩余一个删除标签
                $tagInfo->delete();
            } else {
                $tagInfo->decrement('count');
            }
        }
    }

    /**
     * 增加单个标签
     * @param $tag
     */
    private function addTag($tag) {
        $tagName = trim($tag);

        if(strlen($tagName) == 0) {
            return;
        }

        $tagInfo = $this->tags()->where('name', $tagName)->first();
        if ($tagInfo) {
            // 递增引用次数
            $tagInfo->increment('count');
            $tagId = $tagInfo->tag_id;
        } else {
            // 创建应用
            $tagInfo = new CmsTags;
            $tagInfo->name = $tagName;
            $tagInfo->count = 1;
            $tagInfo->view = 1;
            $tagInfo->save();
            $tagId = $tagInfo->tag_id;
        }
        $this->tags()->attach($tagId);
    }


    /**
     * 格式化标签
     * @param $tags
     * @return array
     */
    private function formatTags($tags)
    {
        if (is_string($tags)) {
            $tags = explode(',', $tags);
        }

        if (is_array($tags)) {
            $tags = array_filter($tags);
        }
        $tags = array_map('trim', $tags);

        return array_values($tags);
    }


}
