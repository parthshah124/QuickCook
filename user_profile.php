<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<?php
	$con=mysqli_connect("127.0.0.1","root","","sen");
	$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
	mysql_select_db("sen") or die ("Couldn't connect to database");

	session_start();
	
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
		$newvar= $_SESSION['uname'];
		$name=$_SESSION['uname'];
		$result = mysql_query("SELECT * FROM users WHERE Uname = '$newvar'");
		$row = mysql_fetch_array($result);
	} else{
		echo "<script type='text/javascript'> alert('You are not logged in. Please login!')</script>";
		header('Location: login.php');
	}								
	?>
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
		<div><div>
			<h1> <?php  echo $row['full_name']; ?> </h1>
			<div class="body">
				<div id="content">
					<div class="row">
						<div class="span6">
						
						<form name="SignUpForm" action="" method="post" onSubmit="write();return false;">
						<table border="0" cellpadding="8" cellspacing="0">
							<tr>
							<td><strong>User Name</strong></td>
							<td><?php  echo $row['Uname']; ?></td>
							</tr> 

							<tr>
							<td><strong>Email Id </strong></td>
							<td><?php  echo $row['email_id']; ?></td>
							</tr>
							 
							<tr>
							<td><strong>Date of Birth </strong></td>
							<td> <?php  echo $row['DOB']; ?></td>
							</tr>

							<tr>
							<td><strong>Sex </strong></td>
							<td> <?php  echo $row['sex']; ?></td>
							</tr>
						</table>
						</form>
						
						</hr>
						<h2 style="font-size:13px;margin-left:40px; margin-top:80px; color:#3A2F0B;">
							<?php echo "<a style='color:#3A2F0B;' href='history.php?name=".$name."'>"; ?> View History </a>
						</h2>
						<h2 style="font-size:13px;margin-left:40px; margin-top:15px;color:#3A2F0B;">
							<?php echo "<a style='color:#3A2F0B;' href='cart.php'>" ?> View Shopping Cart </a>
						</h2>
						<h2 style="font-size:13px;margin-left:40px; margin-top:15px; color:#3A2F0B;">
							<?php echo "<a style='color:#3A2F0B;' href='changepassword.php'>" ?> Change Password </a> 
						</h2>
						</div>
					</div>
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