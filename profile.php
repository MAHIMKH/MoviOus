<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>MoviOus</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <h1>MoviOus</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">Trends</a></li>
            </ul>
        </nav>
        
        
        
        <div class="search-container">
            <input type="text" class="search-bar" id="searchBar" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
            <div id="suggestions" class="suggestions-box"></div>
        </div>
        <div class="profile">
            <?php if (isset($_SESSION['username'])): ?>
                <span style='position: absolute; font-size: 20px; margin-left:1210px;'>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <?php else: ?>
            <?php endif; ?>
        </div>

        <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="logout">Log Out</a>
        <?php endif; ?>
    </div>
    <div class="container1">
        <img src="pic/money height.webp" alt="">
        <h1>Money Heist</h1>
        <p>A criminal mastermind who goes by "The Professor" has a plan to pull off the biggest heist in recorded history -- to print billions of euros in the Royal Mint of Spain. To help him carry out the ambitious plan, he recruits eight people with certain abilities and who have nothing to lose.Eight thieves take hostages and lock themselves in the Royal Mint of Spain as a criminal mastermind manipulates the police to carry out his plan. Watch all you want. This riveting crime series won Best Drama at the International Emmy Awards, Premios Fénix and Premios Iris (plus six more Iris wins).</p>
        <h2>2017 | Maturity Rating:18+ | 5 Seasons | Thriller</h2>

        <a href="https://www.youtube.com/watch?v=_InqQJRqGW4&pp=ygUTbW9uZXkgaGVpc3QgdHJhaWxlcg%3D%3D"><button>WATCH NOW</button></a>
        
    </div>
    <div class="new">NEW RELEASES</div>

    <h1 class="anime">Anime Movies</h1>
    <div class="movi-box">
        <div class="movie">
            <a href="http://youtu.be/kCUrfsbPLjc?si=jzatUwl7p_Ivku8n"><img src="pic/jjk.webp" alt=""></a>
                <h2>jujutsu Kaisen</h2>
            </div>
        
        <div class="movie">
            <a href="https://www.youtube.com/watch?v=22R0j8UKRzY&pp=ygUObmFydXRvIHRyYWlsZXI%3D"><img src="pic/naruto.webp" alt=""></a>
                <h2>Naruto</h2>
            </div>
        

        <div class="movie">
            <a href="https://www.youtube.com/watch?v=YvGSK8mIlt8&pp=ygUVc29sbyBsZXZlbGluZyB0cmFpbGVy"><img src="pic/Solo leveling.webp" alt=""></a>
                <h2>Solo Leveling</h2>
            </div>
        
        
        <div class="movie">
            <a href="https://www.youtube.com/watch?v=MCb13lbVGE0&pp=ygURb25lIHBpZWNlIHRyYWlsZXI%3D"><img src="pic/One piece.webp" alt=""></a>
                <h2>One piece</h2>
            </div>
        
        
        <div class="movie">
            <a href="https://www.youtube.com/watch?v=j9sSzNmB5po&pp=ygUUY2hhaW5zYXcgbWFuIHRyYWlsZXI%3D"><img src="pic/chainsaw man.webp" alt=""></a>
                <h2>Chainsaw Man</h2>
            </div>
        
    </div>

    <div class="contact">
    <div class="myinfo">
        <h1>Contact Details</h1>
        <p>Name: Md. Mezbaul Haque</p>
        <p>Id: 213-15-4512</p>
        <p>Daffodil International University</p>
        <p>Email: Haque15-4512@diu.edu.bd</p>
        <p>Number: 01704050243</p>
    </div>

    <div class="srs">
    <h2>SRS</h2>
    <img src="pic/srs.webp" alt="">
    <a href="srs.pdf" target="_blank"><p>Click Here...</p></a>
</div>



    </div>
   </div>
   


    <script src="main.js"></script>
    
</body>
</html>