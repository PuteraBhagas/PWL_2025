<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <a href="{{ route('items.create') }}">Add Item</a> <!-- Link untuk menuju halaman untuk menambahkan item baru -->
    <ul>
        @foreach ($items as $item)  <!-- Menampilkan nama item -->
            <li>
                {{ $item->name }}  <!-- Link untuk menuju halaman edit item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Form untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>