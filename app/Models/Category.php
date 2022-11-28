<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, Filterable, HasTranslations, Sluggable;

    protected $guarded = [];

    public $translatable = ['name'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'enName',
            ]
        ];
    }

    public function getEnNameAttribute()
    {
        return $this->getTranslation('name', 'en');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id') ;
    }
}
