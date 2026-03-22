<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Danh mục — có thể lồng nhau (parent_id).
 * is_delete: xóa mềm; quan hệ parent/children dùng cho cây danh mục.
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'is_active',
        'parent_id',
        'is_delete',
    ];

    /** Danh mục cha (null nếu là danh mục gốc) */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /** Các danh mục con trực tiếp */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /** Tất cả sản phẩm thuộc danh mục này */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
