<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', $category->name) }}" placeholder="Enter category name">
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                           @checked(old('is_active', $category->is_active))>
                    <label for="is_active" class="form-check-label">Active</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Category</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>