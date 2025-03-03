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
    <a href="{{ route('items.create') }}">Add Item</a> <!--Membuat link ke halaman tambah item.-->
    <ul>
        @foreach ($items as $item)
            <li>
                {{ $item->name }} - 
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!--Membuat link ke halaman edit item.-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!--Mengarah ke metode destroy() dalam ItemController.-->
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>