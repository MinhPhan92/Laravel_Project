{{-- Danh sách user + tìm kiếm --}}
@extends('layout.admin')

@section('content')
    <div class="container">
        <h1>Users</h1>

        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif

        <form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
            <div>
                <label for="keyword">Keyword (name or email):</label>
                <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="action-link">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection

