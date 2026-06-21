<!-- Library2\resources\views\layout\app.blade.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Elegant Purple Color Palette */
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
            
            /* Accent Purples */
            --amethyst: #8B5CF6;
            --lavender: #A78BFA;
            --orchid: #D946EF;
            --violet: #7C3AED;
            --mauve: #C026D3;
            
            /* Neutrals with Purple Tint */
            --neutral-50: #FAFAFB;
            --neutral-100: #F5F6F8;
            --neutral-200: #EBEDF0;
            --neutral-300: #E0E4EA;
            --neutral-400: #C9CED8;
            --neutral-500: #A1A8B9;
            --neutral-600: #7A8499;
            --neutral-700: #5A6478;
            --neutral-800: #3A4257;
            --neutral-900: #1A2236;
            
            /* Dark Theme Purples */
            --dark-primary: #A855F7;
            --dark-surface: #0F0B1D;
            --dark-card: #1A1530;
            --dark-border: #2D2648;
            --dark-accent: #8B5CF6;
            
            /* Glass Effects */
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-dark: rgba(26, 21, 48, 0.85);
            --glass-border: rgba(168, 85, 247, 0.15);
            --glass-shadow: 0 8px 32px rgba(168, 85, 247, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #FAF5FF 0%, #F3E8FF 100%);
            color: var(--neutral-900);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        body.dark-theme {
            background: linear-gradient(135deg, #0F0B1D 0%, #1A1530 100%);
            color: #E9D5FF;
        }
        
        /* Elegant Purple Navigation */
        .purple-nav {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--glass-shadow);
        }
        
        .dark-theme .purple-nav {
            background: var(--glass-dark);
            border-bottom: 1px solid rgba(168, 85, 247, 0.2);
        }
        
        /* Brand Logo */
        .brand-logo-purple {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.75rem;
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--orchid) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            letter-spacing: -0.5px;
        }
        
        .brand-logo-purple i {
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--orchid) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Navigation Links */
        .nav-purple {
            color: var(--neutral-700);
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 0.75rem;
            margin: 0 0.25rem;
        }
        
        .nav-purple:hover {
            color: var(--purple-700);
            background: rgba(168, 85, 247, 0.1);
            transform: translateY(-1px);
        }
        
        .dark-theme .nav-purple {
            color: #D8B4FE;
        }
        
        .dark-theme .nav-purple:hover {
            color: var(--dark-primary);
            background: rgba(168, 85, 247, 0.15);
        }
        
        .nav-purple.active {
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--purple-700) 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(168, 85, 247, 0.25);
        }
        
        /* Search Bar */
        .search-purple {
            position: relative;
            max-width: 320px;
        }
        
        .search-purple input {
            width: 100%;
            padding: 0.875rem 1.25rem 0.875rem 3.25rem;
            border: 2px solid var(--purple-200);
            border-radius: 1rem;
            background: var(--purple-50);
            color: var(--purple-800);
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .dark-theme .search-purple input {
            background: rgba(168, 85, 247, 0.1);
            border-color: var(--purple-700);
            color: #E9D5FF;
        }
        
        .search-purple input:focus {
            outline: none;
            border-color: var(--purple-500);
            box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.15);
            background: white;
        }
        
        .dark-theme .search-purple input:focus {
            background: rgba(168, 85, 247, 0.15);
            box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.25);
        }
        
        .search-purple i {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--purple-500);
            font-size: 1rem;
            z-index: 1;
        }
        
        /* Profile Dropdown */
        .profile-purple {
            background: linear-gradient(135deg, var(--purple-500) 0%, var(--purple-600) 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
        }
        
        .profile-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--purple-700) 100%);
        }
        
        .profile-purple i {
            font-size: 1.25rem;
        }
        
        /* Theme Toggle */
        .theme-toggle-purple {
            background: linear-gradient(135deg, var(--purple-400) 0%, var(--amethyst) 100%);
            border: none;
            width: 56px;
            height: 56px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }
        
        .theme-toggle-purple:hover {
            transform: translateY(-2px) rotate(15deg);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }
        
        /* Main Container */
        .purple-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Purple Glass Card */
        .purple-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--purple-200);
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(168, 85, 247, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .dark-theme .purple-card {
            background: rgba(26, 21, 48, 0.8);
            border-color: var(--purple-700);
        }
        
        .purple-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--purple-500), var(--orchid));
            opacity: 0.8;
        }
        
        .purple-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(168, 85, 247, 0.15);
            border-color: var(--purple-400);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--orchid) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Elegant Purple Button */
        .btn-purple {
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--purple-700) 100%);
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 1rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(168, 85, 247, 0.3);
        }
        
        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
            background: linear-gradient(135deg, var(--purple-700) 0%, var(--purple-800) 100%);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .purple-container {
                padding: 2rem 1rem;
            }
            
            .nav-purple {
                padding: 0.5rem 1rem;
                margin: 0.25rem;
            }
            
            .search-purple {
                max-width: 100%;
                margin: 1rem 0;
            }
        }
        
        /* Purple Accents */
        .purple-accent {
            color: var(--purple-500);
        }
        
        .purple-light-bg {
            background: var(--purple-50);
        }
        
        .dark-theme .purple-light-bg {
            background: rgba(168, 85, 247, 0.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg purple-nav">
    <div class="container-fluid px-4">
        <a class="navbar-brand brand-logo-purple" href="/">
            <i class="bi bi-book-half"></i>
            <span>Library</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list text-purple"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                @auth('admin')
    <a class="nav-purple {{ request()->is('books') ? 'active' : '' }}" href="{{ route('books.index') }}">
        <i class="bi bi-book me-2"></i>
        Browse Books

    </a>
    @else
    <a class="nav-purple {{ request()->is('books') ? 'active' : '' }}" href="{{ route('user.book.index') }}">
        <i class="bi bi-book me-2"></i>
        Browse Books
        
    </a>
    @endauth
</li>

                <li class="nav-item">
                    <a class="nav-purple {{ request()->is('about') ? 'active' : '' }}" href="/about">
                        <i class="bi bi-info-circle me-2"></i>
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-purple {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                        <i class="bi bi-envelope me-2"></i>
                        Contact
                    </a>
                </li>
               
            </ul>
            
           <!-- <div class="d-flex align-items-center gap-3">
                <div class="search-purple">
                    <i class="bi bi-search"></i>
                    <input type="search" placeholder="Search library...">
                </div>-->
                
                <div class="dropdown">
                    <button class="btn profile-purple dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span>Account</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2 border-0 shadow-lg" style="background: white; border: 1px solid var(--purple-200);">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-3 px-4 rounded" href="{{ route('user.login') }}">
                                <i class="bi bi-box-arrow-in-right purple-accent"></i>
                                <span class="purple-accent">Sign In</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-3 px-4 rounded" href="{{ route('user.register') }}">
                                <i class="bi bi-person-plus purple-accent"></i>
                                <span class="purple-accent" >Create Account</span>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-3 px-4 rounded" href="{{ route('logout') }}">
                                <i class="bi bi-person-plus purple-accent"></i>
                                <span class="purple-accent">logout</span>
                            </a>
                        </li>
                       
                    
                    </ul>
                </div>
                
                <button class="theme-toggle-purple" id="theme-toggle">
                    <i class="bi bi-moon-stars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="purple-container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
<script>
    // Theme Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = themeToggle.querySelector('i');
    
    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
        
        if (document.body.classList.contains('dark-theme')) {
            themeIcon.className = 'bi bi-sun';
            themeToggle.style.background = 'linear-gradient(135deg, var(--orchid) 0%, var(--mauve) 100%)';
        } else {
            themeIcon.className = 'bi bi-moon-stars';
            themeToggle.style.background = 'linear-gradient(135deg, var(--purple-400) 0%, var(--amethyst) 100%)';
        }
    });
    
    // Add active class to current page nav item
    document.querySelectorAll('.nav-purple').forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
    
    // Smooth scroll for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
</body>
</html>