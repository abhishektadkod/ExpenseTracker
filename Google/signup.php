 <?php
include 'db_connect.php';

$name = $_POST["uname"];
$upass = $_POST["pass"];

$sql = "INSERT INTO user (Name, Password)
VALUES ('".$name."', '".$upass."')";

if ($connection->query($sql) === TRUE) {
    ?>
<script>
alert('Signed in successfully!');
document.location.href='index.php#  ';
</script>
<?php
}

else{?>
    <script>
    alert('Enter a strong password!');
 document.location.href='index.php#ev';
 </script>
<?php  }

$connection->close();
?> 