<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAL TRATTORIA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('http://localhost/restaurant/images/restaurantbackground.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            opacity: 0;
            animation: fadeIn 1.5s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        header {
            background-color: #800020; /* Deep Burgundy */
            color: #FFD700; /* Gold */
            text-align: center;
            padding: 20px;
            transform: translateY(-50px);
            opacity: 0;
            animation: slideDown 1.5s ease-out forwards;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        nav {
            background-color: #556B2F; /* Warm Olive Green */
            overflow: hidden;
        }

        nav a {
            color: #FFFDD0; /* Cream */
            padding: 14px 20px;
            text-decoration: none;
            float: left;
            font-weight: bold;
            transition: transform 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: #F5DEB3; /* Light Gold */
            color: #800020; /* Burgundy */
            transform: scale(1.1);
        }

        .content {
            padding: 20px;
        }

        form {
            background-color: #FAEBD7; /* Soft Beige */
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1.5s ease-in-out 1s forwards;
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        button {
            background-color: #008080; /* Deep Teal */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
        
        button:hover {
            background-color: #006666;
            transform: scale(1.05);
        }

        footer {
            background-color: #800020; /* Deep Burgundy */
            color: #FFD700; /* Gold */
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <img align="left" src="http://localhost/restaurant/images/logo.webp" class="left-align" width="100">
        <h1>𝑷𝑹𝑨𝑳 𝑻𝑹𝑨𝑻𝑻𝑶𝑹𝑰𝑨</h1>
    </header>
    
    <nav>
        <a href="index.php">HOME</a>
        <a href="login.php" class="right-align">LOGIN</a>
        <a href="menu.php">MENU</a>
        <a href="mycart.php">MY CART</a>
        <a href="feedback.php">FEEDBACK</a>
    </nav>
    
    <div class="content">
        <form>
            <h2>PRAL TRATTORIA offers a wide variety of delicious dishes that will tantalize your taste buds. Join us for a memorable dining experience!</h2>
        </form>
    </div>
    <section class="partners">
        <h2>Our Trusted Partners</h2>
        <div class="partner-logos">
            <div class="partner">
                <img src="http://localhost/restaurant/images/zomato.png" alt="Partner 1">
            </div>
            <div class="partner">
                <img src="http://localhost/restaurant/images/all%20in%20one%20food%20delivary.jpeg" alt="Partner 2">
            </div>
            <div class="partner">
                <img src="http://localhost/restaurant/images/uber%20eats.png" alt="Partner 3">
            </div>
            <div class="partner">
                <img src="http://localhost/restaurant/images/swiggy.png" alt="Partner 4">
            </div>
        </div>
    </section>
    <br>
    <br>
    <section class="modules">
        <form>
        <h2>Key Modules</h2>
        <ul>
            
            <li><strong>Menu Management:</strong> Add, update, and categorize dishes.</li>
            <li><strong>Order Processing:</strong> Handle online orders seamlessly.24/7</li>
            <li><strong>Reservations:</strong> Manage bookings and customer preferences.</li>
            <li><strong>Staff Management:</strong> delivers your order in time.</li>
            <li><strong>Inventory Control:</strong> Monitor stock levels and reduce waste.</li>
            <li><strong>Customer Insights:</strong> Track customer preferences and feedback.</li>
        </ul>
    </form>
    </section>
    
    <style>
    .partners {
        text-align: center;
        padding: 50px 20px;
        background-color: #FAEBD7; /* Soft Beige */
    }
    
    .partners h2 {
        color: #800020; /* Deep Burgundy */
        font-size: 2em;
        margin-bottom: 20px;
    }
    
    .partner-logos {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .partner {
        width: 150px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    
    .partner img {
        width: 100px;
        height: auto;
        object-fit: contain;
    }
    
    .partner:hover {
        transform: scale(1.1);
    }
    </style>

<br>
    <br>
    <br>

<section class="share">
    <form>
    <h2>Share</h2>
    <a href="#" class="social-icon"><img src="http://localhost/restaurant/images/instagram.jpeg" alt="instagram" width="100px"></a>
    <a href="#" class="social-icon"><img src="http://localhost/restaurant/images/twitter.png" alt="X" width="100px"></a>
    <a href="#" class="social-icon"><img src="http://localhost/restaurant/images/linkedin%20icon.png" alt="LinkedIn" width="100px"></a>
    <a href="#" class="social-icon"><img src="http://localhost/restaurant/images/whatsapp.png" alt="whatsapp" width="100px"></a>


</form>
</section>

    <br>
    <br>
    <br>
    <form>
        <p>&copy; 2025 PRAL TRATTORIA. All rights reserved.</p>
    </form>
</body>
</html>
