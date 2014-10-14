<!DOCTYPE html>
<html>

<?php
	$con=mysqli_connect("127.0.0.1","root","","sen");
	$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
	mysql_select_db("sen") or die ("Couldn't connect to database");
	if($link==true)
	SESSION_START(); 
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
  
	$d=$_GET["name"];
	$b = mysqli_query($con,"SELECT Dname FROM dish WHERE Dname IN ('$d')");
	$p = mysqli_fetch_array($b);
	if(isset($p['Dname']))
	{}
	else
	{
		header('Location: browsing.php');
	}
	
	$newvar="";
	if(!empty($_SESSION['uname']))
	$newvar= $_SESSION['uname'];			// history function
	if(!empty($newvar))
	{
		
		$run=mysql_query("select * from hasseen where Uname = '$newvar'");
		$n=mysql_num_rows($run);
		if($n>15)
		{
			// delete one entry
			mysql_query("DELETE from hasseen order by on_date LIMIT 1");
		}
		
		$run=mysql_query("select * from hasseen where Uname = '$newvar' AND Dname='$d'");
		if(mysql_num_rows($run)>0)
		{
			mysql_query("DELETE from hasseen WHERE Uname = '$newvar' AND Dname='$d'");
			mysql_query("INSERT INTO `hasseen`(`Uname`, `Dname`) VALUES ('$newvar','$d')");
		}else{
			mysql_query("INSERT INTO `hasseen`(`Uname`, `Dname`) VALUES ('$newvar','$d')");
		}
	}
	
	
	// rating functions starts 
	if(isset($_POST['rate']) && isset($_POST['val']))
	{
		if(empty($newvar))
		{
			echo "You are not logged in so you can not rate dish";
			header('Location: login.php');
		}
		else
		{
			$rating=$_POST['val'];
			$query_run=mysql_query("select * from rated where Uname='$newvar' AND Dname='$d' ");
			$n=mysql_num_rows($query_run);
			
			if($n==0)
			{
				// number of users rated the dish would go up by 1.
				$row=mysql_query("select Number_Of_Users_rated_it from dish where Dname='$d' ");
				$col=mysql_fetch_assoc($row);
				$val=$col['Number_Of_Users_rated_it'];
				$val++;
				mysql_query("UPDATE dish SET `Number_Of_Users_rated_it`='$val' where Dname='$d'");
				mysql_query("INSERT into `rated` (`Uname`, `Dname`, `rating`) VALUES ('$newvar','$d','$rating')");
			}
			else
			{
				// number of users rated the dish would stay constant.
				mysql_query("UPDATE `rated` SET `rating`='$rating' where (Uname='$newvar' AND Dname='$d')");
			}
			// to change the overall rating 
			$row=mysql_query("select SUM(rating) ,COUNT(*) from rated GROUP BY Dname");
			$col=mysql_fetch_assoc($row);
			$total=$col['SUM(rating)'];
			$user=$col['COUNT(*)'];
			$avg_rating=$total/$user;
			// now i have to update this overall rating ..
			mysql_query("UPDATE dish SET `avg_rating`='$avg_rating' where Dname='$d'");
		}
	}
	
	if(isset($_POST['cart']) && isset($_POST['quant']))
	{
		//print_r($_REQUEST);
		//print(‘</pre>’);
		if(empty($newvar))
		{
			echo "You are not logged in so you can not add dish to cart";
			header('Location: login.php');
		}
		else
		{
			
			$quant=$_POST['quant'];
			$run=mysql_query("select * from shoppingcart where (Dname='$d' and Uname='$newvar') ");
			$n=mysql_num_rows($run);
			if($n>0)
			{	
				$run=mysql_query("UPDATE shoppingcart SET quant = '$quant' where (Dname='$d' and Uname='$newvar') ");
			}
			else
			{
				$run=mysql_query("select COUNT(*) from shoppingcart where Uname='$newvar' GROUP BY Uname");
				$row=mysql_fetch_assoc($run);
				$n=$row['COUNT(*)'];
				if($n<15){
					$run=mysql_query("select num_of_dishes_in_cart from users where Uname='$newvar' ");
					$row=mysql_fetch_assoc($run);
					$cnt=$row['num_of_dishes_in_cart'];
					$cnt++;
					mysql_query("UPDATE `users` SET `num_of_dishes_in_cart`='$cnt' where Uname='$newvar'");
					mysql_query("INSERT INTO `shoppingcart`(`Uname`, `Dname`, `Quant`) VALUES ('$newvar','$d','$quant')");
				}else{
					echo "<script type='text/javascript'> alert('Maximum cart limit reached. Empty cart!')</script>";
				}
				
			}
		}
	}	
?>

<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
<!-- ..................................................................................................................................... -->	

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
		
		#quick_info
		{
			list-style: none;
			margin: 25px 0 20px 30px;
			overflow: hidden;
			padding: 0; 
		}
		
		#quick_info li
		{
			color: #6C5B37;
			float: left;
			line-height: 24px;
			padding: 0;
			width: 300px; 
		}
		
		
	</style>


<!-- ..................................................................................................................................... -->	
	
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
			<div class="body">
				<div id="content">
					<div>
						<div id="recipe_detail">
							<h3> <?php
								$result1 = mysqli_query($con,"SELECT Dname FROM dish WHERE Dname IN ('$d')");
								$dname = mysqli_fetch_array($result1);
								echo strtoupper(substr($dname['Dname'], 0, 1)).strtolower(substr($dname['Dname'], 1));
							?> </h3>
							
							<div id="button_panel">
								<div id="left_button">
									<form style="width:300px" method="POST">
										<select style="width:50px;height:25px;" valign="center" name="val">
											<option value="1"> 1 </option>
											<option value="2"> 2 </option>
											<option value="3"> 3 </option>
											<option value="4"> 4 </option>
											<option value="5"> 5 </option>
										</select>
										<input type="submit" value="Rate"name="rate"style="width:80px;height:28px;" valign="center">
									</form>
								</div>
								<div>
									<form method="POST">
										<select style="width:70px;height:25px;" valign="center" name="quant">
											<option value="1"> Quantity </option>
											<option value="1"> 1 </option>
											<option value="2"> 2 </option>
											<option value="3"> 3 </option>
											<option value="4"> 4 </option>
											<option value="5"> 5 </option>
											<option value="6"> 6 </option>
											<option value="7"> 7 </option>
											<option value="8"> 8 </option>
											<option value="9"> 9 </option>
											<option value="10"> 10 </option>
										</select>
										<input type="submit"  value="Add to Cart" name="cart" style="width:100px;height:28px;">			
									</form>
								</div>
							</div>
							<div>
								<br><hr>
								<ol id="quick_info">
								<li>
									<h5>Difficulty : <?php
														$result2 = mysqli_query($con,"SELECT difficulty_level FROM dish WHERE Dname IN ('$d')");
		
														$diff = mysqli_fetch_array($result2);
														echo $diff['difficulty_level'].' / 5';
													?></h5>
								</li>
								<li>
									<h5>Time Required : <?php
														$result3 = mysqli_query($con,"SELECT preparation_time FROM dish WHERE Dname IN ('$d')");
		
														$prep = mysqli_fetch_array($result3);
														echo $prep['preparation_time'];
														echo "min";
													?></h5>
								</li>
								<li>
									<h5>User Rating : <?php
														$result4 = mysqli_query($con,"SELECT avg_rating FROM dish WHERE Dname IN ('$d')");
		
														$rate = mysqli_fetch_array($result4);
														echo $rate['avg_rating'].' / 5';
											
													?></h5>
								</li>
								<li>
									<h5>Calorie : <?php
														$result5 = mysqli_query($con,"SELECT total_calorie FROM dish WHERE Dname IN ('$d')");
		
														$cal = mysqli_fetch_array($result5);
														echo $cal['total_calorie'];
											
													?></h5>
								</li>
								<li>
									<h5>Cusine : <?php
														$result6 = mysqli_query($con,"SELECT cuisine FROM dish WHERE Dname IN ('$d')");
		
														$cus = mysqli_fetch_array($result6);
														echo $cus['cuisine'];
											
													?></h5>
								</li>
								</ol>
							<hr>
	
							</div>
							
							<?php
								$str="images/".strtolower($dname['Dname']).".jpg";
								$str2='<img src="'.$str.'"'.'alt="Image">';
								echo $str2;
							?>
							
							
							<h5>DIRECTIONS</h5>
							<?php
								$result7 = mysqli_query($con,"SELECT recipe FROM dish WHERE Dname IN ('$d')");
								$dir = mysqli_fetch_array($result7);
								echo $dir['recipe'];
							?>
						</div>
					</div>
				</div>
			</div>
			
<!-- .......................................................................................................................................... -->			
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