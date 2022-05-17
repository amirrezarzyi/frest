<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Organization extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasRoles;
 
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'national_code'
            ]
        ];
    }

    protected $fillable = ['title', 'national_code' , 'parent_id' , 'manager_id' , 'inderpent' , 'email' , 'phone' , 'address' , 'fax' , 'website' , 'logo' , 'slug' , 'status'];

    protected $guard_name = 'web';

    public function manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    // public function childrens()
    // {
    //     return $this->hasMany(Organization::class,'parent_id');
    // }

    public function getFatherAttribute()
    {
        $organization = $this;
        $parents = [];

        while ($organization->parent_id != null)
        {
            $organization = $organization->parent;
            array_push($parents,$organization);
        }
        foreach ($parents as $parent){
            if ($parent->parent_id == null){
                return $parent;
            }
        }
    }
}
