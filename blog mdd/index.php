<!DOCTYPE html>
<html>
<head>
	<title>
		The Venturer
	</title>
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">The Venturer</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" onclick="profileToggle()">Profile <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item" onclick="newPostToggle();">
	        <a class="nav-link" href="#">New Post <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	    <form class="form-inline">
	    	<?php
	    	session_start();
	    	 if(isset($_SESSION['email'])) {
	    		echo "<button type=\"button\" class=\"btn btn-outline-success\" onclick=\"logoutPage()\">Logout</button>";
	    	}
	    	else {
	    		echo "<button type=\"button\" class=\"btn btn-outline-success\" onclick=\"loginPage()\">Login</button>";
	    	} ?>
	    </form>
	  </div>
	</nav>

	<section class="profile-wrapper">
		<div class="profile">
			<?php

				if(isset($_SESSION['email'])) {
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "blogmdd";

					$conn = new mysqli($servername, $username, $password, $dbname);

					$em = $_SESSION['email'];

					$query = "SELECT * FROM userdetails WHERE email LIKE '$em'";
					$sql = $conn->query($query);
					if($sql->num_rows) {
						$row = $sql->fetch_assoc();
						echo "<h1> USER DETAILS </h1>";
						echo "<div class='profile-name'>
								<h1><span class='color-green'>Name:</span> " . $row['name'] . "
						</h1></div>";
						echo "<div class='profile-email'>
								<h1><span class='color-green'>Email:</span> " . $row['email'] . "</h1></div>";
						echo "<div class='profile-button'>
								<button type='button' class='btn btn-outline-success' onclick='profileToggle()'>Close</button>
								</div>";
					}
				}
				else {
					header("location: login.php");
				}

			?>
		</div>
	</section>

	<section class="new-post-wrapper">
		<div class="new-post">
			<div class="new-post-text">
				<h1>New Post</h1>
			</div>
			<form id="new-post-form" name="new-post-form" method="post" action="newpost.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="post-title">Title:</label>
    				<input type="text" class="form-control" name="title" id="post-title" placeholder="Title">
				</div>
				<div class="form-group">
					<label for="post-text">Text:</label>
    				<input type="text" class="form-control" name="text" id="post-text" placeholder="Text">
				</div>
				<div class="form-group">
					<label for="post-title">Photo:</label>
    				<input type="file" class="form-control" accept="image/*" name="photo" id="post-photo" placeholder="Photo">
				</div>
				<div class="submit-btn">
					<button type="submit" class="btn btn-outline-success">Submit</button>
					<button type="button" onclick="newPostToggle()" class="btn btn-outline-success">Close</button>
				</div>
				
			</form>
		</div>
	</section>

	<section class="read-post-wrapper">
		<div class="read-post">
			<div class="read-post-title">
				<h1></h1>
			</div>
			<div class="read-post-img">
				<img src="">
			</div>
			<div class="read-post-content">
				<p></p>
			</div>
			<div class="read-post-button">
				<button type="button" class="btn btn-outline-success">Close</button>
			</div>
		</div>
	</section>

	<section class="banner-wrapper">
		<div class="banner">
			<div class="banner-text">
				<h1>ADLFkjlsd LAKfj laksdLfk</h1>
				<h3>adksfjas;ld asldkfj asdf</h3>
			</div>
		</div>
	</section>
	<section class="main container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<?php

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "blogmdd";

				$count = 0;

				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$query = "SELECT * FROM postdetails";
				$sql = $conn->query($query);
				if($sql->num_rows > 0) {
					while($row = $sql->fetch_assoc()) {
						echo "<div class='blog-post' id='post$count'>
								<div class = 'blog-title'>
									<h1>" . $row['title'] . "</h1>
								</div>
								<div class='blog-img'>
									<img src='" . $row['photopath'] . "' width='100%'>
								</div>
								<div class='blog-text'>
									<p>" . $row['postcontent'] . "</p>
								</div>
								<div class='blog-button'>
									<button type='button' class='btn btn-outline-success' onclick='postToggle($count)'>Read More</button>
								</div>
							</div>";
							$count += 1;
					}
				}

				?>
				
			</div>
		</div>
	</section>
  	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>