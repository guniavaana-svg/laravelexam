<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Categories Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form class="d-flex" action="{{ route('dashboard.categories.index') }}" method="GET">
            <input class="form-control me-2" type="text" placeholder="Search category..." name="search"
                   value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Find</button>
        </form>
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-success">Create Category</a>
    </div>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="mb-2">Status: 
                                @if($category->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </p>
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-info text-white flex-grow-1">Edit</a>
                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

