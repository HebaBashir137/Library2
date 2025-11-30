<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 12px 20px;
            display: block;
            color: #ddd;
            text-decoration: none;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background: #495057;
            color: #fff;
        }
        .sidebar .active {
            background: #0d6efd;
            color: white;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar position-fixed">
        <h4 class="text-center text-white mb-4">Admin Dashboard</h4>

    <a href="{{ route('dashboard.index') }}"
            class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <i class="fa fa-home me-2"></i> Dashboard

        <!-- Classifications -->
        <a href="{{ route('classifications.index') }}"
            class="{{ request()->routeIs('classifications.*') ? 'active' : '' }}">
            <i class="fa fa-list me-2"></i> Classifications
        </a>

        <!-- Categories -->
        <a href="{{ route('categories.index') }}"
            class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="fa fa-folder-open me-2"></i> Categories
        </a>
        <!--Type-->
        <a href="{{ route('types.index') }}"
            class="{{ request()->routeIs('types.*') ? 'active' : '' }}">
            <i class="fa fa-tags me-2"></i> Types
        <!--book-->
        <a href="{{ route('books.index') }}"
            class="{{ request()->routeIs('books.*') ? 'active' : '' }}">
            <i class="fa fa-book me-2"></i> Books
        </a>


        <!-- Add more menu items here -->
        <a href="#">
            <i class="fa fa-user me-2"></i> Users
        </a>

        <a href="#">
            <i class="fa fa-cog me-2"></i> Settings
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
        @yield('scripts')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
