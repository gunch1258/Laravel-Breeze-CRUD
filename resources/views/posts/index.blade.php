<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add
                        New Post</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-user"></i>Title</th>
                                <th><i class="fas fa-address-card"></i>Category</th>
                                <th><i class="fas fa-cog"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category ? $post->category->name : 'uncategorized' }}</td>
                                    <td><a href="{{ route('posts.edit', $post) }}" class="btn btn-dark"
                                            class="d-inline">Edit</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm ('Are you sure you want to delete this post?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
