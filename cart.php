<!DOCTYPE html>

<html>
<?php
	$link = mysql_connect("127.0.0.1", "root", "") or die ("Couldn't connect to server");
	mysql_select_db("sen") or die ("Couldn't connect to database");
	
	SESSION_START();
	
	$newvar="";
	if(!(isset($_SESSION['uname']) && !empty($_SESSION['uname']))){
		header('Location: login.php');
	}
	else{
		$newvar= $_SESSION['uname'];
		$ingre=array();
		$quant=array();
		$unit=array();
		$quantity=array();
		$run=mysql_query("select Dish_id ,Iname ,quantity from (select Dish_id as did from (select Dname as k from shoppingcart where Uname='$newvar') as a join dish on a.k=dish.Dname) as new join madeof on new.did=madeof.Dish_id;");
		$i=0;

		while($row=mysql_fetch_assoc($run)){
			$dish=$row['Dish_id'];
			$run1=mysql_query("select Dname from dish where Dish_id='$dish' ");
			$row1=mysql_fetch_assoc($run1);
			$yehe=$row1['Dname'];

			$run2=mysql_query("select Quant from shoppingcart where Dname='$yehe' ");
			$row2=mysql_fetch_assoc($run2);
			$map=$row2['Quant'];
			
			$j=0;
			$r=0;
			
			while($j<$i){
				$r=0;
				if($row['Iname']==$ingre[$j]){
					$r=100;
					$quant[$j]=$quant[$j]+($row['quantity']*$map);
					break;
				}
				$j++;
			}
			if($r!=100){
				$ingre[$i]=$row['Iname'];
				$quant[$i]=$row['quantity']*$map;
				$i++;
			}
		}
		if(isset($_POST['emptycart'])){
			mysql_query("DELETE FROM shoppingcart WHERE 1");
		}
	}

?>

<head>
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
		<div><div>
			<h1> Your Shopping Cart </h1>
			<div class="body">
				<div id="content">					
					<div class="row">
						<div class="span6">
						<?php	
							$run=mysql_query("select Dname from shoppingcart where Uname='$newvar'");
								
							if( $rows = mysql_num_rows($run) > 0){
								echo '<h3 style="font-size:22px; margin-bottom:20px;"> Dishes on your cart.</h3>';
								echo'<ul>';
								while($row=mysql_fetch_assoc($run))
									echo "<li style='margin-left:40px;'><h5>".$map.'  '.$row['Dname']."</h5></li>";
								echo'<ul><hr>';
								
								echo '<h3 style="font-size:22px; margin-bottom:20px;"> Ingredients to be bought.</h3>';
								echo '<table padding="5px 15px 5px 5px" cellspacing="5px 25px 5px 5px">';
								$cnt=0;	
								while($cnt<$i){
									$run = mysql_query("select unit from ingredient where Iname='$ingre[$cnt]'");
									$row = mysql_fetch_assoc($run);
									$unit[$cnt]=$row['unit'];
									
									echo "<tr><td>".$ingre[$cnt]."</td><td><pre>    </pre></td>";	
									echo "<td>$quant[$cnt]  $unit[$cnt]</td></tr>";
									$cnt++;
								}
								echo '</table>';
								echo'<form method="post" style="margin-top:40px;"><input type="submit" value="Empty Cart" name="emptycart"></form>';
							}else {
								echo'<h5 style="color:red;margin-left:50px;margin-top:50px;"> No dishes added onto cart.</h5>';
							}
						
								
							?>

								
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