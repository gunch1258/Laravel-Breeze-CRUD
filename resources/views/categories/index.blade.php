<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        @vite('resources/css/app.css')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add
                        New Category</a>

                    <table class="table">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th class="col-md-8 themed-grid-col"><i class="fas fa-user"></i>Name</th>
                                        <th class="col-md-4 themed-grid-col"><i class="fas fa-cog"></i>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-dark"
                                                    class="d-inline">Edit </a>

                                                <x-danger-button x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-categories-deletion')">{{ __('Delete') }}
                                                </x-danger-button>
                                                <x-modal name="confirm-categories-deletion" focusable>
                                                    <form method="POST"
                                                        action="{{ route('categories.destroy', $category) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <h2 class="text-lg font-medium text-gray-900">
                                                            {{ __('Are you sure you want to delete category?') }}
                                                        </h2>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-danger-button class="ms-3">
                                                                {{ __('Delete') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                </x-modal>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
