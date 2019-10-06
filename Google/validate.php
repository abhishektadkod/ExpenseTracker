<?php
	include 'db_connect.php';
	session_start();
	$name = $_POST["uname"];
	$upass = $_POST["pass"];
					
					//for	checking	the	database	from	database.	  
					$sql = 'SELECT * FROM user WHERE Name ="'.$name.'" 
							AND Password ="'.$upass.'"';
						//echo $sql;
					$result = mysqli_query($connection,$sql);

					$numrows = mysqli_num_rows($result);
					if($numrows > 0)
					   {
						while($row = $result->fetch_assoc()) {
							$new=$row['Id'];
							$name=$row['Name'];
						}
						$_SESSION['login_user']=$new;
						$_SESSION['c1']=0;
						$_SESSION['nav']=$name;
						
							?>
						<script>
						//alert('success	Login!!');
					document.location.href='main.php';
						</script>
					<?php
					   }
					else
						{?>
							<script>
							alert('Enter the correct username or password!');
						 document.location.href='index.php';
						 </script>
					 <?php  }

	?>
