<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online kids Book Store</title>
    <link rel="stylesheet" href="style.css">
    <!--swiper-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!--header section-->
    <header class="header">
        <div class="header-1">
            <a href="/" class="logo"> <i class="fas fa-book"></i> Be A Reader </a>
            <!--icons-->
            <div class="icons">
                <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
                <?php 
                session_start();
                $is_authenticated = isset($_SESSION["is_authenticated"])?true:false;
                $user = isset($_SESSION["name"])?$_SESSION["name"]:'';
                if ($is_authenticated) {
                    echo '<p style="color:#000;font-size:100%;"> Welcome <b>'.$user.'</b> | <a href="logout.php" style="font-size:100%;">Logout</a></p>';
                } else {
                    echo '<div id="login-btn" class="far fa-user"></div>';
                }


                if (isset($_GET["error"])) {
                    $error = $_GET["error"];
                    if ($error === '1') {
                        echo '<script>alert("Invalid username or password");</script>';
                    } else if ($error === '2') {
                        echo '<script>alert("Invalid database issue");</script>';
                    } else {
                        echo '<script>alert("Unknown error occured");</script>';
                    }
                }
                ?>

            </div>
        </div>
        <!-- the Pages-->
        <div class="header-2">
            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#featured">featured</a>
                <a href="#arrivals">arrivals</a>
            </nav>
        </div>
    </header>
    <!-- icons for the Pages-->
    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
    </nav>

    <!--login-->
    <div class="login-form-container">
        <div id="close-login-btn" class="fas fa-times"></div>
        <form action="login.php" method="post">
            <h3>Sign In</h3>
            <span>Username</span>
            <input type="text" name="name" class="box" placeholder="Enter your username" id="" value="admin">
            <span>Password</span>
            <input type="password" name="pass" class="box" placeholder="Enter your password" id="" value="admin">
            <input type="submit" value="Sign In" class="btn">
            <!-- <p>forget password ? <a href="#">click here</a></p>
            <p>don't have an account ? <a href="#">create one</a></p> -->
        </form>
    </div>

    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Be A Reader</h3>
                <p> Books is your world to explore </p>
                <a href="#" class="btn">shop now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src="KidsBook/big Nate and friends.jpeg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="KidsBook/how big are your worries little bear.jpeg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="KidsBook/I can count.jpeg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="KidsBook/Pete the Cat.jpeg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="KidsBook/The Sleepover.jpeg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="KidsBook/Ruby finds a worry.jpeg" alt=""></a>
                </div>
                <img src="KidsBook/stand.png" class="stand" alt="">
            </div>
        </div>
    </section>

    <!-- icons section starts  -->
    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>free shipping</h3>
                <p>order over SAR100</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>secure payment</h3>
                <p>100 secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>easy returns</h3>
                <p>10 days returns</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>
    </section>

    <section class="featured" id="featured">
        <h1 class="heading"> <span>featured books</span> </h1>
        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <!--pic 1-->
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/big Nate and friends.jpeg" alt=" Big Nate And Frirnds">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
                <!--pic 2-->
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/how big are your worries little bear.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
                <!--pic 3-->
                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/I can count.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
                <!--pic 4-->
                <div class="swiper-slide box">

                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/Pete the Cat.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
                <!--pic 5-->
                <div class="swiper-slide box">

                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/The Sleepover.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR</div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
                <!--pic 6-->
                <div class="swiper-slide box">

                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="KidsBook/Ruby finds a worry.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>featured books</h3>
                        <div class="price">15SAR </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!--arrivals section-->
    <section class="arrivals" id="arrivals">
        <h1 class="heading"> <span>new arrivals</span> </h1>
        <div class="swiper arrivals-slider">
            <!--pic1-->
            <div class="image">
                <img src="KidsBook/I can count.jpeg" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">15SAR</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <!--pic2-->
            <div class="image">
                <img src="KidsBook/big Nate and friends.jpeg" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">15SAR </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- arrivals section ends -->

    <!--bootom-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
            </div>
            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +966453678943</a>
                <a href="#"> <i class="fas fa-envelope"></i> info@gmail.com </a>
            </div>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-pinterest"></a>
            </div>
        </div>
    </section>

    <!--swiper-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="script.js"></script> 
</body> 
