<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin - Manage Images</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.upload') }}" class="btn btn-success">Upload New Image</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td><img src="{{ asset('storage/' . $image->image_path) }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;"></td>
                            <td>{{ $image->title }}</td>
                            <td>{{ $image->description }}</td>
                            <td>

                                <!-- Edit Button -->
                                <a href="{{ route('admin.edit', $image->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.delete', $image->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
