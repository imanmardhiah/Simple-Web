<x-app-layout>
<div class="w-2/3 mx-auto">
<form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <div class="mt-4">
            <x-label for="title" value="Title" />
            <x-input type="text" class="block w-full mt-1" name="title" :value="old('title')"/>
            </div>
            <div class="mt-4">
            <x-label for="description" value="Description" />
            <x-input type="description" class="block w-full mt-1" name="description" :value="old('description')"/></div>
            <div class="mt-4">
            <x-label for="genre" value="Genre" />
            <x-input type="genre" class="block w-full mt-1" name="genre" :value="old('genre')"/></div>
            <div class="mt-4">
            <x-label for="production" value="Production" />
            <x-input type="production" class="block w-full mt-1" name="production" :value="old('production')"/></div>
            <div class="mt-4">
            <x-label for="releaseyear" value="Release Year" />
            <x-input type="releaseyear" class="block w-full mt-1" name="releaseyear" :value="old('releaseyear')"/></div>
            <div class="mt-4">
            <x-label for="main_picture" value="Movie Picture" />
            <input type="file" class="block w-full mt-1" name="main_picture" :value="{{ old('main_picture') }}"/></div>
            <div class="mt-4"></div>
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                <th>Cast Picture</th>
                <th>Name</th>
                </tr>
                <tr>
                <td><input type="file" class="form-control block w-full mt-1" name="addMoreInputFields[][profile_picture]"/></td>
                    <td><input type="text"  name="addMoreInputFields[][name]" placeholder="Enter name" class="form-control block w-full mt-1" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Cast</button></td>
                </tr>
            </table>
            <x-button type="submit" class="mt-4">Create</x-button>
        </form>
    </div>
</x-app-layout>
<!-- JavaScript -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields[' + i +
            '][profile_picture]" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][name]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
