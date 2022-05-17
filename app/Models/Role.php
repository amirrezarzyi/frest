<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory; 

    protected $guard_name = 'web';
  


    public function parent()
    {
        return $this->belongsTo(Role::class);
    }

    public function childrens()
    {
        return $this->hasMany(Role::class,'parent_id');
    }
 
}
