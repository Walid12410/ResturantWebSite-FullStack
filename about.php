<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Restaurant</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
	.nav-flex-row {
		display: flex;
		flex-direction: row;
		justify-content: center;
		position: absolute;
		z-index: 100;
		left: 0;
		width: 100%;
		padding: 0;
	}

	.nav-flex-row li {
		text-decoration: none;
		list-style-type: none;
		padding: 20px 15px;
	}

	.nav-flex-row li a {
		font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		color: #000;
		font-size: 1.5em;
		text-transform: uppercase;
		font-weight: 400;
		text-decoration: none;
	}

	.nav-flex-row li a:hover {
		background: #E7E7E7;
		text-decoration: none;
	}

	.section-intro {
		height: 820px;
		background-image: url('https://images.unsplash.com/photo-1530541873326-1e70f0e1502b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
		background-size: cover;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}

	.section-intro h1 {
		text-align: center;
		color: #000;
		font-size: 4em;
		font-weight: 700;
	}

	.section-intro header {
		display: flex;
		flex: 4;
		flex-direction: row;
		justify-content: center;
		align-items: center;
	}

	.link-to-book-wrapper {
		flex: 1;
	}

	.about-section {
		display: flex;
		align-items: center;
		background-color: #f3f3f3c0;
		padding: 50px 30px;
	}

	.link-to-book {
		color: #ffffff;
		display: block;
		border: 2px solid #ffffff;
		padding: 5px 10px;
	}

	a.link-to-book:hover {
		background-color: #ffffff;
		color: #95999e;
		text-decoration: none;
	}

	.about-section p,
	.about-section h3 {
		text-align: center;
		width: 60%;
		margin: auto;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		font-size: 1.8em;
		text-transform: uppercase;
	}

	@media (min-width:577px) and (max-width: 800px) {

		.section-intro {
			height: 500px;
		}

		.about-section p,
		.about-section h3 {
			font-size: 20px;
		}


		.row-flex {
			display: flex;
			flex-direction: column;
		}
	}

	@media screen and (max-width: 576px) {
		.section-intro {
			height: 300px;
		}

		.about-section {
			padding: 30px;
		}

		.section-intro h1 {
			font-size: 2em;
		}

		.about-section p,
		.about-section h3 {
			font-size: 15px;
		}


		.row-flex {
			display: flex;
			flex-direction: column;
		}

		.row-flex h3 {
			font-size: 25px;
			text-align: center;
		}


	}
</style>

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
	</section>
	<section class="about-section">
		<article>
			<h3>
				About Us
			</h3>
			<br>
			<p>
				Welcome to Foodie's Kitchen, where passion meets plate.
				Our chefs craft culinary masterpieces from the finest local
				ingredients. At [Your Restaurant Name], we're not just serving
				meals; we're creating moments. Join us for an unforgettable
				dining experience, where every bite is a celebration of flavor,
				and every visit is a cherished memory.
			</p>
		</article>
	</section>
</body>

</html>