<!DOCTYPE html>

<html>
<?php
	/* Check for user login */
	SESSION_START();						
	$newvar="";
	if(!empty($_SESSION['uname']))
		$newvar= $_SESSION['uname'];
?>


<!-- -----------------------------------------------------HTML HEAD ------------------------------------------------------------------------------ -->	
<head>											
	<meta charset="UTF-8">
	<title>Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		<div>
			<h1>Home</h1>
			<div class="body">
				<div id="content">
				<div class="row">
					<div class="span6">
						<h4>Quick Cook</h4>
							<p>
							Welcome to quickcook.com! We hope you find what you're looking for and end up with a healthy and delicious meal! 
							Browse through our many recipes at your will, create an account and login to access our myriad features like 
							</p><br>
							<p>
							The shopping plan: Figure out what you need to get from the store for your ideal menu!
							</p><br>
							<p>
							What to eat: Confused what to choose from the things in your cafeteria? Use this feature to select the healthiest option!
							</p><br>
							<p>
							Recipe suggestion feature: Out of ideas for dinner? Enter the ingredients in your fridge and get the recipes you can make from them!
							</p><br>
							<p>
							Share delicious dish recipes with your friends and enjoy :)
							</p>
							<h5><br><br>
							Direct all your mails and suggestions to: daiict.senproject@gmail.com
							</h5>
					</div>
				</div>
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