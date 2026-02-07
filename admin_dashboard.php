<?php
include 'header.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// Get statistics
$total_donors = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as count FROM donors"))['count'];
$total_appointments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as count FROM form"))['count'];
$pending_appointments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as count FROM form WHERE status = 'pending'"))['count'];
$confirmed_appointments = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as count FROM form WHERE status = 'confirmed'"))['count'];

// Get recent donors
$recent_donors = mysqli_query($connection, "SELECT * FROM donors ORDER BY created_at DESC LIMIT 5");

// Get recent appointments
$recent_appointments = mysqli_query($connection, "SELECT * FROM form ORDER BY created_at DESC LIMIT 5");

// Get donor stats by blood group
$blood_stats = mysqli_query($connection, "SELECT blood_group, COUNT(*) as count FROM donors GROUP BY blood_group ORDER BY blood_group");
?>

<style>
    .admin-dashboard {
        background: #f8f9fa;
        padding: 40px 0;
        min-height: calc(100vh - 200px);
    }
    
    .admin-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 1.5rem;
        transition: all 0.3s;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #dc3545;
    }
    
    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        text-transform: uppercase;
    }
    
    .stat-icon {
        font-size: 3rem;
        opacity: 0.2;
        position: absolute;
        right: 20px;
        top: 20px;
    }
    
    .data-table {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }
    
    .table-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    
    .badge-pending {
        background: #ffc107;
        color: #000;
    }
    
    .badge-confirmed {
        background: #28a745;
    }
    
    .badge-completed {
        background: #17a2b8;
    }
</style>

<section class="admin-dashboard">
    <div class="container">
        <!-- Admin Header -->
        <div class="admin-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h2>
                    <p class="mb-0">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</p>
                </div>
                <div>
                    <span class="badge bg-warning text-dark">
                        <i class="fas fa-shield-alt"></i> <?php echo ucfirst($_SESSION['admin_role']); ?>
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card position-relative">
                    <i class="fas fa-users stat-icon"></i>
                    <div class="stat-number"><?php echo $total_donors; ?></div>
                    <div class="stat-label">Total Donors</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card position-relative">
                    <i class="fas fa-calendar-check stat-icon"></i>
                    <div class="stat-number"><?php echo $total_appointments; ?></div>
                    <div class="stat-label">Total Appointments</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card position-relative">
                    <i class="fas fa-clock stat-icon"></i>
                    <div class="stat-number"><?php echo $pending_appointments; ?></div>
                    <div class="stat-label">Pending</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card position-relative">
                    <i class="fas fa-check-circle stat-icon"></i>
                    <div class="stat-number"><?php echo $confirmed_appointments; ?></div>
                    <div class="stat-label">Confirmed</div>
                </div>
            </div>
        </div>
        
        <!-- Blood Group Statistics -->
        <div class="data-table">
            <h4 class="table-title"><i class="fas fa-tint"></i> Donors by Blood Group</h4>
            <div class="row">
                <?php while ($stat = mysqli_fetch_assoc($blood_stats)): ?>
                    <div class="col-md-3 mb-3">
                        <div class="text-center p-3 border rounded">
                            <h3 class="text-danger"><?php echo $stat['blood_group']; ?></h3>
                            <p class="mb-0"><?php echo $stat['count']; ?> donors</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        
        <!-- Recent Donors -->
        <div class="data-table">
            <h4 class="table-title"><i class="fas fa-user-plus"></i> Recent Donors</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Blood Group</th>
                            <th>City</th>
                            <th>Contact</th>
                            <th>Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($donor = mysqli_fetch_assoc($recent_donors)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($donor['name']); ?></td>
                                <td><?php echo htmlspecialchars($donor['email']); ?></td>
                                <td><span class="badge bg-danger"><?php echo $donor['blood_group']; ?></span></td>
                                <td><?php echo htmlspecialchars($donor['city']); ?></td>
                                <td><?php echo htmlspecialchars($donor['contact']); ?></td>
                                <td><?php echo date('d M Y', strtotime($donor['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Recent Appointments -->
        <div class="data-table">
            <h4 class="table-title"><i class="fas fa-calendar-alt"></i> Recent Appointments</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Blood Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($apt = mysqli_fetch_assoc($recent_appointments)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($apt['name']); ?></td>
                                <td><?php echo htmlspecialchars($apt['email']); ?></td>
                                <td><?php echo htmlspecialchars($apt['phone']); ?></td>
                                <td><?php echo htmlspecialchars($apt['city']); ?></td>
                                <td><?php echo date('d M Y', strtotime($apt['date'])); ?></td>
                                <td><?php echo date('h:i A', strtotime($apt['time'])); ?></td>
                                <td><span class="badge bg-danger"><?php echo $apt['bloodtype']; ?></span></td>
                                <td>
                                    <span class="badge badge-<?php echo $apt['status']; ?>">
                                        <?php echo ucfirst($apt['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success" onclick="updateStatus(<?php echo $apt['id']; ?>, 'confirmed')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="updateStatus(<?php echo $apt['id']; ?>, 'cancelled')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-12">
                <div class="data-table text-center">
                    <h4 class="table-title"><i class="fas fa-tools"></i> Quick Actions</h4>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="under_construction.php" class="btn btn-primary">
                            <i class="fas fa-users"></i> View All Donors
                        </a>
                        <a href="under_construction.php" class="btn btn-success">
                            <i class="fas fa-calendar"></i> View All Appointments
                        </a>
                        <a href="under_construction.php" class="btn btn-info">
                            <i class="fas fa-chart-bar"></i> Reports
                        </a>
                        <a href="admin_logout.php" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function updateStatus(id, status) {
    if (confirm('Are you sure you want to update this appointment status?')) {
        window.location.href = 'update_appointment.php?id=' + id + '&status=' + status;
    }
}
</script>

<?php include 'footer.php'; ?>
