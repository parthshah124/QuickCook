<!DOCTYPE html>
<html>

<?php
	$con=mysqli_connect("127.0.0.1","root","","sen");			//Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	SESSION_START(); 
	$name=$_GET['name'];
	$newvar="";
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
	$newvar= $_SESSION['uname'];
	
	$result = mysqli_query($con,"SELECT Dname FROM hasseen WHERE Uname = '$name' ORDER BY on_date DESC");
?>

<head>
	<meta charset="UTF-8">
	<title>Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		#recipe_detail h3
		{
			margin: 40px 30px 50px 40px;
			font-size: 30px;
		}
		
		#button_panel
		{
			margin: 20px 10px 10px 20px;
		}
		
		#left_button
		{
			float: left;
			width: 550px;
		}
	</style>
</head>

<!-- -----------------------------------------------------HTML Body ------------------------------------------------------------------------------ -->

<body>
    <div class="header">							
		<div>
			<a href="index.php"><img src="images/logo.png" alt="Logo"></a>
		</div>
		<form action="dish_page.php" method="get">																			<!-------search bar------>
			<input type="text" placeholder="Search for the recipes!" id="search" name="name">
			<input type="submit" value="" id="searchbtn">
		</form>
	</div>
	
	<div class="body">
		<div>
			<h1> My History </h1>
			<div id="button_panel">
			</div>
			<div class="body">
				<div id="content">
					<div>
						<ul>
							<?php
								while($row = mysqli_fetch_array($result))
								{
									$a= $row['Dname'];
									echo "<li><a href='dish_page.php?name=".$a."'><img src='images/".$a.".jpg' alt='Image'></a><div><h3>";
									echo strtoupper(substr($a, 0, 1)).strtolower(substr($a, 1));
									echo "<p> rating: ";
									$rate = mysqli_query($con,"SELECT avg_rating FROM dish WHERE Dname = '$a'");
									$row = mysqli_fetch_array($rate);
									echo $row['avg_rating'];
									echo "</p>";
									echo "</h3></div></li>";
								}
							?>
						</ul>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div>
			<?php 
				/*---- Checking for user login --*/ 
				if(!empty($_SESSION['uname']))
					echo '<h2 style="font-size:18px"><a href="user_profile.php"> Welcome '.$newvar.'!</a></h2><br><br>';
				else
					echo '<h2 style="font-size:18px">Welcome Guest!</h2><br><br>';
			?>
				
			<h3>Features</h3>
			<ul id="featured">
				<li>
					<div>
						<h2><a href="index.php"> Home</a></h2>
					</div>
				</li>
				<li>
					<div>
						<h2><a href="what_to_eat.php">What to Eat</a></h2>
					</div>
				</li>
				<li>	
					<div>
						<h2><a href="recipe_suggestion.php">Recipe Suggestion</a></h2>
					</div>	
				</li>
				<li>	
					<div>
						<h2><a href="browsing.php">Recipe Browsing</a></h2>
					</div>	
				</li>
				<li>	
						<div>
							<h2><a href="help.php">Help</a></h2>
						</div>	
					</li>
			</ul>
		</div>
			
		<div>																						<!----------- Login/ Logout -------->																					
			<?php
				if(empty($_SESSION['uname']))
					echo '<h2 style="font-size:18px"><a href="login.php">Log in</a></h2>';
				else
					echo '<h2 style="font-size:18px"><a href="logout.php">Logout</a></h2>';
			?>		
		</div>
	</div>
</div>
	
	<div class="footer">																				<!------------Footer Section--------->
		<div>
			<p>&copy; Developed by SOFTWARE ENGINEERING Group 24</p>
		</div>
	</div>
</body>
</html>