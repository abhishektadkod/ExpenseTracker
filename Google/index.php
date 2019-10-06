<!DOCTYPE html>
<html lang="en">

<head>
  <title>Expense Tracker</title>
  <link rel="icon" href="images/icon.png" type="image/icon type">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Turret+Road&display=swap" rel="stylesheet"> 
  <script>
      $(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('#startchange');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar").css('background-color', '#f0f0f0');
       } else {
          $('.navbar').css('background-color', 'transparent');
            }
        });
            }
        });
  </script>
  
</head>

<body>
      
 <nav class="navbar navbar-expand-sm sticky-top">
        <a class="navbar-brand" href="#"><span class="display-3 text-light"><i class='fab fa-gg'></i>EXPENSE TRACKER</span></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link btnlogin btn-primary" href="#" onclick="document.getElementById('id01').style.display='block'">LOGIN</a>
          </li>
        </ul>
</nav>

<div class="container geta text-center" >
<a class="btn" href="#ev" >
        <span class="gets">GET STARTED</span><br><br><br>

        <span class="display-4 text-light" style="font-size:40px;font-weight:lighter;">
        SIMPLE WAY TO MANAGE PERSONAL FINANCES .<br>
        BECAUSE MONEY MATTERS!
      </span>
</a>
</div>

<div id="id01" class="modal">
              
      <form class="modal-content animate" method="post" action="validate.php">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
          
          <div class="container">
          <div style="font-size:64px; font-family:Courier New;">LOGIN</div></i>
            <label ><b>Username</b></label>
            <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>

            <label ><b>Password</b></label>
            <input class="form-control"  type="password" placeholder="Enter Password" name="pass" required>
              <br>
            <button class="btn text-light bg-dark"  type="submit">Login</button>
            <button class="btn text-success bg-light"  onclick="location.href='#ev';document.getElementById('id01').style.display='none';">New User? Sign up here</button><br><br>
          </div>

          
        </form>
</div>

<div class="container" id="startchange">

    
    <div class="" style="height:240px;"></div>
    
  
    <div id="ev" class="jumbotron" style="">
    <div class="" data-toggle="collapse" data-target="#demo">
      
        <div class='btn btn-primary' style='font-size:30px;'>CLICK HERE TO SIGN UP WITH US!</div>
      
    </div><br><br><br>
  
        
        <form id="demo"  class="shadow p-4 mb-4 bg-white collapse" action="signup.php" method="post">
        <div  class="display-4 text-center ">SIGNUP</div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" >Name</span>
            </div>
            <input type="text" name="uname"class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Password</span>
            </div>
            <input type="password" name="pass" placeholder="" class="form-control">
          </div>

          

          <button class="btn text-light bg-dark"  type="submit">Submit</button><br><br>

          </form>
    </div>

    
        <br><br>
    <div class='container'>
    <div class="display-4">Expense Tracker<br>
      <span style='font-size:30px;'>Expense Tracker helps you get just about everything managed
      . A smart, easy-to-use app that allows you to track and categorize your in-and-out money, create 
      budgets that you can actually stick to. It works seamlessly across devices and platforms, available
       on phone, tablet, PC and Web.
      </span>
      </div>
    </div><br><br><br> 

  
</div>
<span class="btn btn-primary" onclick="location.href='#'" style="margin-left:100px;font-size:20px;">CLICK TO TOP        <i class='fas fa-angle-double-up' style='font-size:24px;color:#2158b0'></i></span>

<footer>
    <center>Made with <span style="color:red" >&hearts;</span> by Abhishek Tadkod</center>
</footer>


</body>
</html>
