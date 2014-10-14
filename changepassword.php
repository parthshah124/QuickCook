<!DOCTYPE html>

<html>
<!------------------------------------PHP-------------------------------------------------------------------------->
<?php
	$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
	mysql_select_db("sen") or die ("Couldn't connect to database");
	$con=mysqli_connect("127.0.0.1","root","","sen");

	session_start();
	
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
		$newvar= $_SESSION['uname'];
		$uname=$_SESSION['uname'];
		
		if(isset($_POST['password'])&& isset($_POST['confirmnewpassword'])&&isset($_POST['confirmpassword'])){
			$pass= md5($_POST['password']);
			$newpass= md5($_POST['confirmnewpassword']);
			$run=mysql_query("select password from users where Uname='$uname' ");
			$row=mysql_fetch_assoc($run);
			
			if($pass==$row['password'])
			{
				$qry="UPDATE users SET password='$newpass' WHERE Uname='$uname'";
				$result = mysql_query($qry);
				header('Location: index.php');
			}else{
				echo "<script type='text/javascript'> alert('Password entered is incorrect!')</script>";
			}
		}
		
	} else{
		echo "<script type='text/javascript'> alert('You are not logged in. Please login!')</script>";
		header('Location: login.php');
	}			

?>



<!-------------------------------------HTML PART------------------------------------>
<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">



	<script type="text/javascript">
	function validate() {
		if(document.SignUpForm.password.value==""){
			alert("Please enter a password!");
			return false;
		}
		if(document.SignUpForm.confirmpassword.value==""){
			alert("Please enter new password!");
			return false;
		}
		if(document.SignUpForm.confirmnewpassword.value==""){
			alert("Please confirm new password!");
			return false;
		}
		if(document.SignUpForm.confirmnewpassword.value!=document.SignUpForm.confirmpassword.value){
			alert("New password and Confirm new password do not match!");
			return false;
		}	
		return true;
	} 
	</script>	
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
		<h1> Change Password </h1>
		<div class="body">
			<div id="content">
				<div class="row">
					<div class="span6">
					<form name="SignUpForm" action="" method="post" onSubmit="return validate();">
						<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td align="right">
								<span id="5">Old Password </span>
							</td>
							<td>
								<input name="password" id="password" type="password" size="25">
							</td>
						</tr>
						<tr>
							<td align="right">
								<span id="6">New password </span>
							</td>
							<td>
								<input name="confirmpassword" id="confirmpassword" type="password" size="25">
							</td>
						</tr>
						<tr>
							<td align="right">
								<span id="8">Confirm New Password </span>
							</td>
							<td>
								<input name="confirmnewpassword" id="confirmnewpassword" type="password" size="25">
							</td>
						</tr>
						</table>
					
						<input type="submit" value="Submit";>
						<input type="reset" value="Reset">
					</form>
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