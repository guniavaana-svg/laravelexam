<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .client-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .client-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .client-info li {
            list-style: none;
        }
        .client-actions form {
            display: inline;
        }
        .client-actions button {
            min-width: 70px;
        }
        .list-group-item {
            padding: 1rem 1.5rem;
        }
        .search-bar input {
            max-width: 250px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <!-- Search + Create Button -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <form class="d-flex search-bar" action="{{ route('dashboard.clients.index') }}" method="GET">
            <input class="form-control me-2" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Find</button>
        </form>
        <a href="{{ route('dashboard.clients.create') }}" class="btn btn-success">Register Client</a>
    </div>

    <!-- Clients List -->
    <div class="list-group">
        @foreach($clients as $client)
            <div class="list-group-item client-card d-flex justify-content-between align-items-center flex-wrap mb-3 shadow-sm rounded">
                
                <!-- Client Info -->
                <div class="client-info">
                    <li><strong>Name:</strong> {{ $client->name }}</li>
                    <li><strong>Lastname:</strong> {{ $client->lastname }}</li>
                    <li><strong>Email:</strong> {{ $client->email ?? 'N/A' }}</li>
                    <li><strong>Password:</strong> {{ $client->pass }}</li>
                </div>

                <!-- Actions -->
                <div class="client-actions d-flex gap-2 mt-2 mt-sm-0">
                    <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-sm btn-info text-white">Edit</a>

                    <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
        {{ $clients->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>