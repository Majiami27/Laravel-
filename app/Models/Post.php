<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Post extends Model
{
    protected $fillable = [
        'type',
        'title',
        'content',
        'tags',
        'establish_date'
    ];

    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = implode(',', $value);
    }

    /**
     * 为数组 / JSON 序列化准备日期。
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
