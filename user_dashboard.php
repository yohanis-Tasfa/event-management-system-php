<?php
require 'includes/user_dashboard_logic.php';
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard - EventHub</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Design System CSS -->
    <link rel="stylesheet" href="assets/css/modern-design-system.css?v=2.2" />
    
    <style>
        :root {
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        body {
            background-color: var(--bg-secondary);
            font-family: 'Inter', sans-serif;
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles (Simplified from Admin) */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--gray-900);
            color: white;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-logo {
            padding: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-item.active {
            background: var(--primary-600);
        }

        /* Main Content */
        .main-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2.5rem;
        }

        .section-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2.5rem;
            border: 1px solid var(--border-color);
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .event-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .event-card-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: white;
        }

        .event-card-body {
            padding: 1.5rem;
        }

        .event-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .btn-register-small {
            width: 100%;
            margin-top: 1rem;
        }

        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .main-wrapper { margin-left: 0; padding: 1.5rem; }
            .mobile-toggle { display: block; }
        }

        .mobile-toggle {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: var(--primary-600);
            color: white;
            border-radius: 50%;
            border: none;
            z-index: 1001;
            box-shadow: var(--shadow-lg);
        }
    </style>
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-calendar-check fa-2x text-primary"></i>
                <span class="h4 mb-0 fw-bold">EventHub</span>
            </div>
            <div class="sidebar-content">
                <a href="#events" class="nav-item active" onclick="showSection('events', this)">
                    <i class="fas fa-search"></i>
                    <span>Browse Events</span>
                </a>
                <a href="#my-events" class="nav-item" onclick="showSection('my-events', this)">
                    <i class="fas fa-ticket-alt"></i>
                    <span>My Registrations</span>
                </a>
                <a href="loginphp.php" class="nav-item mt-auto text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-wrapper">
            <header class="mb-5 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold text-gray-900">User Dashboard</h1>
                    <p class="text-gray-500">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                </div>
            </header>

            <!-- Browse Events Section -->
            <section id="events" class="content-section">
                <div class="section-card">
                    <h3 class="mb-4">Upcoming Events</h3>
                    <div class="event-grid">
                        <?php foreach ($events as $event): ?>
                            <div class="event-card">
                                <div class="event-card-header">
                                    <h5 class="mb-0"><?php echo htmlspecialchars($event['title']); ?></h5>
                                </div>
                                <div class="event-card-body">
                                    <div class="event-info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo htmlspecialchars($event['event_location']); ?></span>
                                    </div>
                                    <div class="event-info">
                                        <i class="fas fa-calendar-day"></i>
                                        <span><?php echo date('M d, Y', strtotime($event['start_date'])); ?></span>
                                    </div>
                                    <p class="text-muted small mb-4"><?php echo htmlspecialchars(substr($event['description'], 0, 100)) . '...'; ?></p>
                                    
                                    <form method="POST">
                                        <input type="hidden" name="event" value="<?php echo $event['id']; ?>">
                                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['username'] . '@example.com'); ?>"> <!-- Placeholder for simplicity -->
                                        <input type="hidden" name="phone_number" value="0000000000"> <!-- Placeholder -->
                                        <button type="submit" class="btn btn-primary btn-register-small">Register Now</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- My Registrations Section -->
            <section id="my-events" class="content-section" style="display:none;">
                <div class="section-card">
                    <h3 class="mb-4">My Scheduled Events</h3>
                    <div class="table-responsive">
                        <table class="table hover">
                            <thead>
                                <tr>
                                    <th>Event Title</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($scheduledEvents as $event): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo htmlspecialchars($event['title']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_location']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($event['start_date'])); ?></td>
                                        <td><span class="badge bg-success">Confirmed</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>

        <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('active')">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <script>
        function showSection(id, el) {
            document.querySelectorAll('.content-section').forEach(s => s.style.display = 'none');
            document.getElementById(id).style.display = 'block';
            document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
            el.classList.add('active');
            if (window.innerWidth <= 1024) document.getElementById('sidebar').classList.remove('active');
        }
    </script>
</body>
</html>

