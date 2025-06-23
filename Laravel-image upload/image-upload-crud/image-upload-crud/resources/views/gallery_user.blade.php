<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Image Gallery</h1>

        <div class="grid grid-cols-3 gap-4">
            @foreach($images as $image)
                <div class="bg-white p-2 shadow rounded">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="w-100 h-40 object-cover">
                    <p class="text-center mt-2 font-bold">{{ $image->title }}</p>
                    <p class="text-center text-gray-600">{{ $image->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
