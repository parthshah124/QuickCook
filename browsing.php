<!DOCTYPE html>

<html>
<!--------------------------------------- HTML PART---------------------------------------------------------->
<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!---------PHP PART------------>
	
<?php
	$con=mysqli_connect("localhost","root","","sen");
	session_start();
	$newvar="";
	
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
		$newvar= $_SESSION['uname'];
		
	if (mysqli_connect_errno()){
	  echo "<script type='text/javascript'> alert('Unable to connect to database. Try later!')</script>";
		header('Location: index.php');
	}
		
	$result = mysqli_query($con,"SELECT Dname FROM dish");
		
	if(isset($_GET['cuisine'])){
		$cusine=$_GET['cuisine'];
			
		$result = mysqli_query($con,"SELECT Dname FROM dish where cuisine='$cusine'");
		$var=$cusine;
	}
		
		
	if(isset($_GET['sort'])){
		$sort=$_GET['sort'];
		$result = mysqli_query($con,"SELECT Dname FROM dish ORDER BY $sort DESC");
		if($cusine!=''){
			$result = mysqli_query($con,"SELECT Dname FROM dish where cuisine='$cusine' ORDER BY $sort DESC");
		}
	}
?>

	
	<style>
		#recipe_detail h3{
			margin: 40px 30px 50px 40px;
			font-size: 30px;
		}
		
		#button_panel{
			margin: 20px 10px 10px 20px;
		}
		
		#left_button{
			float: left;
			width: 550px;
		}
		
		#quick_info{
			list-style: none;
			margin: 25px 0 20px 30px;
			overflow: hidden;
			padding: 0; 
		}
		
		#quick_info li{
			color: #6C5B37;
			float: left;
			line-height: 24px;
			padding: 0;
			width: 300px; 
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
		<div><div class="body">
			<div id="content">
				<div>
					<div id="recipe_detail">
						<h3> Recipe Browsing </h3>
							<div id="button_panel">
							<form>
								<div id="left_button">
								<h5> Sort By</h5>									
									<select style="width:120px;height:25px;" valign="center" placeholder="Sort By" name="sort" >	
										<option value="total_calorie"> total_calorie </option>
										<option value="difficulty_level"> difficulty_level </option>
										<option value="preparation_time"> preparation_time </option>
										<option value="avg_rating"> avg_rating </option>
									</select>						
								</div>
								<div>
								<h5> Select Cusine</h5>
									<input type="text" value="<?php if(isset($cusine)){echo $cusine;}?>" placeholder="Choose Cusine" autocomplete="off" name="cuisine" style="width:150px;height:20px;">
									<input type="submit" value="GO!!" style="width:80px;height:28px;" valign="center">
								</div>
							</form>
							</div>
					</div>
					
						<ul>							
						<?php
							while($row = mysqli_fetch_array($result)){
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
		</div></div>
		
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