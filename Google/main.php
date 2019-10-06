
<?php
session_start();
include 'db_connect.php';
if(!isset($_SESSION['login_user']))
  header("Location: index.php");//redirect to login page to secure the welcome page without login access.

?>

 <?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<html>
<head>
  <title>Expense Tracker</title>
  <link rel="icon" href="images/icon.png" type="image/icon type">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/mainstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 
  
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark sticky-top">
          <a class="navbar-brand" href="#"><span class="display-4 text-light"><i class='fab fa-gg'></i>EXPENSE TRACKER</span></a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <?php
              echo "<a class='btn btn-primary' href='logout.php'>LOGOUT</a>";
            ?>
            </li>
          </ul>
  </nav>



  <div class="" style="height:100px;">
  <?php
           
                          $sql = "select sum(price), DATE_FORMAT(date, '%Y-%m-%d') as D
                          from exp where id=".$_SESSION['login_user']."
                          group by DATE_FORMAT(date, '2019-%m') order by DATE_FORMAT(date, '2019-%m') limit 1";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo "<div class='type display-4'>Expense incurred for the current month:<span style='color:blue;'>" . $row['sum(price)']."  &#8377;</span></div>";
                              }
                          } else {
                              echo "<div class='display-4'>No expense this month!</div>";
                              echo "<div class='display-4'>".$_SESSION['nav']."</div>";
                          }
                          
                          ?>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="shadow p-4 mb-4 bg-dark text-light">
        <h1 class="text-success">Latest expenses</h1><br>
          <?php
           
            $sql = "SELECT * FROM exp where id=".$_SESSION['login_user']." ORDER by date desc LIMIT 4;";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='container' style='font-size:20px;font-family: 'Roboto', sans-serif;'>
                            <div class='hovit'>
                            Description: " . $row["description"]. " <br> 
                            Date: " . $row["date"]. "<br>
                            Price: " . $row["price"]. "<br><br>
                            </div>
                          </div><br>";
                }
            } else {
                echo "0 results";
            }
           
            ?>
        </div>
      </div>

    <div class="col-md-6">
            
        <form class="shadow p-4 mb-4 bg-white" action="expense_enter.php" method="post">
        <span class="display-4">Expense Details</span><br><br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" >Date</span>
          </div>
          <input type="date" class="form-control" name="date" value="<?php echo $today; ?>"  class="form-control">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Description</span>
          </div>
          <input type="text" class="form-control" name="des"placeholder="Expense information" class="form-control">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Price</span>
          </div>
          <input type="text" class="form-control" name="price" placeholder="in &#8377;" class="form-control">
        </div>

        <button class="btn text-light bg-dark"  type="submit">Submit</button><br><br>

        </form>
        <?php
          if($_SESSION['c1']==1)
            echo "<div id='mydiv' class='text-success'>Successfully submitted!</div>";
        ?>
      </div>
    </div>
  </div>

  <div class="jumbotron">
    <div class="row">
      
      <div class="col-md-6">
            <div class="shadow p-4 mb-4 bg-white">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home">Monthly Expenditure</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1">Weekly Expenditure</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                      <h3>Monthly expense</h3>
                      <p>
                      <?php
           
                          $sql = "select sum(price), DATE_FORMAT(date, '%Y-%m-%d') as D
                          from exp where id=".$_SESSION['login_user']."
                          group by DATE_FORMAT(date, now()) order by date desc";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo "<div class='display-4'>In this year: <span style='color:blue;'>" . $row["sum(price)"]."  &#8377;</span></div>";
                              }
                          } else {
                              
                          }
                          
                          ?>
                      </p>

                      <?php
           
                          $sql = "select sum(price), DATE_FORMAT(date, '%Y-%m-%d') as D
                          from exp where id=".$_SESSION['login_user']."
                          group by DATE_FORMAT(date, '2019-%m') order by date desc";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
                            $i=0;
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo "<div class='bg-light text-dark' style='font-size:30px;'>
                                  <span style='color:#276f87'>Month:</span> ".date("F , Y", strtotime($row["D"]))."<br>
                                  <span style='color:#a39367;'>Price:</span> ". $row['sum(price)']."&#8377;
                                  </div><br><br>";

                                  $b1[$i]=date("F , Y", strtotime($row["D"]));
                                  $b2[$i]=$row['sum(price)'];
                                  $i++;
                              }
                          } else {
                              echo "No expenses available!";
                          }
                          

                         ?>

                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Weekly expense</h3>
                      <p>
                      <?php
           
                          $sql = "select sum(price), DATE_FORMAT(date, '%Y-%m-%d') as D
                          from exp where id=".$_SESSION['login_user']."
                          group by DATE_FORMAT(date, '2019-%m') order by DATE_FORMAT(date, '2019-%m') limit 1";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo "<div class='display-4'>In this month: <span style='color:blue;'>" . $b2[0]."  &#8377;</span></div>";
                              }
                          } else {
                              
                          }
                          
                          ?>
                      </p>

                      <?php
           
                          $sql = "select sum(price), DATE_FORMAT(date, '%U') as D
                          from exp where id=".$_SESSION['login_user']."
                          group by DATE_FORMAT(date, '2019-%U-%m') order by DATE_FORMAT(date, '2019-%m') asc";
                          $result = $connection->query($sql);

                          if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                  echo "<div class='bg-light text-dark' style='font-size:30px;'>
                                  <span style='color:#276f87'>Week:</span> ".$row['D']."<br>
                                  <span style='color:#a39367;'>Price:</span> ". $row['sum(price)']."&#8377;
                                  </div><br><br>";
                              }
                          } else {
                              echo "No expenses available!";
                          }
                          
                          ?>
                      </div>

                  </div>
          </div>
      </div>

      <div class="col-md-6">
      
      <p><a href="uitest1.php" target="iframe_a">View this graph!</a></p>
      <iframe src="uitest1.php" style="border:none;height:700px;width:700px;"></iframe>
      
      </div>
    </div>
  </div>

  <script>
    setTimeout(function() {
    $('#mydiv').fadeOut('fast');
    }, 1000); // <-- time in milliseconds
</script>

<script src="scripts/typed.js"></script>

    <script type="text/javascript">
        var typed = new Typed(".type" /* Write the class name for which it has to be applied */ , {
            // Waits 1000ms after typing "First"
            strings: ["Expense incurred for the current month:"],
            typeSpeed: 50,
            backSpeed: 100,
            loop: true
        });

        
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

</body>
</html>