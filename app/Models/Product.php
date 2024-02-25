<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Enums\ProductStatus;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = ['name', 'price', 'description', 'category_id', 'brand_id', 'cover', 'status'];
    protected $table = 'products';
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $casts = [
        'price' => 'float',
    ];


    protected static function booted(): void
    {
        // static::addGlobalScope(new ActiveScope);
    }

    public function scopeActive($query)
    {
        return $query->where('status', ProductStatus::ACTIVE());
    }

}
