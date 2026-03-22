<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Quy tắc validate khi thêm sản phẩm (POST /admin/products).
 * Tách khỏi controller để dễ đọc và tái sử dụng.
 */
class StoreProductRequest extends FormRequest
{
    /** true = mọi user đã đăng nhập đều được (route đã có middleware auth) */
    public function authorize(): bool
    {
        return true;
    }

    /** Các rule: giá, giá sale <= giá gốc, ảnh định dạng, category tồn tại nếu có */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
