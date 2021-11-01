<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body'
    ];

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('body', 'like', '%' . $filters['search'] . '%')
            );
        }

        if ($filters['category'] ?? false) {
            $query->whereHas(
                'category',
                fn ($query) => $query->where('slug', $filters['category'])
            );
        }

        if ($filters['author'] ?? false) {
            $query->whereHas(
                'author',
                fn ($query) => $query->where('username', $filters['author'])
            );
        }
    }
}
