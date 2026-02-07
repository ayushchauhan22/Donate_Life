    <footer class="footer mt-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4">
                    <h5><i class="fas fa-heartbeat"></i> Donate Life</h5>
                    <p>Saving lives one donation at a time.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="search.php">Find Donors</a></li>
                        <li><a href="appointment.php">Book Appointment</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-envelope"></i> info@donatelife.com</p>
                    <p><i class="fas fa-phone"></i> +91 90151 16227</p>
                    <p><i class="fas fa-map-marker-alt"></i> Himachal Pradesh, India</p>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="text-center py-3">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> Donate Life. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
            color: white;
            margin-top: auto;
        }
        
        .footer h5 {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer p {
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s;
        }
        
        .social-links a:hover {
            color: #ffc107;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: #ffc107;
        }
        
        .footer-divider {
            border-color: rgba(255,255,255,0.2);
        }
    </style>
</body>
</html>
