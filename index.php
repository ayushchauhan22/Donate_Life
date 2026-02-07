<?php include 'header.php'; ?>

<style>
    .hero-section {
         background: linear-gradient(135deg, rgba(220,53,69,0.9) 0%, rgba(167,29,42,0.9) 100%),
                    url('images/photo-1579154204601-01588f351e67.jpeg') center/cover;
        color: white;
        padding: 100px 0;
        text-align: center;
    }
    
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .hero-section p {
        font-size: 1.3rem;
        margin-bottom: 2rem;
    }
    
    .search-box {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        max-width: 600px;
        margin: 2rem auto 0;
    }
    
    .search-box h3 {
        color: #dc3545;
        margin-bottom: 1.5rem;
    }
    
    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        height: 100%;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(220,53,69,0.2);
    }
    
    .feature-card i {
        font-size: 3rem;
        color: #dc3545;
        margin-bottom: 1rem;
    }
    
    .feature-card h4 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .feature-card p {
        color: #6c757d;
    }
    
    .stats-section {
        background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
        color: white;
        padding: 60px 0;
    }
    
    .stat-box {
        text-align: center;
        padding: 2rem;
    }
    
    .stat-box h2 {
        font-size: 3rem;
        font-weight: 700;
        color: #ffc107;
    }
    
    .stat-box p {
        font-size: 1.1rem;
        margin-top: 0.5rem;
    }
    
    .blood-types {
        background: #f8f9fa;
        padding: 60px 0;
    }
    
    .blood-type-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
        transition: all 0.3s;
    }
    
    .blood-type-card:hover {
        background: #dc3545;
        color: white;
        transform: scale(1.05);
    }
    
    .blood-type-card h3 {
        font-size: 2rem;
        font-weight: 700;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Be Someone's Lifeline</h1>
        <p>One donation can save up to three lives. Join us in making a difference.</p>
        
        <div class="search-box">
            <h3><i class="fas fa-search"></i> Find a Donor</h3>
            <form action="search.php" method="GET">
                <div class="row g-3">
                    <div class="col-md-5">
                        <select name="city" class="form-select" required>
                            <option value="">Select City</option>
                            <option>Chandigarh</option>
                            <option>Mohali</option>
                            <option>Panchkula</option>
                            <option>Zirakpur</option>
                            <option>Delhi</option>
                            <option>Mumbai</option>
                            <option>Bangalore</option>
                            <option>Hyderabad</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="blood_group" class="form-select" required>
                            <option value="">Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Why Donate Blood?</h2>
            <p class="lead text-muted">Every donation makes a difference</p>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fas fa-heart-pulse"></i>
                    <h4>Save Lives</h4>
                    <p>One donation can save up to three lives. Be a hero to someone in need.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fas fa-shield-heart"></i>
                    <h4>Health Benefits</h4>
                    <p>Regular blood donation reduces iron overload and lowers risk of heart disease.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fas fa-hands-helping"></i>
                    <h4>Community Support</h4>
                    <p>Join a community of donors making a positive impact every day.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-box">
                    <h2><i class="fas fa-users"></i> 1000+</h2>
                    <p>Registered Donors</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box">
                    <h2><i class="fas fa-droplet"></i> 5000+</h2>
                    <p>Lives Saved</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box">
                    <h2><i class="fas fa-hospital"></i> 50+</h2>
                    <p>Partner Hospitals</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blood Types Section -->
<section class="blood-types">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Know Your Blood Type</h2>
            <p class="lead text-muted">Understanding blood compatibility can save lives</p>
        </div>
        
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>A+</h3>
                    <p>35.7%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>O+</h3>
                    <p>37.4%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>B+</h3>
                    <p>8.5%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>AB+</h3>
                    <p>3.4%</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>A-</h3>
                    <p>6.3%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>O-</h3>
                    <p>6.6%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>B-</h3>
                    <p>1.5%</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="blood-type-card">
                    <h3>AB-</h3>
                    <p>0.6%</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Ready to Save Lives?</h2>
        <p class="lead mb-4">Join thousands of donors making a difference every day</p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="register.php" class="btn btn-danger btn-lg">
                <i class="fas fa-user-plus"></i> Register as Donor
            </a>
            <a href="appointment.php" class="btn btn-outline-danger btn-lg">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
