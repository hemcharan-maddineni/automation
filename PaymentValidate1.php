<html>
    <head>
      <title>Payment validation</title>
    </head>
    <body>
      <?php
          session_start();
          $database="PAS";
          $con=mysqli_connect("localhost","root","",$database);
          if(!$con)
          {
              die('Could not connect' . mysql_error());
          }
          $name=$_POST['NameonCard'];
          $number=$_POST['CardNumber'];
          $month=$_POST['month'];
          $year=$_POST['year'];
          $cvv=$_POST['cvv'];
          echo "The details from the form are";
          echo "name is $name";
          echo "number is $number";
          echo "month is $month";
          echo "year is $year";
          echo "cvv is $cvv";
          $query="SELECT * FROM bank WHERE name='".$name."';";
          $res=mysqli_query($con,$query);
          $row=mysqli_fetch_assoc($res);
          $name1=$row['name'];
          $number1=$row['number'];
          $month1=$row['month'];
          $year1=$row['year'];
          $cvv1=$row['cvv'];
          $balance=$row['balance'];
          echo "the details of the bank are";
          echo "name is $name1";
          echo "number is $number1";
          echo "month is $month1";
          echo "year is $year1";
          echo "cvv is $cvv1";
          echo "balance is $balance";
          if($name<>$name1 || $number<>$number1 || $cvv<>$cvv1 || $month<>$month1 || $year<>$year1)
          {
            echo "invalid details";
            echo "<a href=PaymentFirst.html>Click here to go to payment page</a>";
          }
          else
          {
            if($balance>=592)
              echo "<a href=PaymentFinal.php>Click here to finalize your payment</a>";
            else
            {
              echo "low balance";
              echo "<a href=Payment.html>Click here to go to payment page</a>";
            }
          
          }
    
    ?>        
  </body>    
</html>
