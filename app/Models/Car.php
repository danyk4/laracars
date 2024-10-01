<?php

namespace App\Models;

use App\Enums\Cars\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'status' => Status::class, // to get a name from enum, not value
    ];
    protected $guarded = []; // all methods writable - opposite to fillable


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCanDeleteAttribute()
    {
        return $this->status === Status::DRAFT || $this->status === Status::CANCELLED;
    }

    public function scopeOfActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }
}


