<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold text-center mb-4">Upload Image</h1>

        @if(session('success'))
            <p class="text-green-500 text-center mb-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Image Title" required class="border p-2 w-full mb-2">
            <textarea name="description" placeholder="Description" required class="border p-2 w-full mb-2"></textarea>
            <input type="file" name="image" required class="border p-2 w-full mb-2">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Upload</button>
        </form>

        <a href="{{ route('admin.view') }}" class="block text-center text-blue-500 mt-4">View Uploaded Images</a>
    </div>
</body>
</html>
