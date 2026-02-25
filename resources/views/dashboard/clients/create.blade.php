<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create client</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>register client</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input -->
                <div class="mb-3">
                    <label for="title" class="form-label">name</label>
                    <input type="text" class="form-control" id="lastname" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">mail</label>
                    <input type="text" class="form-control" id="mail" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">password</label>
                    <input type="text" class="form-control" id="pass" name="pass" value="{{ old('pass') }}">
                    @error('pass')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Images Input -->
                <div class="mb-3">
                    <label for="images" class="form-label">Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                    @error('images')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">register client</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, for components like modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>