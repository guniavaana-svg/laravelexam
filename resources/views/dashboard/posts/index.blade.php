<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Search + Create Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form class="d-flex" action="{{ route('dashboard.posts.index') }}" method="GET">
            <input class="form-control me-2" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Find</button>
        </form>
        <a href="{{ route('dashboard.posts.create') }}" class="btn btn-success">Create Posts</a>
    </div>

    <!-- Posts List -->
    <div class="list-group">
        @foreach($posts as $post)
            <div class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-2 shadow-sm rounded">
                <div>
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <small class="text-muted">Category: {{ $post->category->name }}</small>
                </div>

                <div class="d-flex gap-2 mt-2 mt-sm-0">
                    <a href="{{ route('dashboard.posts.edit', $post->id) }}" class="btn btn-sm btn-info text-white">Edit</a>

                    <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>