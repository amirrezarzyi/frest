<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory; 

    protected $fillable =
    [
        'title', 
        'parent_id', 
        'national_code', 
        'manager_id', 
        'inderpent', 
        'email', 
        'phone', 
        'address', 
        'fax', 
        'website', 
        'logo', 
        'slug', 
        'status', 
    ];

    public function parent()
    {
        return $this->belongsTo(Role::class);
    }
}
