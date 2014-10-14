<!DOCTYPE html>

<html>

<!-- -----------------------------------------------------HTML HEAD ------------------------------------------------------------------------------ -->
<head>
	<?php
		session_start();
		if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
			echo '<script> alert("User is already logged in!"); </script>';
			header('Location: index.php');
			
		}
	?>
	
	<meta charset="UTF-8">
	<title>Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script type="text/javascript">
		function validate() {
			if(document.SignUpForm.fname.value==""){
				alert("Please enter your first name!");
			}

			if(document.SignUpForm.lname.value==""){
				alert("Please enter your lname!");
			}

			if(document.SignUpForm.username.value==""){
				alert("Please enter your username !");
			 }

			if(document.SignUpForm.emailId.value==""){
				alert("Please enter your email !");	
			}

			if(document.SignUpForm.emailId.value!="") {
				var x=document.SignUpForm.emailId.value;
				var atpos=x.indexOf("@");
				var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
					alert("Please enter a valid email !");
					return false;
				}
			}
			
			if(document.SignUpForm.password.value==""){
				alert("Please enter a password!");
			}

			if(document.SignUpForm.confirmpassword.value==""){
				alert("Please confirm your password!");
			}

			if(document.SignUpForm.answer.value==""){
				alert("Please answer the security question!");
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
		<h1> Log In </h1>
		<div class="body">
			<div id="content">
				<div class="row">
					<div class="span6">
						<form name="SignUpForm"  method="post" >
							<table border="0" cellpadding="4" cellspacing="0">
								<tr style="top-margin: 15px;">
								<td align="right">
									<span id="1">User Name </span>
								</td>
								<td>
									<input name="username" id="username" type="text" size="25" maxlength="10">
								</td>
								</tr>
								
								
								<tr style="top-margin: 15px;">
								<td align="right">
									<span id="2">Password </span>
								</td>
								<td>
									<input name="password" id="password" type="password" size="25">
								</td>
								</tr>
							</table>
							<br><br>
							<input type="submit" value="Submit" name="submit" >
							<input type="reset" value="Reset">
							
							
							<h2 style="font-size:13px;margin-left:40px; margin-top:15px; color:#3A2F0B;">
								<?php echo "<a style='color:#3A2F0B;' href='forgot.php'>" ?> Forgot Password? </a> 
							</h2>
							
							<br><br><br><br><br><br><br><br><br><br><br><br><br>
						</form>
						
						<!-------------------------------------------- PHP part ---------------------------------------------------------->
						<?php
							$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
							mysql_select_db("sen") or die ("Couldn't connect to database");

							if(isset($_POST['submit'])){
								if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username']!= "" && $_POST['password'] != ""){
									$uname=$_POST['username'];
									$pass=$_POST['password'];
									$encry=md5($pass);
									
									$run=mysql_query("select * from users where Uname='$uname' ");
									$n=mysql_num_rows($run);
									
									if($n==0)
										echo "<script>alert('Username not found. Please signup first!');</script>";
									else{
										$run=mysql_query("select password from users where Uname='$uname' ");
										$row=mysql_fetch_assoc($run);
										
										if($encry==($row['password'])){
											session_start(); 
											$_SESSION['uname']=$uname;
											header('Location: user_profile.php');
										}else{
											echo "<script>alert('You have entered a wrong password!');</script>";
										}
									}
								}

							}
						?>
						<!---------------------------------------------------------------------------------------------------------->
						
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
				<h2 style="font-size:18px"><a href="signupnew.php">Sign Up</a></h2>';
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