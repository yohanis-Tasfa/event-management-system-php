<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EventHub</title>
    <link rel="stylesheet" href="assets/css/modern-design-system.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 15s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }

        .register-container {
            width: 100%;
            max-width: 550px;
            padding: 2rem;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .register-logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .register-logo i {
            font-size: 2rem;
            color: white;
        }

        .register-header h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .register-header p {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-tertiary);
            font-size: 1.125rem;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            border: 2px solid var(--border-color);
            border-radius: 0.75rem;
            background: white;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-control:focus ~ .input-icon {
            color: #3b82f6;
        }

        .role-selector {
            margin-bottom: 1.5rem;
        }

        .role-selector label {
            display: block;
            margin-bottom: 1rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .role-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .role-option {
            position: relative;
        }

        .role-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .role-card {
            padding: 1.5rem;
            border: 2px solid var(--border-color);
            border-radius: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .role-card:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.1);
        }

        .role-option input[type="radio"]:checked + .role-card {
            border-color: #3b82f6;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .role-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 0.75rem;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .role-option input[type="radio"]:checked + .role-card .role-icon {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }

        .role-icon i {
            font-size: 1.5rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .role-option input[type="radio"]:checked + .role-card .role-icon i {
            -webkit-text-fill-color: white;
        }

        .role-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .role-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .btn-register {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: var(--text-tertiary);
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border-color);
        }

        .divider span {
            padding: 0 1rem;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-secondary);
        }

        .login-link a {
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .error-message {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #ef4444;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .back-home {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-home a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .back-home a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 1rem;
            }

            .register-card {
                padding: 2rem 1.5rem;
            }

            .register-header h2 {
                font-size: 1.5rem;
            }

            .role-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="register-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2>Create Account</h2>
                <p>Join EventHub to start managing your events</p>
            </div>

            <form action="includes/register.php" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="username" 
                            class="form-control" 
                            placeholder="Full Name" 
                            required
                            autocomplete="name"
                        >
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    <?php if (isset($_GET['username'])): ?>
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo htmlspecialchars($_GET['username']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="Email address" 
                            required
                            autocomplete="email"
                        >
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    <?php if (isset($_GET['email'])): ?>
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo htmlspecialchars($_GET['email']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            placeholder="Password" 
                            required
                            autocomplete="new-password"
                        >
                        <i class="fas fa-lock input-icon"></i>
                    </div>
                    <?php if (isset($_GET['password'])): ?>
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo htmlspecialchars($_GET['password']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input 
                            type="tel" 
                            name="phone_number" 
                            class="form-control" 
                            placeholder="Phone Number" 
                            required
                            autocomplete="tel"
                        >
                        <i class="fas fa-phone input-icon"></i>
                    </div>
                    <?php if (isset($_GET['phone_number'])): ?>
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo htmlspecialchars($_GET['phone_number']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="role-selector">
                    <label>Select Your Role</label>
                    <div class="role-options">
                        <div class="role-option">
                            <input type="radio" name="role" value="admin" id="role-admin">
                            <label for="role-admin" class="role-card">
                                <div class="role-icon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <div class="role-title">Admin</div>
                                <div class="role-description">Manage everything</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" name="role" value="user admin" id="role-user" checked>
                            <label for="role-user" class="role-card">
                                <div class="role-icon">
                                    <i class="fas fa-user-gear"></i>
                                </div>
                                <div class="role-title">User Admin</div>
                                <div class="role-description">Manage your registrations</div>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                </button>
            </form>

            <div class="divider">
                <span>Already have an account?</span>
            </div>

            <div class="login-link">
                <a href="loginphp.php">Sign in instead</a>
            </div>
        </div>

        <div class="back-home">
            <a href="homepage.php">
                <i class="fas fa-arrow-left"></i>
                Back to Home
            </a>
        </div>
    </div>
    <script src="assets/js/j.js"></script>
 
</body>
</html>