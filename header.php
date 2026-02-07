<?php
require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Life - Blood Donation System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white !important;
        }
        
        .navbar-brand i {
            color: #ffc107;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: #ffc107 !important;
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            color: #ffc107 !important;
        }
        
        .btn-donate {
            background-color: #ffc107;
            color: #dc3545;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            border: none;
            transition: all 0.3s;
        }
        
        .btn-donate:hover {
            background-color: #ffcd38;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255,193,7,0.3);
        }
        
        .user-info {
            color: white;
            margin-right: 1rem;
        }
        
        .user-info i {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-heartbeat"></i> Donate Life
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php"><i class="fas fa-search"></i> Find Donors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php"><i class="fas fa-calendar-check"></i> Book Appointment</a>
                    </li>
                    
                    <?php if(isset($_SESSION['admin_id'])): ?>
                        <!-- Admin Navigation -->
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <span class="user-info">
                                <i class="fas fa-user-shield"></i> <?php echo htmlspecialchars($_SESSION['admin_username']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    <?php elseif(isset($_SESSION['user_id'])): ?>
                        <!-- Donor Navigation -->
                        <li class="nav-item">
                            <span class="user-info">
                                <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['name']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="fas fa-user"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    <?php else: ?>
                        <!-- Guest Navigation -->
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_login.php"><i class="fas fa-shield-alt"></i> Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-donate" href="register.php">
                                <i class="fas fa-user-plus"></i> Register as Donor
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
