<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit client</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lastname Input -->
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $client->lastname) }}">
                    @error('lastname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $client->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="pass" class="form-label">Password <small>(leave blank if unchanged)</small></label>
                    <input type="password" name="pass" id="pass" class="form-control">
                    @error('pass')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Images Input -->
                <div class="mb-3">
                    <label for="images" class="form-label">Images <small>(optional)</small></label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                    @error('images')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update client account</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>