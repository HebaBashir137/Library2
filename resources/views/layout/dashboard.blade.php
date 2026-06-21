<!-- Library2\resources\views\layout\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Elegant Purple Dashboard Colors */
            --purple-50: #FAF5FF;
            --purple-100: #F3E8FF;
            --purple-200: #E9D5FF;
            --purple-300: #D8B4FE;
            --purple-400: #C084FC;
            --purple-500: #A855F7;
            --purple-600: #9333EA;
            --purple-700: #7E22CE;
            --purple-800: #6B21A8;
            --purple-900: #581C87;
            
            /* Neutrals */
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E1;
            --gray-400: #94A3B8;
            --gray-500: #64748B;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1E293B;
            --gray-900: #0F172A;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, var(--purple-50) 0%, #F8F5FF 100%);
            color: var(--gray-800);
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        /* Royal Purple Sidebar */
        .royal-sidebar {
            width: 280px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--purple-900) 0%, #4C1D95 100%);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            padding: 2rem 0;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 30px rgba(139, 92, 246, 0.3);
        }
        
        /* Sidebar Header */
        .sidebar-header {
            padding: 0 1.5rem 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .royal-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        
        .royal-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--purple-500) 0%, #D946EF 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            box-shadow: 0 4px 15px rgba(168, 85, 247, 0.4);
            transition: transform 0.3s ease;
        }
        
        .royal-brand:hover .royal-icon {
            transform: rotate(15deg);
        }
        
        .royal-text {
            font-weight: 700;
            font-size: 1.25rem;
            color: white;
            letter-spacing: -0.5px;
        }
        
        /* Sidebar Navigation */
        .royal-nav {
            padding: 0 1rem;
            flex: 1;
        }
        
        .nav-royal {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 14px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        
        .nav-royal:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateX(6px);
        }
        
        .nav-royal.active {
            background: linear-gradient(135deg, var(--purple-500) 0%, #8B5CF6 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(168, 85, 247, 0.5);
            border-color: var(--purple-400);
        }
        
        .nav-royal.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: white;
            border-radius: 0 2px 2px 0;
        }
        
        .nav-royal-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }
        
        .nav-royal-label {
            font-weight: 500;
            font-size: 0.9375rem;
            flex: 1;
        }
        
        .nav-royal-badge {
            background: linear-gradient(135deg, #D946EF 0%, #C026D3 100%);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(217, 70, 239, 0.3);
        }
        
        /* Sidebar Footer */
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }
        
        .user-royal {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .user-royal:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        
        .user-avatar-royal {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--purple-400) 0%, #A78BFA 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.125rem;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }
        
        .user-info-royal {
            flex: 1;
        }
        
        .user-name-royal {
            font-weight: 600;
            font-size: 0.9375rem;
            color: white;
        }
        
        .user-role-royal {
            font-size: 0.8125rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Main Content */
        .royal-main {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }
        
        /* Top Bar */
        .top-bar-royal {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        
        .page-title-royal {
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--purple-800);
            margin: 0;
            background: linear-gradient(135deg, var(--purple-700) 0%, var(--purple-900) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .breadcrumb-royal {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--purple-600);
            margin-top: 0.5rem;
        }
        
        .breadcrumb-royal a {
            color: var(--purple-600);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .breadcrumb-royal a:hover {
            color: var(--purple-700);
            transform: translateY(-1px);
        }
        
        .breadcrumb-royal .separator {
            color: var(--purple-400);
        }
        
        /* Control Buttons */
        .control-royal {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .control-btn-royal {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--purple-200);
            background: white;
            color: var(--purple-600);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .control-btn-royal:hover {
            background: var(--purple-500);
            color: white;
            border-color: var(--purple-500);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(168, 85, 247, 0.3);
        }
        
        /* Content Area */
        .content-area-royal {
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Royal Purple Card */
        .royal-card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .royal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--purple-500), #D946EF);
        }
        
        .royal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--purple-400);
        }
        
        /* Stats Cards */
        .stat-royal {
            background: linear-gradient(135deg, var(--purple-50) 0%, white 100%);
            border: 1px solid var(--purple-200);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-royal:hover {
            border-color: var(--purple-500);
            box-shadow: 0 12px 30px rgba(168, 85, 247, 0.15);
            transform: translateY(-4px);
        }
        
        .stat-icon-royal {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .stat-icon-royal.primary {
            background: linear-gradient(135deg, var(--purple-500) 0%, #8B5CF6 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(168, 85, 247, 0.3);
        }
        
        /* Purple Button */
        .btn-purple {
            background: linear-gradient(135deg, var(--purple-600), var(--purple-700));
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(147, 51, 234, 0.3);
            color: white;
        }
        
        /* Table Card */
        .table-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus {
            border-color: var(--purple-500);
            box-shadow: 0 0 0 0.2rem rgba(168, 85, 247, 0.25);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .royal-sidebar {
                width: 70px;
                padding: 1rem 0;
            }
            
            .royal-main {
                margin-left: 70px;
                padding: 1rem;
            }
            
            .royal-text,
            .nav-royal-label,
            .user-info-royal,
            .nav-royal-badge {
                display: none;
            }
            
            .nav-royal {
                justify-content: center;
                padding: 1rem;
            }
            
            .nav-royal-icon {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Royal Purple Sidebar -->
    <aside class="royal-sidebar">
        <div class="sidebar-header">
            <a href="{{ route('dashboard.index') }}" class="royal-brand">
                <div class="royal-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="royal-text">Admin</div>
            </a>
        </div>
        
        <div class="royal-nav">
            <a href="{{ route('dashboard.index') }}"
               class="nav-royal {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                <div class="nav-royal-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="nav-royal-label">Dashboard</div>
            </a>

            <a href="{{ route('classifications.index') }}"
               class="nav-royal {{ request()->routeIs('classifications.*') ? 'active' : '' }}">
                <div class="nav-royal-icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div class="nav-royal-label">Classifications</div>
                <span class="nav-royal-badge">5</span>
            </a>

            <a href="{{ route('categories.index') }}"
               class="nav-royal {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <div class="nav-royal-icon">
                    <i class="fas fa-folder-tree"></i>
                </div>
                <div class="nav-royal-label">Categories</div>
            </a>
            
            <a href="{{ route('types.index') }}"
               class="nav-royal {{ request()->routeIs('types.*') ? 'active' : '' }}">
                <div class="nav-royal-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="nav-royal-label">Types</div>
            </a>
            
            <a href="{{ route('books.index') }}"
               class="nav-royal {{ request()->routeIs('books.*') ? 'active' : '' }}">
                <div class="nav-royal-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="nav-royal-label">Books</div>
                <span class="nav-royal-badge">{{ \App\Models\Book::count() }}</span>
            </a>
        </div>
        
        <div class="sidebar-footer">
            <!--<div class="user-royal">
                <div class="user-avatar-royal">AD</div>
                <div class="user-info-royal">
                    <div class="user-name-royal">Admin User</div>
                    <div class="user-role-royal">Super Admin</div>-->
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="royal-main">
        <div class="content-area-royal">
            @yield('content')
        </div>
        
        @yield('scripts')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>