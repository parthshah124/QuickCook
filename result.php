<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Quick Cook</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!---------PHP PART------------>
	<?php
		$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
		mysql_select_db("sen") or die ("Couldn't connect to database");
		SESSION_START(); 
		$newvar="";
		
		if(isset($_SESSION['uname']) && !empty($_SESSION['uname']))
			$newvar= $_SESSION['uname'];

		$query = "SELECT COUNT(*) , Dish_id FROM `madeof` WHERE essential =  'Y' GROUP BY Dish_id";
		
		if($query_run = mysql_query($query)){
			$i=0;
			$j=0;
			$k=0;
			$l=0;
			$number = array();
			$dish_id = array();
			$number1 = array();
			$dish_id1 = array();
			$arr =array();
			$final_dish=array();
			
			while($row=mysql_fetch_assoc($query_run)){
				$number[$i] = $row['COUNT(*)'];
				$dish_id[$i] = $row['Dish_id'];
				$i++;
			}
			
			if(isset($_POST['ingredient'])){
				$arr=$_POST['ingredient'];
				$n=count($arr);
				$str="'".$arr[0]."'".",";
				for($a=1;$a<$n-1;$a++){
					$str=$str."'".$arr[$a]."'".",";
				}
				$str=$str."'".$arr[$n-1]."'";
				
				$query1="SELECT COUNT(*), Dish_id from madeof where essential='Y' and Iname IN($str) GROUP BY Dish_id";
			
				if($query_run1 = mysql_query($query1)){
					while($row1=mysql_fetch_assoc($query_run1)){
						$number1[$j] = $row1['COUNT(*)'];
						$dish_id1[$j] = $row1['Dish_id'];
						$j++;
					}		
				}else{
					echo "hi han";
				}
				$l=0;
				for ($i=0;$i<$j;$i++){
					$k=$dish_id1[$i];
					$val1=$number1[$i];
					$val2=$number[$k-1];
					if($val1==$val2){		
						if($query_run=mysql_query("SELECT Dname FROM dish WHERE Dish_id =$k")){
						$row=mysql_fetch_assoc($query_run);
						$final_dish[$l]=$row['Dname'];
						$l++;
						}	
					}
				}
			}
		}
		else
		{
			echo "<script type='text/javascript'> alert('Query did not run!')</script>";
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
						<h3> Result </h3>	
					</div>
					<ul>
						<?php
							while($l--){
								$a= $final_dish[$l];
								echo "<li><a href='dish_page.php?name=".$a."'><img src='images/".$a.".jpg' alt='Image'></a><div><h3>";
										echo strtoupper(substr($final_dish[$l], 0, 1)).strtolower(substr($final_dish[$l], 1));
										echo "<p> rating: ";
										
										$rate = mysql_query("SELECT avg_rating FROM dish WHERE Dname ='$a'");
										$row = mysql_fetch_assoc($rate);
										echo $row['avg_rating'];
										echo "</p>";
										echo "</h3></div></li>";
										}
									?>
							
							
						</ul>
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