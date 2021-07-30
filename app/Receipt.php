<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable=['date','amount','note','user_id','admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
