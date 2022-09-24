@if (session('success'))
    <div class="my-4 w-2/3 mx-auto bg-green-100 text-green-900 p-3 rounded-lg">{{ session('success') }}</div>
@endif