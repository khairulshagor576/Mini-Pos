<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
    ];
    
    /*
    This is for group select option
    */
    public static function groupListArray ()
    {
        $groupArray=[];
        $groups=Group::all();
        foreach ($groups as  $group) 
        {
            $groupArray[$group->id]= $group->title;
        }

        return $groupArray;
    }

    public function users() 
    {
        return $this->hasMany(User::class);
    }

}
