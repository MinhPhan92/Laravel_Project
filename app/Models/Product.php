<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Sản phẩm — bảng products.
 * is_delete = 1: xóa mềm (ẩn khỏi danh sách); is_active = 0: không bán trên shop frontend.
 */
class Product extends Model
{
    use HasFactory;

    /** Các field được phép gán hàng loạt (create/update an toàn) */
    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'stock',
        'description',
        'image',
        'category_id',
        'is_active',
        'is_delete',
    ];

    /** Mỗi sản phẩm thuộc một danh mục (nullable nếu không gán) */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
