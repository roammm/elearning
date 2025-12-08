<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial;
            background: #f5f7fb;
            margin: 0;
            padding: 0
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px
        }

        .page-header {
            margin-bottom: 40px;
            padding-top: 40px
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 8px
        }

        .page-subtitle {
            font-size: 16px;
            color: #6b7280
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 24px;
            margin-bottom: 40px
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1)
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: #1f2937
        }

        .admin-nav {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
            flex-wrap: wrap
        }

        .admin-nav a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: #2563eb;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s
        }

        .admin-nav a:hover {
            background: #1d4ed8
        }

        @media (max-width:1024px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr)
            }
        }

        @media (max-width:768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        @media (max-width:640px) {
            .stats-grid {
                grid-template-columns: 1fr
            }

            .container {
                padding: 0 16px
            }
        }
    </style>
</head>

<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="page-header">
            <h1 class="page-title">Admin Dashboard</h1>
            <p class="page-subtitle">Kelola konten dan pengguna e-learning</p>
        </div>

        <div class="admin-nav">
            <a href="{{ route('admin.courses') }}">📚 Courses</a>
            <a href="{{ route('admin.users') }}">👥 Users</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Courses</div>
                <div class="stat-value">{{ $stats['courses'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Chapters</div>
                <div class="stat-value">{{ $stats['chapters'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Users</div>
                <div class="stat-value">{{ $stats['users'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Quiz Groups</div>
                <div class="stat-value">{{ $stats['quiz_groups'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Questions</div>
                <div class="stat-value">{{ $stats['questions'] }}</div>
            </div>
        </div>
    </div>
</body>

</html>