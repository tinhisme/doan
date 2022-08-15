<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $arr_status = [
        '1' => [
            'class' => 'secondary',
            'name' => 'Đang xử lí'
        ],
        '2' => [
            'class' => 'primary',
            'name' => 'Đang vận chuyển'
        ],
        '3' => [
            'class' => 'Success',
            'names=' => 'Đã Giao'
        ],
        '4' => [
            'class' => 'danger',
            'name' => 'Đã Huỷ'
        ],
        '5' => [
            'class' => 'warning',
            'name' => 'Đổi trả'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->arr_status,$this->status,"[N\A]");
    }
}
