<?php
include 'header.php';

$donors = [];
$search_performed = false;

if (isset($_GET['city']) && isset($_GET['blood_group'])) {
    $city = mysqli_real_escape_string($connection, $_GET['city']);
    $blood_group = mysqli_real_escape_string($connection, $_GET['blood_group']);
    
    $sql = "SELECT name, email, contact, gender, blood_group, city 
            FROM donors 
            WHERE city = '$city' AND blood_group = '$blood_group'
            ORDER BY name";
    
    $result = mysqli_query($connection, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $donors[] = $row;
        }
    }
    
    $search_performed = true;
}
?>

<style>
    .search-section {
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        padding: 60px 0;
        color: white;
    }
    
    .search-form {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .search-form h3 {
        color: #dc3545;
        margin-bottom: 1.5rem;
    }
    
    .results-section {
        padding: 60px 0;
    }
    
    .donor-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 1.5rem;
        transition: all 0.3s;
        border-left: 5px solid #dc3545;
    }
    
    .donor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .donor-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .donor-info {
        color: #6c757d;
        margin: 0.25rem 0;
    }
    
    .blood-badge {
        background: #dc3545;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 700;
        display: inline-block;
        margin-top: 0.5rem;
    }
    
    .no-results {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
    
    .no-results i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #dc3545;
    }
    
    .contact-btn {
        background: #28a745;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .contact-btn:hover {
        background: #218838;
        transform: scale(1.05);
    }
</style>

<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="text-center mb-4">
            <h1><i class="fas fa-search"></i> Find Blood Donors</h1>
            <p>Search for donors by city and blood group</p>
        </div>
        
        <div class="search-form">
            <h3 class="text-center">Search Criteria</h3>
            <form method="GET" action="">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Select City</label>
                        <select name="city" class="form-select" required>
                            <option value="">Choose City...</option>
                            <option value="Chandigarh" <?php echo (isset($_GET['city']) && $_GET['city']=='Chandigarh') ? 'selected' : ''; ?>>Chandigarh</option>
                            <option value="Mohali" <?php echo (isset($_GET['city']) && $_GET['city']=='Mohali') ? 'selected' : ''; ?>>Mohali</option>
                            <option value="Panchkula" <?php echo (isset($_GET['city']) && $_GET['city']=='Panchkula') ? 'selected' : ''; ?>>Panchkula</option>
                            <option value="Zirakpur" <?php echo (isset($_GET['city']) && $_GET['city']=='Zirakpur') ? 'selected' : ''; ?>>Zirakpur</option>
                            <option value="Delhi" <?php echo (isset($_GET['city']) && $_GET['city']=='Delhi') ? 'selected' : ''; ?>>Delhi</option>
                            <option value="Mumbai" <?php echo (isset($_GET['city']) && $_GET['city']=='Mumbai') ? 'selected' : ''; ?>>Mumbai</option>
                            <option value="Bangalore" <?php echo (isset($_GET['city']) && $_GET['city']=='Bangalore') ? 'selected' : ''; ?>>Bangalore</option>
                            <option value="Hyderabad" <?php echo (isset($_GET['city']) && $_GET['city']=='Hyderabad') ? 'selected' : ''; ?>>Hyderabad</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Blood Group</label>
                        <select name="blood_group" class="form-select" required>
                            <option value="">Select...</option>
                            <option value="A+" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='A+') ? 'selected' : ''; ?>>A+</option>
                            <option value="A-" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='A-') ? 'selected' : ''; ?>>A-</option>
                            <option value="B+" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='B+') ? 'selected' : ''; ?>>B+</option>
                            <option value="B-" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='B-') ? 'selected' : ''; ?>>B-</option>
                            <option value="AB+" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='AB+') ? 'selected' : ''; ?>>AB+</option>
                            <option value="AB-" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='AB-') ? 'selected' : ''; ?>>AB-</option>
                            <option value="O+" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='O+') ? 'selected' : ''; ?>>O+</option>
                            <option value="O-" <?php echo (isset($_GET['blood_group']) && $_GET['blood_group']=='O-') ? 'selected' : ''; ?>>O-</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-danger w-100 fw-bold">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="results-section">
    <div class="container">
        <?php if ($search_performed): ?>
            <?php if (count($donors) > 0): ?>
                <h3 class="mb-4">
                    <i class="fas fa-users"></i> Found <?php echo count($donors); ?> Donor(s)
                </h3>
                
                <div class="row">
                    <?php foreach ($donors as $donor): ?>
                        <div class="col-md-6">
                            <div class="donor-card">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="donor-name">
                                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($donor['name']); ?>
                                        </div>
                                        <div class="donor-info">
                                            <i class="fas fa-venus-mars"></i> <?php echo htmlspecialchars($donor['gender']); ?>
                                        </div>
                                        <div class="donor-info">
                                            <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($donor['city']); ?>
                                        </div>
                                        <?php if (isset($_SESSION['user_id'])): ?>
                                            <div class="donor-info">
                                                <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($donor['email']); ?>
                                            </div>
                                            <div class="donor-info">
                                                <i class="fas fa-phone"></i> <?php echo htmlspecialchars($donor['contact']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blood-badge">
                                        <?php echo htmlspecialchars($donor['blood_group']); ?>
                                    </div>
                                </div>
                                
                                <?php if (!isset($_SESSION['user_id'])): ?>
                                    <div class="mt-3">
                                        <a href="signin.php" class="contact-btn">
                                            <i class="fas fa-sign-in-alt"></i> Login to View Contact
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h3>No Donors Found</h3>
                    <p>Try searching with different criteria</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-search" style="font-size: 3rem; color: #dc3545;"></i>
                <h4 class="mt-3">Use the search form above to find donors</h4>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'footer.php'; ?>
