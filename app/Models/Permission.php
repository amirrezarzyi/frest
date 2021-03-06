<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Permission::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Permission::class,'parent_id');
    }
}
