<!DOCTYPE html>
<html>
<head>

	<?php
		session_start();
		$newvar = "";
		if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
		$newvar= $_SESSION['uname'];
	?>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
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
			<h1> Help </h1>
			<div class="body">
				<div id="content">
					
						<div class="row">
        <div class="span6">
    	<h4>Recipe Suggestion</h4>
    	<p>On opening the recipe suggestion page there will be options to add ingredients the user possesses. Further ingredients can be added by including pressing the add button. Select ingredients from the drop menu. Add as many ingredients as you want. Once you are done adding the ingredients, press “Submit” and a list will be generated of the possible dishes that can be made. Select the recipe by click on the name and the recipe page will be made.</p>
    	<h4>Shopping Plan</h4>
    	<p>The shopping plan page contains a list where the user can add the recipes which they want to make and can specify the quantity. Add as many dishes you want and the respective quantity of each dish. Remember, each dish is designed to serve one person. On pressing the submit button, a shopping list will be generated at the user profile. </p>
    	<h4>What to Eat</h4>
    	<p>The What to Eat feature is a to select the healthiest option of dishes from the dishes entered by the user.  The page has an option to add dishes to the list. Add as many dishes as you wish. On pressing the submit button the dish which has the least calories will be suggested. </p>
    	<h4>Recipe Browsing</h4>
    	<p>Recipe Browsing is a feature to casually look through the database of the website. On opening the Recipe Browsing page, there will be an option of arranging the recipes according to rating, calorie, difficulty level and preparation time and a select cuisine option. Initially, recipes of all cuisines will be displayed and after selecting a cuisine from Indian, South Indian, Punjabi, Gujarati, Italian, Chinese and the recipes will be shown only of the cuisine selected. </p>
    	<h4>Recipe Search</h4>
    	<p>At the anytime while accessing the website, you can type into the search bar and the corresponding recipe will be shown. </p>
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