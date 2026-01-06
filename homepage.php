<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Management System - Modern & Professional</title>
    <link rel="stylesheet" href="assets/css/modern-design-system.css?v=2.1" />
    <link rel="stylesheet" href="assets/css/homepage.css?v=2.1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- Modern Navigation Header -->
    <header class="modern-header">
      <div class="container">
        <nav class="navbar-container">
          <div class="navbar-brand">
            <i class="fas fa-calendar-check"></i>
            <span>EventHub</span>
          </div>
          <ul class="navbar-nav">
            <li><a class="nav-link active" href="Homepage.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a class="nav-link" href="loginphp.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li><a href="Interface_register.php" class="btn btn-primary btn-sm">Sign Up</a></li>
            <li>
              <div class="theme-toggle" id="themeToggle">
                <div class="theme-toggle-slider"></div>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Hero Section with Gradient Background -->
    <section class="hero-modern">
      <div class="hero-background"></div>
      <div class="container">
        <div class="hero-content-modern">
          <div class="hero-badge">
            <i class="fas fa-star"></i>
            <span>Professional Event Management</span>
          </div>
          <h1 class="hero-title">
            Transform Your Events Into
            <span class="gradient-text">Unforgettable Experiences</span>
          </h1>
          <p class="hero-description">
            Streamline your event planning with our intuitive platform. From registration to feedback, 
            we handle every detail so you can focus on creating memorable moments.
          </p>
          <div class="hero-buttons">
            <a href="loginphp.php" class="btn btn-primary btn-lg">
              <i class="fas fa-rocket"></i>
              Get Started Free
            </a>
            <a href="#features" class="btn btn-secondary btn-lg">
              <i class="fas fa-play-circle"></i>
              Learn More
            </a>
          </div>
          <div class="hero-stats">
            <div class="stat-item">
              <div class="stat-number">500+</div>
              <div class="stat-label">Events Managed</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">10K+</div>
              <div class="stat-label">Happy Attendees</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">99%</div>
              <div class="stat-label">Success Rate</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-modern">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Powerful Features for Seamless Events</h2>
          <p class="section-description">
            Everything you need to plan, manage, and execute successful events
          </p>
        </div>
        <div class="features-grid-modern">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="feature-title">Centralized Event Hub</h3>
            <p class="feature-description">
              Manage every detail in one place, from venues to speakers. 
              Keep everything organized and accessible.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <h3 class="feature-title">Simplified Registration</h3>
            <p class="feature-description">
              Effortless online registration with secure processing. 
              Make it easy for attendees to join your events.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h3 class="feature-title">Automated Communication</h3>
            <p class="feature-description">
              Keep attendees informed with timely reminders and updates. 
              Never miss an important notification.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h3 class="feature-title">Smart Scheduling</h3>
            <p class="feature-description">
              Create dynamic agendas with intuitive session management. 
              Plan your timeline with precision.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <h3 class="feature-title">Real-time Analytics</h3>
            <p class="feature-description">
              Track attendance, engagement, and performance metrics. 
              Make data-driven decisions for better events.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="feature-title">Secure & Reliable</h3>
            <p class="feature-description">
              Enterprise-grade security for your data and attendee information. 
              Trust in our robust infrastructure.
            </p>
            <div class="feature-link">
              <a href="#"><i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-content">
          <h2>Ready to Transform Your Events?</h2>
          <p>Join thousands of event organizers who trust our platform</p>
          <div class="cta-buttons">
            <a href="Interface_register.php" class="btn btn-primary btn-lg">
              <i class="fas fa-user-plus"></i>
              Create Free Account
            </a>
            <a href="loginphp.php" class="btn btn-secondary btn-lg">
              <i class="fas fa-sign-in-alt"></i>
              Sign In
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Modern Footer -->
    <footer class="modern-footer">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-col">
            <div class="footer-brand">
              <i class="fas fa-calendar-check"></i>
              <span>EventHub</span>
            </div>
            <p class="footer-description">
              Professional event management platform designed to make your events successful and memorable.
            </p>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
          <div class="footer-col">
            <h4>Product</h4>
            <ul>
              <li><a href="#">Features</a></li>
              <li><a href="#">Pricing</a></li>
              <li><a href="#">Security</a></li>
              <li><a href="#">Updates</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Press</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Legal</h4>
            <ul>
              <li><a href="terms.html">Terms of Service</a></li>
              <li><a href="privacypolicy.html">Privacy Policy</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="#">Support</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2026 SWE 3rd Year Vision Group. All rights reserved.</p>
          <p>Made with <i class="fas fa-heart"></i> for better events</p>
        </div>
      </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/j.js"></script>
    <script>
      // Theme Toggle Functionality
      const themeToggle = document.getElementById('themeToggle');
      const html = document.documentElement;

      // Check for saved theme preference or default to 'light'
      const currentTheme = localStorage.getItem('theme') || 'light';
      html.setAttribute('data-theme', currentTheme);
      if (currentTheme === 'dark') {
        themeToggle.classList.add('active');
      }

      themeToggle.addEventListener('click', function() {
        const theme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        themeToggle.classList.toggle('active');
      });

      // Smooth scroll for anchor links
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

      // Add scroll animation to feature cards
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);

      document.querySelectorAll('.feature-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
      });
    </script>
  </body>
</html>
