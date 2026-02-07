<?php
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    header('Location: signin.php');
    exit;
}
?>

<style>
    .under-construction {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    
    .construction-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        text-align: center;
        max-width: 600px;
        width: 100%;
    }
    
    .construction-icon {
        font-size: 5rem;
        color: #dc3545;
        margin-bottom: 1.5rem;
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    .construction-card h1 {
        color: #2c3e50;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .construction-card p {
        color: #7f8c8d;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    
    .status-badge {
        display: inline-block;
        background: #ffc107;
        color: #2c3e50;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }
    
    .btn-back {
        display: inline-block;
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }
    
    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(220, 53, 69, 0.4);
        color: white;
    }
    
    .features-list {
        text-align: left;
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        margin: 2rem 0;
    }
    
    .features-list h5 {
        color: #2c3e50;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .features-list ul {
        list-style: none;
        padding: 0;
    }
    
    .features-list li {
        color: #7f8c8d;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .features-list li:last-child {
        border-bottom: none;
    }
    
    .features-list i {
        color: #dc3545;
        margin-right: 0.5rem;
    }
</style>

<div class="under-construction">
    <div class="construction-card">
        <div class="construction-icon">
            <i class="fas fa-tools"></i>
        </div>
        
        <div class="status-badge">
            <i class="fas fa-exclamation-circle"></i> Currently Under Maintenance
        </div>
        
        <h1>Feature Under Construction</h1>
        
        <p>
            This functionality is currently not working and is being developed. 
            We apologize for any inconvenience. Our team is working hard to bring you this feature soon!
        </p>
        
        <div class="features-list">
            <h5><i class="fas fa-list"></i> Coming Soon:</h5>
            <ul>
                <li><i class="fas fa-check-circle"></i> Enhanced Features</li>
                <li><i class="fas fa-check-circle"></i> Improved Performance</li>
                <li><i class="fas fa-check-circle"></i> Better User Experience</li>
                <li><i class="fas fa-check-circle"></i> New Tools & Options</li>
            </ul>
        </div>
        
        <p style="font-size: 0.95rem; color: #95a5a6; margin-bottom: 2rem;">
            <i class="fas fa-info-circle"></i> 
            Expected availability: Coming Soon
        </p>
        
        <a href="javascript:history.back()" class="btn-back">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>
</div>

<?php
include 'footer.php';
?>
