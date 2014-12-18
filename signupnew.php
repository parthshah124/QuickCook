<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
   
<!-------------------------------------------- PHP part ---------------------------------------------------------->
<?php
    $link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
    mysql_select_db("sen") or die ("Couldn't connect to database");
        
    $newvar="";
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
		session_distroy();
		echo "<script type='text/javascript'>alert('Alredy logged in user has been logged out!');</script>";
	}
	
    if(isset($_POST['username']) && !empty($_POST['username'])){
        $fullname=$_POST['fname']." ".$_POST['lname'];
        $dmon=$_POST['month'];
        $dyear=$_POST['year'];
        $ddat=$_POST['day'];
        $sex=$_POST['sex'];
        $user = $_POST['username'];
        $pass= md5($_POST['password']);
        $email=$_POST['emailId'];
        $SecuQ=$_POST['question'];
        $SecuA=$_POST['answer'];
		$date=$dyear."-".$dmon."-".$ddat;
		
		/* Check if username exists */
        $qry="SELECT * FROM users where Uname='$user'";
        $qry2 = "SELECT * FROM user WHERE email_id='$email'";
		$exe = mysql_query($qry);
		$exe2 = mysql_query($qry2);
        $rows = mysql_num_rows($exe) + mysql_num_rows($exe2);
         
        
        /*if username does not exists*/
        if($rows==0){    
            $query="INSERT INTO users VALUES ('$user' , '$fullname' , '$email' , '$sex' , '$date' , '$pass' , '$SecuQ' , '$SecuA' , 0)";
				if(mysql_query($query)){
					SESSION_START();
					$_SESSION['uname']=$user;
					header('Location: user_profile.php');
				}
				else{
					echo "<script type='text/javascript'> alert('Could not sign you up, please try again.')</script>";
				}
			}
			else{
				if(mysql_num_rows($exe))
					echo "<script type='text/javascript'> alert('Username already exists.')</script>";
				else if(mysql_num_rows($exe2))
					echo "<script type='text/javascript'> alert('Email id already exists.')</script>";
			}
	}        
?>
<!-------------------------------------------- PHP part ---------------------------------------------------------->

<script type="text/javascript">    
function validate() {
	if(document.SignUpForm.fname.value==""){
		alert("Please enter your first name!");
		return false;
	}
	if(document.SignUpForm.lname.value==""){
		alert("Please enter your lname!");
		return false;
	}
	if(document.SignUpForm.username.value==""){
		alert("Please enter your username !");
		return false;
	}
	if(document.SignUpForm.emailId.value==""){
		alert("Please enter your email !");
		return false;
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
		return false;
	}
	if(document.SignUpForm.confirmpassword.value==""){
		alert("Please confirm your password!");
		return false;
	}
	if(document.SignUpForm.confirmpassword.value!=document.SignUpForm.password.value){
		alert("Passwords donot match!");
		return false;
	}
	if(document.SignUpForm.answer.value==""){
		alert("Please answer the security question!");
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
	<h1> Sign Up </h1>
		<div class="body">
			<div id="content">        
                <div class="row">
					<div class="span6">
					<form name="SignUpForm" action="" method="post" onSubmit="return validate();">
						<table border="0" cellpadding="4" cellspacing="0">
							<tr>
								<td align="right">
									<span id="1">First Name </span>
								</td>
								<td>
								<input name="fname" id="fname" type="text" size="25" maxlength="20">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="2">Last Name </span>
								</td>
								<td>
									<input name="lname" id="lname" type="text" size="25" maxlength="20">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="3">User Name </span>
								</td>
								<td>
									<input name="username" id="username" type="text" size="25" maxlength="30">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="4">Email Id </span>
								</td>
								<td>
									<input name="emailId" id="emailId"  size="50" maxlength="30" style="width:170px;">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="5">Password </span>
								</td>
								<td>
									<input name="password" id="password" type="password" size="25">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="6">Confirm password </span>
								</td>
								<td>
									<input name="confirmpassword" id="confirmpassword" type="password" size="25">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="7">Security Question</span>
								</td>
								<td>
									<select autofocus size="1" name="question">
										<option value="What is the maiden name of your mother?">What is the maiden name of your mother? </option>
										<option value="What was the name of your first pet?">What was the name of your first pet? </option>
										<option value="In which city were you born?">In which city were you born?</option>
										<option value="What is your favourite food item?">What is your favourite food item?</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="8">Answer </span>
								</td>
								<td>
									<input name="answer" id="answer" type="text" size="25" maxlength="20">
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="9">Date of Birth </span>
								</td>
								<td> 
									<select name="month">
										<option value="01">January
										<option value="02">February
										<option value="03">March
										<option value="04">April
										<option value="05">May
										<option value="06">June
										<option value="07">July
										<option value="08">August
										<option value="09">September
										<option value="10">October
										<option value="11">November												
										<option value="12">December
									</select>
											
									<select name="day">
										<?php
											for($i = 1; $i<=31; $i++)
											echo "<option value='$i'> $i</option>";
										?>
									</select>
											
									<select name="year">
										<?php
											for($i = 1970; $i<=2010; $i++)
											echo "<option value='$i'> $i</option>";
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">
									<span id="10">Sex </span>
								</td>
								<td>
									<select name="sex">
										<option value="female">Female
										<option value="male">Male
									</select>
								</td>
							</tr>
						</table>
						<input type="submit" value="Submit">
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
			<p>&copy; Developed by Parth Shah</p>
		</div>
	</div>
</body>
</html>