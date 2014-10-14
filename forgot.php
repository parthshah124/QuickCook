<!DOCTYPE html>
<html>

<?php
	$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
	mysql_select_db("sen") or die ("Couldn't connect to database");

	if($link==true)
	$con=mysqli_connect("127.0.0.1","root","","sen");		//Check connection

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(isset($_POST['username']))
	{
		if((isset($_POST['username']) && isset($_POST['question']) && isset($_POST['Answer']) && isset($_POST['confirmnewpassword'])&&isset($_POST['confirmpassword'])  && $_POST['username']!= "" && $_POST['question'] != "" && $_POST['Answer'] != "" && $_POST['confirmnewpassword'] != "" &&$_POST['confirmpassword']!=""))
		{
			$uname=$_POST['username'];
			$question=$_POST['question'];
			$answer=$_POST['Answer'];
			$newpass=$_POST['confirmnewpassword'];
			$newconpass=$_POST['confirmpassword'];
			$run=mysql_query("select security_que, security_ans from users where Uname='$uname' ");
			$row=mysql_fetch_assoc($run);
			
			if(mysql_num_rows(mysql_query("select * from users where Uname='$uname'"))){
				if($question==$row['security_que'] && $answer==$row['security_ans'] && $newpass==$newconpass){
					$newpass = md5($newpass);
					$qry="UPDATE users SET password='$newpass' WHERE Uname='$uname'";
					$result = mysqli_query($con, $qry);
					session_start();
					$_SESSION['uname'] = $uname;
					header('Location: index.php');
				}else{
					echo "<script type='text/javascript'> alert('Incorrect security question and answer combination!')</script>";
				}
			}else{
				echo "<script type='text/javascript'> alert('Username does no exixt!')</script>";
			}
		}else{
				echo "<script type='text/javascript'> alert('Please enter all informations!')</script>";
		}
	}
?>

<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
	
		function validate() 
		{
			if(document.SignUpForm.username.value=="")
			{
				alert("Please enter your username !");
				return false;
			}
			
			if(document.SignUpForm.Answer.value=="")
			{
				alert("Please answer the security question!");
				return false;
			}
	
			if(document.SignUpForm.confirmpassword.value=="")
			{
				alert("Please enter new password!");
				return false;
			}
			
			if(document.SignUpForm.confirmnewpassword.value=="")
			{
				alert("Please confirm your new password!");
				return false;
			}
			
			if(document.SignUpForm.confirmnewpassword.value!=document.SignUpForm.confirmpassword.value)
			{
				alert("Passwords do not match!");
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
		<div>
			<div>
				<h1> Forgot Password </h1>
				<div class="body">
					<div id="content">
						<div class="row">
							<div class="span6">
								<form name="SignUpForm" action="" method="post" onSubmit="return validate();">
									<br><br><br>
									<table border="0" cellpadding="4" cellspacing="0">
									<tr><td align="right">
									<span id="2">Username </span></td><td><input name="username" id="username" type="text" size="50">
									</td></tr><tr><td align="right">
									<span id="3">Security Question </span></td><td>
									<select name="question">
										<option value="What is the maiden name of your mother?">What is the maiden name of your mother?</option>
										<option value="What was the name of your first pet?">What was the name of your first pet?</option>
										<option value="In which city were you born?">In which city were you born?</option>
										<option value="What is your favourite food item?">What is your favourite food item?</option>
									</select>
									</td></tr><tr><td align="right">
									<span id="5">Answer </span></td><td><input name="Answer" id="Answer" type="text" size="50">
									</td></tr><tr><td align="right">
									<span id="6">New password </span></td><td><input name="confirmpassword" id="confirmpassword" type="password" size="25">
									</td></tr><tr><td align="right">
									<span id="8">Confirm New Password </span></td><td><input name="confirmnewpassword" id="confirmnewpassword" type="password" size="25">
									</td></tr><tr><td align="right">
									</table>
									<br><br><br><br>
									<input type="submit" value="Submit";>
									<input type="reset" value="Reset">
								</form>
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