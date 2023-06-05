<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categories extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'categories';
    protected $fillable = ['title'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
