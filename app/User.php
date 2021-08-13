<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $fillable=['admin_id','group_id','name','email','phone','address'];

    public function group() 
    {
        return $this->belongsTO(Group::class);
    }

    public function sales ()
    {
        return $this->hasMany(SaleInvoice::class);
    }

    public function purchases ()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function payments ()
    {
        return $this->hasMany(Payment::class);
    }

    public function receipts ()
    {
        return $this->hasMany(Receipt::class);
    }

    public function admin() 
    {
        return $this->belongsTO(Admin::class);
    }


}


