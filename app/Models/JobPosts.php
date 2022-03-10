<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class JobPosts extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'job_description',
        'job_type',
        'offered_salary',
        'experience',
        'qualification',
        'country',
        'state',
        'city',
        'categories',
        'status',
    ];

    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    
  

}
