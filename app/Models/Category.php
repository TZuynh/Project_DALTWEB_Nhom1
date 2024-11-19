<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_categories_id',
        'name',
    ];

    /**
     * Relationship: A Category has many Subcategories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function children() {
        return $this->hasMany(Category::class,  'parent_categories_id');
    }

    /**
     * Relationship: A Category has many Parent Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_categories_id');
    }

    /**
     * Relationship: A Category has many Products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
