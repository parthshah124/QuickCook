<!DOCTYPE html>
<html>
<!--------------------php part------------------------------------------->
<?php
	$con=mysqli_connect("127.0.0.1","root","","sen");

	session_start();
	$newvar = "";
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
		$newvar= $_SESSION['uname'];

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['dishes']))
	{
		$arr=$_POST['dishes'];
		$n=count($arr);
		$str="'".$arr[0]."'".",";
		for($a=1;$a<$n-1;$a++)
		{
			$str=$str."'".$arr[$a]."'".",";
		}
		$str=$str."'".$arr[$n-1]."'";
		$result = mysqli_query($con,"SELECT Dname FROM dish WHERE Dname IN ($str) ORDER BY total_calorie");
		$row = mysqli_fetch_array($result);
		$p=$row['Dname'];
	}  
  
?>

<head>
	<meta charset="UTF-8">
	<title>Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
<!-- ..............................................................JAVA Script.......................................................... -->
	<script>
		function remove(x)
		{
			var y = document.getElementById("form1");
			var parent = x.parentNode;
			y.removeChild(parent);
		}
	
		function addMore() 
		{
			var y = document.getElementById("form1");
			var x = document.getElementById("button_section");
			var z = document.getElementById("first_child");
			var node = z.cloneNode(true);
			var node1 = document.createElement("input");
			node1.setAttribute("type", "button");
			node1.setAttribute("value", "Remove");
			node1.setAttribute("class", "remove_button");
			node1.setAttribute("onClick", "remove(this);");
			node.appendChild(node1);
			y.insertBefore(node, x);
			var x1 = x.previousSibling;
			var x2 = x1.previousSibling;
		}
	</script>
	
	
	<style>
		.textbox
		{
			width:400px;
			height: 25px;
			margin-right: 30px;
		}
		
		.segment
		{
			margin: 10px 5px 10px 10px;
		}
		
		#form1
		{
			margin: 20px 10px 20px 30px;
		}
		
		#heading h3
		{
			margin: 40px 30px 0px 40px;
			font-size: 30px;
		}
		
		.bottom_button
		{
			width: 100px;
			height: 30px;
			margin: 20px 15px 15px 15px;
		}
		
		.remove_button
		{
			width: 100px;
			height: 30px;
			margin: 20px 15px 15px 15px;
		}
	
	</style>


<!-- ..................................................Front-end HTML.............................................................. -->	
	
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
<!--	......................................................................................................................................... -->		
		<div class="body">
			<div id="content">
				<div>
					<div id="heading">
						<h3> What To EAT ? <h3>
					</div>
				
					<div id="form_pannel">
						<form id="form1" name="form1" method="post" >
							<div class="segment" id="first_child">
								<select name="dishes[]" class="textbox" default="None">
								<?php
									$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
									mysql_select_db("sen") or die ("Couldn't connect to database");
									$i=0;
									$query="SELECT DISTINCT Dname FROM dish";
									$query_run = mysql_query($query);
									$name=array();
									while($row=mysql_fetch_assoc($query_run))
									{
										$name[$i] = $row['Dname'];
										echo "<option value='$name[$i]'> ".strtoupper(substr($name[$i], 0, 1)).strtolower(substr($name[$i], 1))."</option>";
										$i++;
									}
								?>
								</select>
							</div>  
							<div class="segment">
								<select name="dishes[]" class="textbox" default="None">
								<?php
									$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
									mysql_select_db("sen") or die ("Couldn't connect to database");
									$i=0;
									$query="SELECT DISTINCT Dname FROM dish";
									$query_run = mysql_query($query);
									$name=array();
									while($row=mysql_fetch_assoc($query_run))
									{
										$name[$i] = $row['Dname'];
										echo "<option value='$name[$i]'> ".strtoupper(substr($name[$i], 0, 1)).strtolower(substr($name[$i], 1))."</option>";
										$i++;
									}
								?>
								</select>
									<input type="button" value="Remove" class="remove_button" onClick="remove(this);" />
							</div>  
							<div id="button_section">
								<input class="bottom_button" type="button" value="Add" onClick="addMore();" />
								<input class="bottom_button" type="button" value="Reset" onClick="reset();" />
								<input class="bottom_button" type="button" value="Submit" onClick="submit();" />
							</div>
							<div id="result">
							<?php
								if(isset($p))
								{
									echo "<hr/>";
									echo '<h2><a href="dish_page.php?name='.$p.'">'.$p.'</a></h2>';
								}
							?>
							</div>
								
						</form>
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