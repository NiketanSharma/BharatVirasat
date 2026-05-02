<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeritageItem extends Model
{
    use HasFactory;

    const CATEGORIES = ['festival', 'dance', 'art', 'cuisine', 'monument', 'music'];
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';

    protected $fillable = [
        'name',
        'category',
        'state',
        'short_desc',
        'long_desc',
        'image_path',
        'status',
    ];

    /**
     * Scope to get only approved items.
     */
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * Scope to get only pending items.
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope to filter by category.
     */
    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope to filter by state.
     */
    public function scopeOfState($query, $state)
    {
        return $query->where('state', $state);
    }
}
