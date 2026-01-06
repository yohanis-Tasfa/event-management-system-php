<?php
require 'includes/admin_dashboard_logic.php';
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - EventHub</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Design System CSS -->
    <link rel="stylesheet" href="assets/css/modern-design-system.css?v=2.1" />
    
    <style>
        :root {
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        body {
            background-color: var(--bg-secondary);
            overflow-x: hidden;
        }

        /* Dashboard Layout */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Mobile Sidebar Toggle */
        .sidebar-toggle-btn {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-600);
            color: white;
            justify-content: center;
            align-items: center;
            box-shadow: var(--shadow-xl);
            z-index: 1001;
            border: none;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .sidebar-toggle-btn:hover {
            transform: scale(1.1);
            background: var(--primary-700);
        }

        /* Modern Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--gray-900);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform var(--transition-slow);
        }

        .sidebar-logo {
            padding: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo i {
            font-size: 1.75rem;
            color: var(--primary-400);
        }

        .sidebar-logo span {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .sidebar-content {
            flex: 1;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            border-radius: var(--radius-lg);
            transition: var(--transition-base);
            font-weight: 500;
            text-decoration: none;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .nav-item.active {
            background: var(--primary-600);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-logout {
            color: #ef4444;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        /* Main Content Wrapper */
        .main-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left var(--transition-slow);
        }

        /* Dashboard Header */
        .dashboard-header {
            height: var(--header-height);
            background: white;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .header-search {
            display: flex;
            align-items: center;
            background: var(--gray-100);
            padding: 0.5rem 1.25rem;
            border-radius: var(--radius-full);
            width: 300px;
        }

        .header-search input {
            background: transparent;
            border: none;
            padding: 0.25rem 0.75rem;
            width: 100%;
            outline: none;
            font-size: 0.9rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--primary-600);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
        }

        .user-info .name {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .user-info .role {
            display: block;
            font-size: 0.75rem;
            color: var(--text-tertiary);
        }

        /* Page Content */
        .page-content {
            padding: 2.5rem;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            padding: 2.5rem;
            border-radius: var(--radius-2xl);
            color: white;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            right: -5%;
            top: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .welcome-banner h1 {
            color: white;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .welcome-banner p {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-base);
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
        }

        .stat-icon.primary { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .stat-icon.success { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
        .stat-icon.warning { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .stat-icon.purple { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }

        .stat-details h3 { font-size: 1.5rem; margin-bottom: 0.25rem; }
        .stat-details span { color: var(--text-tertiary); font-size: 0.85rem; font-weight: 500; }

        /* Content Sections */
        .content-section {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Modern Tablets/Tables */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-table-wrapper {
            background: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .table-responsive {
            margin: 0;
            border-radius: 0;
            box-shadow: none;
        }

        table thead {
            background: var(--gray-50);
            color: var(--text-secondary);
        }

        table thead th {
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1.25rem 1.5rem;
            color: var(--text-tertiary);
        }

        table tbody td {
            padding: 1rem 1.5rem;
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success { background: #dcfce7; color: #15803d; }
        .badge-info { background: #dbeafe; color: #1d4ed8; }

        /* Action Buttons */
        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: none;
            cursor: pointer;
            transition: var(--transition-base);
            margin-right: 0.25rem;
        }

        .btn-edit { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .btn-delete { background: rgba(239, 68, 68, 0.1); color: #ef4444; }

        .btn-edit:hover { background: #3b82f6; color: white; }
        .btn-delete:hover { background: #ef4444; color: white; }

        /* Form Styling */
        .form-card {
            background: white;
            padding: 2rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 1024px) {
            .main-wrapper { margin-left: 0; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .sidebar-toggle-btn { display: flex; }
            .header-search { width: 200px; }
        }

        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .section-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
            .header-search { display: none; }
            .page-content { padding: 1.5rem; }
            .welcome-banner { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="dashboard-layout">
        <!-- Modern Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-calendar-check"></i>
                <span>EventHub</span>
            </div>
            
            <nav class="sidebar-content">
                <a href="#dashboard" class="nav-item active" onclick="showSection('dashboard', this)">
                    <i class="fas fa-chart-line"></i>
                    <span>Overview</span>
                </a>
                <a href="#event-management" class="nav-item" onclick="showSection('event-management', this)">
                    <i class="fas fa-layer-group"></i>
                    <span>Events Management</span>
                </a>
                <a href="#attendee-list" class="nav-item" onclick="showSection('attendee-list', this)">
                    <i class="fas fa-users"></i>
                    <span>Registrations</span>
                </a>
                <a href="#reminders" class="nav-item" onclick="showSection('reminders', this)">
                    <i class="fas fa-paper-plane"></i>
                    <span>Communications</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="loginphp.php" class="nav-item btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-wrapper">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search for events, attendees...">
                </div>
                
                <div class="header-actions">
                    <div class="theme-toggle" id="themeToggle" onclick="toggleTheme()">
                        <div class="theme-toggle-slider"></div>
                    </div>
                    
                    <div class="user-profile">
                        <div class="user-avatar">
                            <?php 
                                $name = $_SESSION['username'] ?? 'A';
                                echo strtoupper(substr($name, 0, 1)); 
                            ?>
                        </div>
                        <div class="user-info">
                            <span class="name"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?></span>
                            <span class="role">Administrator</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                
                <!-- Overview Section -->
                <section id="dashboard" class="content-section active">
                    <div class="welcome-banner">
                        <h1>Welcome back, Admin!</h1>
                        <p>Here's what's happening with your events today.</p>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon primary"><i class="fas fa-calendar-alt"></i></div>
                            <div class="stat-details">
                                <h3><?php echo count($events); ?></h3>
                                <span>Total Events</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon success"><i class="fas fa-user-check"></i></div>
                            <div class="stat-details">
                                <h3>1,284</h3>
                                <span>Total Attendees</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon warning"><i class="fas fa-ticket-alt"></i></div>
                            <div class="stat-details">
                                <h3>482</h3>
                                <span>Tickets Sold</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon purple"><i class="fas fa-clock"></i></div>
                            <div class="stat-details">
                                <h3>12</h3>
                                <span>Upcoming Today</span>
                            </div>
                        </div>
                    </div>

                    <div class="section-header">
                        <h2>Quick Summary</h2>
                    </div>
                    
                    <div class="card-table-wrapper">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_slice($events, 0, 5) as $event): ?>
                                    <tr>
                                        <td style="font-weight: 600;"><?php echo htmlspecialchars($event['title']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_location']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($event['start_date'])); ?></td>
                                        <td><span class="badge badge-success">Active</span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Event Management Section -->
                <section id="event-management" class="content-section">
                    <div class="section-header">
                        <h2>Create New Event</h2>
                    </div>
                    
                    <div class="form-card">
                        <form id="event-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="action" value="create">
                            
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">Event Title</label>
                                    <input type="text" name="event-name" class="form-control" placeholder="Conference Name" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location / Venue</label>
                                    <input type="text" name="event-location" class="form-control" placeholder="Convention Center" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <input type="datetime-local" name="start-date" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <input type="datetime-local" name="end-date" class="form-control" required />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Event Description</label>
                                <textarea name="event-description" class="form-control" placeholder="A brief overview of the event..." required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Organizer Name</label>
                                <input type="text" name="event-organizer" class="form-control" placeholder="Ex: Vision Group" required />
                            </div>
                            
                            <div class="mt-4" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Create Event
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <!-- Attendee List Section -->
                <section id="attendee-list" class="content-section">
                    <div class="section-header">
                        <h2>Manage Event Listings</h2>
                        <button class="btn btn-secondary btn-sm" onclick="exportCSV()">
                            <i class="fas fa-file-export"></i> Export CSV
                        </button>
                    </div>
                    
                    <div class="card-table-wrapper">
                        <div class="table-responsive">
                            <table id="event-data-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Venue</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Organizer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td style="font-weight: 600; color: var(--primary-600);"><?php echo htmlspecialchars($event['title']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_location']); ?></td>
                                        <td><?php echo date('M d, H:i', strtotime($event['start_date'])); ?></td>
                                        <td><?php echo date('M d, H:i', strtotime($event['end_date'])); ?></td>
                                        <td><span class="badge badge-info"><?php echo htmlspecialchars($event['event_organizer'] ?? 'N/A'); ?></span></td>
                                        <td>
                                            <button class="btn-action btn-edit" title="Edit Event" onclick="editEvent(<?php echo $event['id']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-delete" title="Delete Event" onclick="deleteEvent(<?php echo $event['id']; ?>)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Communication Section -->
                <section id="reminders" class="content-section">
                    <div class="section-header">
                        <h2>Send Notifications</h2>
                    </div>
                    
                    <div class="form-card" style="max-width: 600px; margin: 0 auto;">
                        <form method="POST" action="includes/send_notification.php">
                            <input type="hidden" name="action" value="send_reminders">
                            
                            <div class="form-group">
                                <label class="form-label">Target Event</label>
                                <select name="reminder-event" class="form-control" required>
                                    <option value="">Select an active event</option>
                                    <?php foreach ($events as $event): ?>
                                        <option value="<?php echo $event['id']; ?>" ><?php echo htmlspecialchars($event['title']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p style="font-size: 0.8rem; color: var(--text-tertiary); margin-top: 0.5rem;">
                                    This message will be sent to all registered participants of the selected event.
                                </p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Message Content</label>
                                <textarea name="message" class="form-control" placeholder="Write your announcement or reminder here..." style="min-height: 150px;" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                <i class="fas fa-paper-plane"></i> Send Mass SMS
                            </button>
                        </form>
                    </div>
                </section>
                
            </div>
        </main>
        
        <!-- Mobile Sidebar Toggle -->
        <button class="sidebar-toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- JavaScript for Dynamic Interactions -->
    <script>
        function showSection(sectionId, element) {
            // Update Navigation UI
            document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
            element.classList.add('active');
            
            // Update Displayed Content
            document.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
            
            // Auto close sidebar on mobile
            if (window.innerWidth <= 1024) {
                toggleSidebar();
            }
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            html.setAttribute('data-theme', newTheme);
            document.getElementById('themeToggle').classList.toggle('active');
            localStorage.setItem('admin-theme', newTheme);
        }

        // Initialize theme from storage
        const savedTheme = localStorage.getItem('admin-theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.getElementById('themeToggle').classList.add('active');
        }

        function exportCSV() {
            alert('Exporting data to CSV...');
            // Add real CSV export logic if needed
        }

        function editEvent(id) {
            alert('Opening editor for event ID: ' + id);
        }

        function deleteEvent(id) {
            if(confirm('Are you sure you want to delete this event? This action cannot be undone.')) {
                alert('Event ID ' + id + ' deleted (Simulated)');
            }
        }
    </script>
</body>
</html>