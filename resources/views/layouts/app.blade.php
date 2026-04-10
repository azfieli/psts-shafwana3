<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pesat Boarding School - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f5f7fa;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Top Navigation Bar */
        .navbar-top {
            background: linear-gradient(135deg, #1e5a96 0%, #2d7dc4 100%);
            box-shadow: 0 2px 12px rgba(0,0,0,0.12);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-top .brand {
            font-weight: 700;
            font-size: 20px;
            color: white;
            letter-spacing: 0.5px;
        }
        
        .navbar-top .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
            margin: 0;
        }
        
        .navbar-top .nav-menu a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 0;
            border-bottom: 2px solid transparent;
        }
        
        .navbar-top .nav-menu a:hover,
        .navbar-top .nav-menu a.active {
            color: white;
            border-bottom-color: #ffd700;
        }
        
        .navbar-top .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-left: auto;
        }
        
        .navbar-top .user-btn {
            background-color: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .navbar-top .user-btn:hover {
            background-color: rgba(255,255,255,0.3);
        }
        
        /* Sidebar Navigation */
        .sidebar-nav {
            background: white;
            min-height: calc(100vh - 70px);
            box-shadow: 2px 0 8px rgba(0,0,0,0.08);
            padding: 2rem 0;
            position: sticky;
            top: 70px;
        }
        
        .sidebar-nav .nav-section {
            margin-bottom: 2rem;
        }
        
        .sidebar-nav .nav-title {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            color: #999;
            padding: 0.5rem 1.5rem;
            letter-spacing: 0.5px;
        }
        
        .sidebar-nav .nav-link {
            color: #666;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .sidebar-nav .nav-link i {
            width: 20px;
        }
        
        .sidebar-nav .nav-link:hover {
            background-color: #f5f7fa;
            color: #1e5a96;
            border-left-color: #1e5a96;
        }
        
        .sidebar-nav .nav-link.active {
            background-color: #e8f2ff;
            color: #1e5a96;
            border-left-color: #1e5a96;
            font-weight: 600;
        }
        
        /* Main Content */
        .main-content {
            background-color: #f5f7fa;
            min-height: calc(100vh - 70px);
        }
        
        .content-area {
            padding: 2rem;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #1e5a96 0%, #2d7dc4 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(30, 90, 150, 0.2);
        }
        
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 36px;
            letter-spacing: -0.5px;
        }
        
        .hero-section p {
            opacity: 0.95;
            margin-bottom: 0;
            font-size: 16px;
            line-height: 1.6;
        }
        }
        
        /* Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            border-top: 4px solid #1e5a96;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(30, 90, 150, 0.15);
        }
        
        .stat-card .stat-icon {
            font-size: 28px;
            color: #1e5a96;
            margin-bottom: 1rem;
        }
        
        .stat-card .stat-title {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 0.5rem;
            letter-spacing: 0.5px;
        }
        
        .stat-card .stat-value {
            font-size: 36px;
            font-weight: 700;
            color: #1e5a96;
        }
        
        /* Course Cards Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .course-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            border-top: 4px solid #ffd700;
        }
        
        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.12);
        }
        
        .course-card .course-header {
            background: linear-gradient(135deg, #1e5a96 0%, #2d7dc4 100%);
            color: white;
            padding: 1.5rem;
        }
        
        .course-card .course-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .course-card .course-code {
            font-size: 12px;
            opacity: 0.8;
        }
        
        .course-card .course-body {
            padding: 1.5rem;
        }
        
        .course-card .course-description {
            font-size: 13px;
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .course-card .course-students {
            font-size: 13px;
            color: #999;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .course-card .course-students i {
            color: #1e5a96;
        }
        
        /* Alert Messages */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        /* Tables */
        .table-responsive {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead {
            background: linear-gradient(135deg, #1e5a96 0%, #2d7dc4 100%);
            color: white;
        }
        
        .table tbody tr:hover {
            background-color: #f5f7fa;
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1e5a96 0%, #2d7dc4 100%);
            color: white;
            padding: 2rem;
            margin-top: 2rem;
            border-radius: 10px;
        }
        
        .footer .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        
        .footer .footer-section h5 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .footer .social-links a {
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .footer .social-links a:hover {
            background-color: #ffd700;
            color: #1e5a96;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar-top .nav-menu {
                display: none;
            }
            
            .sidebar-nav {
                display: none;
            }
            
            .courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar-top">
        <div class="container-fluid">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div class="brand">
                    <i class="fas fa-graduation-cap"></i> Pesat Boarding School
                </div>
                
                <ul class="nav-menu">
                    <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('classrooms.index') }}" class="{{ request()->routeIs('classrooms.*') ? 'active' : '' }}">Kelas</a></li>
                    <li><a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'active' : '' }}">Siswa</a></li>
                    <li><a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.*') ? 'active' : '' }}">Guru</a></li>
                    <li><a href="{{ route('subjects.index') }}" class="{{ request()->routeIs('subjects.*') ? 'active' : '' }}">Mapel</a></li>
                    <li><a href="{{ route('scores.index') }}" class="{{ request()->routeIs('scores.*') ? 'active' : '' }}">Nilai</a></li>
                </ul>
                
                <div class="nav-right">
                    <button class="user-btn">
                        <i class="fas fa-user-circle"></i> Admin
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div style="display: flex;">
        <!-- Sidebar -->
        <div style="width: 250px;">
            <div class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-title">Menu Utama</div>
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ route('classrooms.index') }}" class="nav-link {{ request()->routeIs('classrooms.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i> Kelas
                    </a>
                </div>
                
                <div class="nav-section">
                    <div class="nav-title">Data Master</div>
                    <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate"></i> Siswa
                    </a>
                    <a href="{{ route('teachers.index') }}" class="nav-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-user"></i> Guru
                    </a>
                    <a href="{{ route('subjects.index') }}" class="nav-link {{ request()->routeIs('subjects.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Mata Pelajaran
                    </a>
                </div>
                
                <div class="nav-section">
                    <div class="nav-title">Nilai & Rapor</div>
                    <a href="{{ route('classroom-teachers.index') }}" class="nav-link {{ request()->routeIs('classroom-teachers.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Guru Kelas
                    </a>
                    <a href="{{ route('subject-teachers.index') }}" class="nav-link {{ request()->routeIs('subject-teachers.*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard"></i> Guru Mapel
                    </a>
                    <a href="{{ route('scores.index') }}" class="nav-link {{ request()->routeIs('scores.*') ? 'active' : '' }}">
                        <i class="fas fa-star"></i> Nilai
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div style="flex: 1;">
            <div class="main-content">
                <div class="content-area">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @yield('content')
                    
                    <!-- Footer -->
                    <div class="footer" style="margin-top: 3rem;">
                        <div class="footer-content">
                            <div class="footer-section">
                                <h5>Tentang Pesat Boarding School</h5>
                                <p style="font-size: 13px;">Platform pendidikan digital untuk mengelola nilai siswa secara efisien dan transparan.</p>
                            </div>
                            <div class="footer-section">
                                <h5>Menu Cepat</h5>
                                <ul style="list-style: none; padding: 0;">
                                    <li><a href="{{ route('dashboard') }}" style="color: white; text-decoration: none; font-size: 13px;">Dashboard</a></li>
                                    <li><a href="{{ route('students.index') }}" style="color: white; text-decoration: none; font-size: 13px;">Manajemen Siswa</a></li>
                                    <li><a href="{{ route('scores.index') }}" style="color: white; text-decoration: none; font-size: 13px;">Data Nilai</a></li>
                                </ul>
                            </div>
                            <div class="footer-section">
                                <h5>Ikuti Kami</h5>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgba(255,255,255,0.2); margin: 2rem 0;">
                        <div style="text-align: center; font-size: 12px; opacity: 0.8;">
                            © 2025 Pesat Boarding School. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>