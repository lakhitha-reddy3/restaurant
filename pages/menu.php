<?php
session_start();
 // Include the database connection
 include '../includes/db.php';
 // Fetch images from database
$sql = "SELECT image_path FROM images";
$result = $conn->query($sql);
 $stmt = $conn->query("SELECT * FROM items");
 $items = []; // Initialize an empty array
 if ($stmt && $stmt->num_rows > 0) {
     while ($row = $stmt->fetch_assoc()) {
         $items[] = $row;
     }
 }
 ?>
        <?php foreach ($items as $item) : ?><h3><?= htmlspecialchars($item['name']); ?></h3>
            <p>Price: $<?= number_format($item['price'], 2); ?></p>
            <p><?= htmlspecialchars($item['description']); ?></p>
        </div>
    <?php endforeach; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAL TRATTORIA </title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-image: url('http://localhost/restaurant/images/restaurantbackground.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #444;
            overflow: hidden;
        }
        nav a {
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
            float: left;
        }
        nav a:hover {
            background-color: #ddd;
            color: #333;
        }
        .content {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
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
        <img align="left" src="http://localhost/restaurant/images/logo.webp" class="left-align" width="100" >
        <h1>𝑷𝑹𝑨𝑳 𝑻𝑹𝑨𝑻𝑻𝑶𝑹𝑰𝑨</h1>
    </header>
    <nav>
        <a href="index.php">HOME</a>
        <a href="login.php">LOGIN</a>
        <a href="menu.php">MENU</a>
        <a href="mycart.php">MY CART</a>
        <a href="feedback.php">FEED BACK</a>
        <a href="delivary.php">DELIVARY TO</a>
    </nav>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAL TRATTORIA - Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('http://localhost/restaurant/images/restaurantbackground.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: white;
        }
        header {
            background-color: rgba(8, 8, 8, 0.7); /* Transparent background for header */
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        .menu-container {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for the menu */
            margin-top: 20px;
            border-radius: 10px;
        }
        h2 {
            color: #fff;
            text-align: center;
        }
        .menu-table {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 columns */
            gap: 20px;
            text-align: center;
            margin-top: 20px;
        }
        .menu-table div {
            padding: 10px;
            border: 1px solid #ddd;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            color: #fff;
            font-size: 16px;
        }
        .menu-table div:nth-child(odd) {
            background-color: #333; /* Darker background for odd items */
        }
        .menu-table img {
            width: 100%;  /* Makes the images fill the cell */
            height: 200px;
            object-fit: cover; /* Ensures the image covers the cell area */
        }
        .button {
            background-color: #444;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: center;
            font-size: 16px;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #ddd;
            color: #333;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <div class="menu-container">
        <h2>Menu</h2>

        <!-- Vegetarian Dishes -->
        <h3>Vegetarian Dishes</h3>
        <div class="menu-table">
            <!-- Row 1 -->
            <script>
                function addToCart(name, price, image) {
                    let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get existing cart
                    cart.push({ name, price, image }); // Add new item
                    localStorage.setItem('cart', JSON.stringify(cart)); // Save back to storage
                    alert(name + " added to cart!");
                }
            </script>
            
            <!-- Example Menu Item (Modify all items like this) -->
            <div>
                <img src="http://localhost/restaurant/images/veg%20biryani.jpg" alt="veg biryani">
                <div>VEG BIRYANI</div><div>Rs.200</div>
                <button class="button" onclick="addToCart('VEG BIRYANI', '200', 'http://localhost/restaurant/images/veg%20biryani.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/paneer%20butter%20masala.jpg" alt="paneer butter masala">
                <div>PANEER BUTTER MASALA</div><div>Rs.250</div>
                <button class="button" onclick="addToCart('paneer butter masala', '250', 'http://localhost/restaurant/images/paneer%20butter%20masala.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/dak%20makhani.jpg" alt="dal makhani">
                <div>DAL MAKHANI</div><div>Rs.300</div>
                <button class="button" onclick="addToCart('dal makhani', '300', 'http://localhost/restaurant/images/dak%20makhani.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/vegetable%20curry.jpg" alt="vegetable curry">
                <div>VEGETABLE CURRY</div><div>Rs.200</div>
                <button class="button" onclick="addToCart('vegetable curry', '200', 'http://localhost/restaurant/images/vegetable%20curry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/mixed%20veg%20salad.jpg" alt="mixed veg salad">
                <div>MIXED VEG SALAD</div><div>Rs.100</div>
                <button class="button" onclick="addToCart('mixed veg salad', '100', 'http://localhost/restaurant/images/mixed%20veg%20salad.jpg')">Add To Cart</button>
            </div>

            <!-- Row 2 -->
            <div>
                <img src="http://localhost/restaurant/images/chana%20masala.jpg" alt="chana masala">
                <div>CHANA MASALA</div><div>Rs.150</div>
                <button class="button" onclick="addToCart('chana masala', '150', 'http://localhost/restaurant/images/chana%20masala.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/vegetable%20pulao.jpg" alt="vegetable pulao">
                <div>VEGETABLE PULAO</div><div>Rs.119</div>
                <button class="button" onclick="addToCart('vegetable pulao', '119', 'http://localhost/restaurant/images/vegetable%20pulao.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/aloo%20gobi.jpg" alt="aloo gobi">
                <div>ALOO GOBI</div><div>Rs.89</div>
                <button class="button" onclick="addToCart('aloo gobi', '89', 'http://localhost/restaurant/images/aloo%20gobi.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/veg%20tacos.jpg" alt="veg tacos">
                <div>VEG TACOS</div><div>Rs.99</div>
                <button class="button" onclick="addToCart('veg tacos', '99', 'http://localhost/restaurant/images/veg%20tacos.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/palak%20paneer.jpg" alt="palak paneer">
                <div>PALAK PANEER</div><div>Rs.129</div>
                <button class="button" onclick="addToCart('palak paneer', '129', 'http://localhost/restaurant/images/palak%20paneer.jpg')">Add To Cart</button>
            </div>

            <!-- Row 3 -->
            <div>
                <img src="http://localhost/restaurant/images/baingan%20bharta.jpg" alt="baingan bharta">
                <div>BAINGAN BHARTA</div><div>Rs.199</div>
                <button class="button" onclick="addToCart('baingan bharta', '199', 'http://localhost/restaurant/images/baingan%20bharta.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/vegetable%20samosa.jpg" alt="Vegetable Samosa">
                <div>VEGETABLE SAMOSA</div><div>Rs.159</div>
                <button class="button" onclick="addToCart('vegetable samosa', '159', 'http://localhost/restaurant/images/vegetable%20samosa.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/gobi%20manchurian.jpg" alt="gobi manchurian">
                <div>GOBI MANCHURIAN</div><div>Rs.229</div>
                <button class="button" onclick="addToCart('gobi manchurian', '229', 'http://localhost/restaurant/images/gobi%20manchurian.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/rajma.jpg" alt="rajma">
                <div>RAJMA</div><div>Rs.39</div>
                <button class="button" onclick="addToCart('rajma', '39', 'http://localhost/restaurant/images/rajma.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/veg%20pakoras.jpg" alt="veg pakoras">
                <div>VEG PAKORAS</div><div>Rs.79</div>
                <button class="button" onclick="addToCart('veg pakoras', '79', 'http://localhost/restaurant/images/veg%20pakoras.jpg')">Add To Cart</button>
            </div>

            <!-- Row 4-->
            <div>
                <img src="http://localhost/restaurant/images/veg kurma.jpg" alt="veg korma">
                <div>VEG KORMA</div><div>$Rs.89</div>
                <button class="button" onclick="addToCart('veg korma', '89', 'http://localhost/restaurant/images/veg kurma.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/veg noodeles.jpg" alt="veg noodles">
                <div>VEG NOODLES</div><div>Rs.69</div>
                <button class="button" onclick="addToCart('veg noodeles', '69', 'http://localhost/restaurant/images/veg noodeles.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/stuffed paratha.jpg" alt="stuffed paratha">
                <div>STUFFED PARATHA</div><div>Rs.59</div>
                <button class="button" onclick="addToCart('stuffed paratha', '59', 'http://localhost/restaurant/images/stuffed paratha.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/vegetable hakka noodels.jpg" alt="vegetable hakka noodles">
                <div>VEGETABLE HAKKA NOODLES</div><div>Rs.129</div>
                <button class="button" onclick="addToCart('vegetable hakka noodels', '129', 'http://localhost/restaurant/images/vegetable hakka noodels.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/spinach%20salad.jpg" alt="spinach salad">
                <div>SPINACH SALAD</div><div>Rs.99</div>
                <button class="button" onclick="addToCart('spinach salad', '99', 'http://localhost/restaurant/images/spinach%20salad.jpg')">Add To Cart</button>
            </div>

            <!-- Row 5-->
            <div>
                <img src="http://localhost/restaurant/images/veg pizza.jpg" alt="veg pizza">
                <div>VEG PIZZA</div><div>Rs.89</div>
                <button class="button" onclick="addToCart('veg pizza', '89', 'http://localhost/restaurant/images/veg pizza.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/paneer tikka.jpg" alt="paneer tikka">
                <div>PANEER TIKKA</div><div>Rs.99</div>
                <button class="button" onclick="addToCart('paneer tikka', '99', 'http://localhost/restaurant/images/paneer tikka.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/vegetable lasanga.jpg" alt="vegetable lasanga">
                <div>VEGETABLE LASANGA</div><div>Rs.80</div>
                <button class="button" onclick="addToCart('vegetable lasanga', '80', 'http://localhost/restaurant/images/vegetable lasanga.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/masala dosa.jpg" alt="masala dosa">
                <div>MASALA DOSA</div><div>Rs.50</div>
                <button class="button" onclick="addToCart('masala dosa', '50', 'http://localhost/restaurant/images/masala dosa.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/aloo parota.jpg" alt="aloo paratha">
                <div>ALOO PARATHA</div><div>Rs.159</div>
                <button class="button" onclick="addToCart('aloo parota', '159', 'http://localhost/restaurant/images/aloo parota.jpg')">Add To Cart</button>
            </div>
        </div> <br><br><br><br>

        <!-- Non-Vegetarian Dishes -->
        <h3>NON-VEG DISHES</h3>
        <div class="menu-table">
            <!-- Row 1 -->
            <div>
                <img src="http://localhost/restaurant/images/chicken biryani.jpg" alt="chicken biryani">
                <div>CHICKEN BIRYANI</div><div>Rs.350</div>
                <button class="button" onclick="addToCart('chicken biryani', '350', 'http://localhost/restaurant/images/chicken biryani.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/butter chicken.jpg" alt="butter chicken">
                <div>BUTTER CHICKEN</div><div>Rs.299</div>
                <button class="button" onclick="addToCart('butter chicken', '299', 'http://localhost/restaurant/images/butter chicken.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chicken curry.jpg" alt="chicken curry">
                <div>CHICKEN CURRY</div><div>Rs.300</div>
                <button class="button" onclick="addToCart('chicken curry', '300', 'http://localhost/restaurant/images/chicken curry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/mutton korma.jpg" alt="mutton korma">
                <div>MUTTON KORMA</div><div>Rs.450</div>
                <button class="button" onclick="addToCart('mutton korma', '450', 'http://localhost/restaurant/images/mutton korma.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/fish tikka.jpg" alt="fish tikka">
                <div>FISH TIKKA</div><div>Rs.200</div>
                <button class="button" onclick="addToCart('fish tikka', '200', 'http://localhost/restaurant/images/fish tikka.jpg')">Add To Cart</button>
            </div>

            <!-- Row 2 -->
            <div>
                <img src="http://localhost/restaurant/images/chicken wungs.jpg" alt="chicken wings">
                <div>CHICKEN WINGS</div><div>Rs.250</div>
                <button class="button" onclick="addToCart('chicken wings', '250', 'http://localhost/restaurant/images/chicken wungs.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/fish curry.jpg" alt="fish curry">
                <div>FISH CURRY</div><div>Rs.399</div>
                <button class="button" onclick="addToCart('fish curry', '399', 'http://localhost/restaurant/images/fish curry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/grilled chicken.jpg" alt="grilled chicken">
                <div>GRILLED CHICKEN</div><div>Rs.499</div>
                <button class="button" onclick="addToCart('grilled chicken', '499', 'http://localhost/restaurant/images/grilled chicken.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/prawn masala.jpg" alt="prawn masala">
                <div>PRAWN MASALA</div><div>Rs.150</div>
                <button class="button" onclick="addToCart('prawn masala', '150', 'http://localhost/restaurant/images/prawn masala.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chicken seekh kabab.jpg" alt="chicken seekh kabab">
                <div>CHICKEN SEEKH KABAB</div><div>Rs.99</div>
                <button class="button" onclick="addToCart('chicken seekh kabab', '99', 'http://localhost/restaurant/images/chicken seekh kabab.jpg')">Add To Cart</button>
            </div>

            <!-- Row 3 -->
            <div>
                <img src="http://localhost/restaurant/images/egg curry.jpg" alt="egg curry">
                <div>EGG CURRY</div><div>Rs.80</div>
                <button class="button" onclick="addToCart('egg curry', '80', 'http://localhost/restaurant/images/egg curry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chicken sizzler.jpg" alt="chicken sizzeler">
                <div>CHICKEN SIZZLER</div><div>Rs.129</div>
                <button class="button" onclick="addToCart('chicken sizzler', '129', 'http://localhost/restaurant/images/chicken sizzler.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/goat meat curry.jpg" alt="goat meat curry">
                <div>GOAT MEAT CURRY</div><div>Rs.400</div>
                <button class="button" onclick="addToCart('goat meat curry', '400', 'http://localhost/restaurant/images/goat meat curry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chicken shawarma.jpg" alt="chicken shawarma">
                <div>CHICKEN SHAWARMA</div><div>Rs.150</div>
                <button class="button" onclick="addToCart('chicken shawarma', '150', 'http://localhost/restaurant/images/chicken shawarma.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/prawn biryani.jpg" alt="prawn biryani">
                <div>PRAWN BIRYANI</div><div>Rs.299</div>
                <button class="button" onclick="addToCart('prawn biryani', '299', 'http://localhost/restaurant/images/prawn biryani.jpg')">Add To Cart</button>
            </div>

            <!-- Row 4-->
            <div>
                <img src="http://localhost/restaurant/images/chicken tikka.jpg" alt="chicken tikka">
                <div>CHICKEN TIKKA</div><div>Rs.239</div>
                <button class="button" onclick="addToCart('chicken tikka', '239', 'http://localhost/restaurant/images/chicken tikka.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/fish fry.jpg" alt="fish fry">
                <div>FISH FRY</div><div>Rs.300</div>
                <button class="button" onclick="addToCart('fish fry', '300', 'http://localhost/restaurant/images/fish fry.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chettinad chicken.jpg" alt="chettinad chicken">
                <div>CHETTINAD CHICKEN</div><div>Rs.250</div>
                <button class="button" onclick="addToCart('chettinad chicken', '250', 'http://localhost/restaurant/images/chettinad chicken.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/beef stew.jpg" alt="beef stew">
                <div>BEEF STEW</div><div>Rs.359</div>
                <button class="button" onclick="addToCart('beef stew', '359', 'http://localhost/restaurant/images/beef stew.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/roast chicken.jpg" alt="roast chicken">
                <div>ROAST CHICKEN</div><div>Rs.199</div>
                <button class="button" onclick="addToCart('roast chicken', '199', 'http://localhost/restaurant/images/roast chicken.jpg')">Add To Cart</button>
            </div>

            <!-- Row 5-->
            <div>
                <img src="http://localhost/restaurant/images/mutton seekh.jpg" alt="mutton seekh kabab">
                <div>MUTTON SEEKH KABAB</div><div>Rs.299</div>
                <button class="button" onclick="addToCart('mutton seekh kabab', '299', 'http://localhost/restaurant/images/mutton seekh.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/grilled fish.jpg" alt="grilled fish">
                <div>GRILLED FISH</div><div>Rs.129</div>
                <button class="button" onclick="addToCart('grilled fish', '129', 'http://localhost/restaurant/images/grilled fish.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/chicken noodles.jpg" alt="chicken noodles">
                <div>CHICKEN NOODLES</div><div>Rs.159</div>
                <button class="button" onclick="addToCart('chicken noodles', '159', 'http://localhost/restaurant/images/chicken noodles.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/prawn salad.jpg" alt="prawn salad">
                <div>PRAWN SALAD</div><div>Rs.129</div>
                <button class="button" onclick="addToCart('prawn salad', '129', 'http://localhost/restaurant/images/prawn salad.jpg')">Add To Cart</button>
            </div>
            <div>
                <img src="http://localhost/restaurant/images/fried chicken.jpg" alt="fried chicken">
                <div>FRIED CHICKEN</div><div>Rs.199</div>
                <button class="button" onclick="addToCart('fried chicken', '199', 'http://localhost/restaurant/images/fried chicken.jpg')">Add To Cart</button>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>