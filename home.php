<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, 
        initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Restaurant Website</title>
</head>

<body>
    <nav>
        <ul class="nav-flex-row">
            <li class="nav-item">
                <a href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a href="reservation.php">Reservation</a>
            </li>
            <li class="nav-item">
                <a href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
                <a href="logout.php">logout</a>
            </li>
        </ul>
    </nav>
    <section class="section-intro">
        <header>
            <h1> Welcome To Fooddie's
                Kitchen</h1>
        </header>
        <div class="link-to-book-wrapper">
            <a class="link-to-book" href="reservation.php">Book a table</a>
        </div>
    </section>

    <section class="about-section">
        <article>
            <p>
                "At Foodies Kitchen, we take pride in offering an unparalleled dining experience.
                Our passion for crafting delicious dishes using the freshest, locally-sourced ingredients sets us apart.
                What truly makes us the best is the warm and inviting ambiance that accompanies every visit.
                Our dedicated chefs and attentive staff work tirelessly to ensure that each guest enjoys not just a
                meal,
                but a memorable culinary journey. With a commitment to community and sustainability,
                we embrace a farm-to-table philosophy that not only supports local producers but also guarantees the
                exceptional quality of every dish. Come and savor the difference at [Your Restaurant Name],
                where we believe in making every dining experience extraordinary."
            </p>

        </article>
    </section>
        <!-- carousel section -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php
        $imageUrls = array(
            'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1998&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1619096252214-ef06c45683e3?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        );
        foreach ($imageUrls as $index => $imageUrl) {
            $activeClass = ($index === 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<img src="' . $imageUrl . '" class="d-block w-100" style="object-fit: cover;" alt="food">';
            echo '</div>';
        }
        ?> 
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row-flex">
            <div class="flex-column-form">
                <h3>
                    Make a booking
                </h3>
                <form class="media-centered" action="callBack.php" method="post">
                    <div class="form-group">
                        <p>
                            Please leave your number we will
                            call to make a reservation
                        </p>
                        <input type="text" name="Name" class="form-control" id="Name" aria-describedby="nameHelp"
                            placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="PhoneNumber" class="form-control" id="PhoneNumber"
                            placeholder="Enter your phone number">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
            <div class="opening-time">
                <h3>
                    Opening times
                </h3>
                <p>
                    <span>Monday—Thursday: 08:00 — 22:00</span>
                    <span>Friday—Saturday: 09:00 — 23:00 </span>
                    <span>Sunday: 10:00 — 17:00</span>
                </p>
            </div>
            <div class="contact-address">
                <h3>
                    Contact
                </h3>
                <p>
                    <span>961-1 000 000</span>
                    <span>32 Lebanon Down Town</span>
                    <span>Palo-Alto, 1111 CA</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>