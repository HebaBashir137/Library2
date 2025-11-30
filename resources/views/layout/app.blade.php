<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f8f9fa;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background: #495057;
            color: #fff;
        }
        .sidebar .active {
            background: #0d6efd;
            color: #fff;
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
        <h4 class="text-center text-white mb-4">Admin Panel</h4>

        <a href="{{ route('classifications.index') }}" 
           class="{{ request()->routeIs('classifications.index') ? 'active' : '' }}">
            <i class="fa fa-list me-2"></i> Classifications
        </a>

        {{-- Add more menu items here --}}
        <a href="#">
            <i class="fa fa-users me-2"></i> Users
        </a>

        <a href="#">
            <i class="fa fa-cog me-2"></i> Settings
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
