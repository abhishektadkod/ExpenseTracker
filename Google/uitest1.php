<?php
  include 'db_connect.php';
  session_start();
?>

<?php
           
           $sql = "select sum(price), DATE_FORMAT(date, '%Y-%m-%d') as D
           from exp where id=".$_SESSION['login_user']."
           group by DATE_FORMAT(date, '2019-%m') order by  DATE_FORMAT(date, '2019-%m')";
           $result = $connection->query($sql);
            $b1=array(0);
           if ($result->num_rows > 0) {
             $i=0;
               // output data of each row
               while($row = $result->fetch_assoc()) {

                   $b1[$i]=date("m", strtotime($row["D"]));
                   $b2[$i]=$row['sum(price)'];
                   $i++;
                   
               }
           } else {
               echo "<div class='display-4'>No expenses available!</div>";
           }
              $arrlength = count($b1);
               $b1[$arrlength]=0;
               
               
           ?>


<?php 
  $i=0;
  for($x = 0; $x <12; $x++) {
    $purchased[$x]=0;
    
    if($b1[$i]-1==$x)
        {
          $purchased[$x]=$b2[$i];
          $i++;
        }

   
      }

// Data to draw graph for purchased products 
$dataPoints = array( 
    array("label"=> "Jan", "y"=> $purchased[0]), 
    array("label"=> "Feb", "y"=> $purchased[1]), 
    array("label"=> "March", "y"=> $purchased[2]), 
    array("label"=> "April", "y"=> $purchased[3]), 
    array("label"=> "May", "y"=> $purchased[4]), 
    array("label"=> "Jun", "y"=> $purchased[5]), 
    array("label"=> "July", "y"=> $purchased[6]), 
    array("label"=> "Aug", "y"=> $purchased[7]), 
    array("label"=> "Sep", "y"=> $purchased[8]), 
    array("label"=> "Oct", "y"=> $purchased[9]), 
    array("label"=> "Nov", "y"=> $purchased[10]), 
    array("label"=> "Dec", "y"=> $purchased[11]) 
); 
   
?> 
   
<!DOCTYPE HTML> 
<html> 
<head>   
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> 
    </script> 
    <script> 
        window.onload = function () { 
           
            var chart = new CanvasJS.Chart("chartContainer", { 
                animationEnabled: true, 
                title:{ 
                    text: "Monthly Expense(Current Year)"
                },     
                axisY: { 
                    title: "Expense", 
                    titleFontColor: "#4F81BC", 
                    lineColor: "#4F81BC", 
                    labelFontColor: "#4F81BC", 
                    tickColor: "#4F81BC"
                }, 
                   
                toolTip: { 
                    shared: true 
                }, 
                legend: { 
                    cursor:"pointer", 
                    itemclick: toggleDataSeries 
                }, 
                data: [{ 
                    type: "column", 
                    name: "Expense", 
                    legendText: "Expense in Rupees", 
                    showInLegend: true,  
                    dataPoints:<?php echo json_encode($dataPoints, 
                            JSON_NUMERIC_CHECK); ?> 
                }] 
            }); 
            chart.render(); 
               
            function toggleDataSeries(e) { 
                if (typeof(e.dataSeries.visible) === "undefined"
                            || e.dataSeries.visible) { 
                    e.dataSeries.visible = false; 
                } 
                else { 
                    e.dataSeries.visible = true; 
                } 
                chart.render(); 
            } 
           
        } 
    </script> 
</head> 
  
<body> 
    <div id="chartContainer" style="height: 300px; width: 100%;"></div> 
</body> 
</html> 
