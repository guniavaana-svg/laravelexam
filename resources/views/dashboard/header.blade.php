<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dashboardNavbar" aria-controls="dashboardNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="dashboardNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- Posts --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Posts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="postsDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard.posts.index') }}">List Posts</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard.posts.create') }}">Create Post</a></li>
                    </ul>
                </li>

                {{-- Categories --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard.categories.index') }}">List Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard.categories.create') }}">Create Category</a></li>
                    </ul>
                </li>

                {{-- Clients --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="clientsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clients
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="clientsDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard.clients.index') }}">List Clients</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard.clients.create') }}">Create Client</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>