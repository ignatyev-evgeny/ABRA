<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketsModel extends Model {

    protected $table = 'baskets';

    protected $fillable = [
        'user_id',
        'session_id',
        'goods',
    ];

    protected $casts = [
        'goods' => 'array',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
