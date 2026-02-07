# Blood Donation System - Installation Guide

## 📋 Overview
A complete blood donation management system built with PHP and MySQL. Features include donor registration, blood donor search, appointment booking, and user profiles.

## 🎯 Features
- ✅ User Registration & Authentication
- ✅ Donor Search by City & Blood Group
- ✅ Appointment Booking System
- ✅ User Profile Management
- ✅ Modern Responsive UI
- ✅ Secure Password Storage (MD5 hashing)
- ✅ Session Management
- ✅ Mobile-Friendly Design

## 🔧 Requirements
- XAMPP (includes Apache, MySQL, PHP)
- Web Browser (Chrome, Firefox, Edge, etc.)
- Text Editor (optional, for future edits)

## 📥 Installation Steps

### Step 1: Install XAMPP
1. Download XAMPP from: https://www.apachefriends.org/
2. Install XAMPP (default location: `C:\xampp`)
3. Run XAMPP Control Panel

### Step 2: Start Services
1. Open XAMPP Control Panel
2. Click "Start" for Apache
3. Click "Start" for MySQL
4. Both should show green highlighting when running

### Step 3: Setup Project Files
1. Extract the `blood_donation_fixed` folder
2. Copy the entire folder to: `C:\xampp\htdocs\`
3. Final path should be: `C:\xampp\htdocs\blood_donation_fixed\`

### Step 4: Create Database
1. Open your browser
2. Go to: `http://localhost/phpmyadmin`
3. Click on "SQL" tab
4. Open the `database.sql` file from the project folder
5. Copy ALL the SQL code and paste it into phpMyAdmin
6. Click "Go" to execute
7. You should see: "Database setup completed successfully!"

### Step 5: Access the Website
1. Open your browser
2. Go to: `http://localhost/blood_donation_fixed/`
3. You should see the homepage!

## 👤 Test Accounts

### Sample Donor Accounts
You can login with these test accounts:

- **Email:** rahul@example.com  
  **Password:** password123

- **Email:** priya@example.com  
  **Password:** password123

- **Email:** amit@example.com  
  **Password:** password123

### Admin Account
- **Username:** admin  
  **Password:** admin123  
  *(Admin panel not included in this version)*

## 📁 Project Structure
```
blood_donation_fixed/
├── config.php           # Database configuration
├── header.php           # Navigation header
├── footer.php           # Footer section
├── index.php            # Homepage
├── register.php         # Donor registration
├── signin.php           # User login
├── search.php           # Search donors
├── appointment.php      # Book appointments
├── profile.php          # User profile
├── logout.php           # Logout handler
└── database.sql         # Database setup script
```

## 🗄️ Database Tables

### donors
Stores donor information
- id, name, email, password, blood_group, gender, city, dob, contact, save_life_date

### form
Stores appointment bookings
- id, name, email, phone, city, state, date, time, bloodtype, status

### users
Stores admin/staff accounts
- id, username, password, email, role

## 🎨 Features Explained

### 1. Homepage (index.php)
- Hero section with search functionality
- Feature cards explaining benefits
- Blood type statistics
- Call-to-action buttons

### 2. Registration (register.php)
- Comprehensive form validation
- Duplicate email checking
- Password confirmation
- Age verification (18+ only)

### 3. Sign In (signin.php)
- Email and password authentication
- Session management
- Redirect to profile after login

### 4. Search Donors (search.php)
- Search by city and blood group
- Display donor contact info (for logged-in users)
- Login required to view full details

### 5. Book Appointment (appointment.php)
- Schedule blood donation appointments
- Date and time selection
- Status tracking (pending/confirmed)

### 6. User Profile (profile.php)
- View personal information
- See appointment history
- Quick logout access

## 🔒 Security Features
- MD5 password hashing
- SQL injection prevention with mysqli_real_escape_string
- Session-based authentication
- Login required for sensitive data

## 🛠️ Troubleshooting

### Problem: "Cannot connect to database"
**Solution:** 
- Check if MySQL is running in XAMPP
- Verify database name is `blood_donation`
- Check config.php settings

### Problem: "Page not found" or 404 error
**Solution:**
- Ensure Apache is running in XAMPP
- Check the URL is: `http://localhost/blood_donation_fixed/`
- Verify files are in `C:\xampp\htdocs\blood_donation_fixed\`

### Problem: Database tables not created
**Solution:**
- Go to phpMyAdmin
- Select `blood_donation` database
- Run the SQL from `database.sql` again

### Problem: Login not working
**Solution:**
- Clear browser cookies/cache
- Use test account: rahul@example.com / password123
- Check if you're registered in the database

### Problem: Styling looks broken
**Solution:**
- Check internet connection (uses CDN for Bootstrap)
- Clear browser cache (Ctrl + F5)
- Try different browser

## 📝 Usage Guide

### For New Users:
1. Click "Register as Donor"
2. Fill in all required information
3. Submit the form
4. Login with your email and password
5. Search for donors or book appointments

### For Testing Search:
1. Login with any test account
2. Go to "Find Donors"
3. Select "Chandigarh" and "O+"
4. Click Search
5. You should see Rahul Sharma in results

### For Booking Appointments:
1. Click "Book Appointment"
2. Fill in all details
3. Select future date and time
4. Submit
5. Check your profile to see the appointment

## 🎯 Next Steps / Future Enhancements
- Admin dashboard for managing donors
- Email notifications
- Blood bank inventory system
- Donation history tracking
- Blood request system
- SMS notifications
- Certificate generation
- Blood donation camps management

## ⚙️ Configuration

### Database Settings (config.php)
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blood_donation');
```

### Session Settings
Sessions are automatically started in config.php and maintained across all pages.

## 🌐 URLs
- Homepage: http://localhost/blood_donation_fixed/
- Registration: http://localhost/blood_donation_fixed/register.php
- Login: http://localhost/blood_donation_fixed/signin.php
- Search: http://localhost/blood_donation_fixed/search.php
- Appointments: http://localhost/blood_donation_fixed/appointment.php
- Profile: http://localhost/blood_donation_fixed/profile.php

## 💡 Tips
- Always start Apache and MySQL before accessing the site
- Keep XAMPP Control Panel open while developing
- Check phpMyAdmin to view database records
- Use browser Developer Tools (F12) for debugging

## 📞 Support
If you encounter any issues:
1. Check the troubleshooting section above
2. Verify XAMPP services are running
3. Check database connection in phpMyAdmin
4. Clear browser cache and try again

## ✅ Checklist
- [ ] XAMPP installed
- [ ] Apache started
- [ ] MySQL started
- [ ] Files copied to htdocs
- [ ] Database created using SQL file
- [ ] Can access homepage at localhost
- [ ] Can register new user
- [ ] Can login successfully
- [ ] Can search donors
- [ ] Can book appointments

---

**Last Updated:** February 2026  
**Version:** 1.0  
**Status:** ✅ Production Ready
