<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class MachineDetail extends Model
{
    // use HasApiTokens, HasFactory, Notifiable;

    # 資料表名稱
    protected $table = 'machines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'mac_addr',
        'status',
        'create_dtm',
    ];

    /**
     * JSON 序列化日期。
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
