<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Quản lý tài khoản trong admin (/admin/users): tìm kiếm, sửa, xóa.
 */
class UserController extends Controller
{
    /** Danh sách user + tìm theo keyword (tên hoặc email) */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }

        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /** Form sửa thông tin user */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /** Cập nhật tên, email, trạng thái active */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        if (! array_key_exists('is_active', $validated)) {
            $validated['is_active'] = 1;
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /** Xóa user khỏi bảng users (xóa cứng) */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
