<?php
//require 'PHPMailerAutoload.php';
   // require 'PHPMailer-master/PHPMailerAutoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    // //use PHPMailer\PHPMailer\PHPMailer;
    // // use PHPMailer\PHPMailer\SMTP;
    // // use PHPMailer\PHPMailer\Exception;
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    // require_once 'PHPMailer/autoload.php';
    $mail= new PHPMailer(true);
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
    <script>
        function valid(){
            var name=document.getElementById('name').value;
            var mobileNo=document.getElementById('mobileNumber').value;
            var email=document.getElementById('email').value;
            var feedback=document.getElementById('feedback').value;
            var flag=0;
            if(name!="")
            {
              if(/^[a-zA-Z ]{2,20}$/.test(name)){
               flag=0;
              }
              else{
                alert("Please Enter Correct Name !!!");
                flag=1;
                document.getElementById('name').value="";
                return false;
              }
            }
            else{
              alert("Plese Enter Name !!!");
              flag=1;
              return false;
            }
        
            if(mobileNo.length>10 || mobileNo.length<10){
                alert("Provide valid Mobile Number !!!");
                flag=1;
                document.getElementById('mobileNumber').value="";
                return false;
            }
            else{
              if(/^[6-9]\d{9}$/.test(mobileNo)){
                flag=0;
              }
              else{
                alert("Provide valid Mobile Number !!!");
                flag=1;
                document.getElementById('mobileNumber').value="";
                return false;
              }
            }
        
            if(/^[A-Za-z0-9]+@[a-z0-9.-]+$/.test(email)){
                flag=0;
            }
            else{
                flag=1;
                alert("Enter valid Email Address !!!");
                document.getElementById('email').value="";
                document.getElementById('email').focus();
            }
            if(feedback==""){
              flag=1;
              alert("Please give Feedback !!!");
              document.getElementById('feedback').focus();
            }
            if(flag==0)
            {
                var form=document.getElementById('f1');
                form.submit();
                return true;
            }
        }
            </script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand navhead" href="#">
             Insta Cafe and Restaurant &nbsp;
          </a>
        </div>
  
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="menu.html">Menus</a></li>
            <li><a href="aboutus.html">AboutUs</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="datadis.php">View Order</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <br><br><br><br><br>
    <div class="container" id="d1">
        <div class="jumbotron" id="d3">
            <h1 style="text-align: center;" id="d4">Feedback Form</h1>
            <img src="animation.gif" width="80%" height="250px" style="margin-left:10%;display: none;" id="i1">
            <input type="button" id="b1" value="Back" onclick="location.href='feedback.php'" class="btn btn-danger btn-lg" style="display: none;margin-left:40%;margin-top:10px">
        </div>
    </div>
        <div class="container" id="d2">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="f1">
            <div class="form-group row">
              <label for="nm" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name="name" id="name" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="mobileNum" class="col-sm-2 col-form-label">Mobile Number</label>
              <div class="col-sm-10">
                <input type="number" required class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number">
              </div>
            </div>
            <div class="form-group row">
              
                <label for="em" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" required class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="ic" class="col-sm-2 col-form-label">Feedback</label>
                <div class="col-sm-10">
                    <textarea class=" form-control" rows="4" id="feedback" name="feedback" required></textarea>
                </div>
            </div>
            <div class="form-group row">  
              <div class="col-sm-12">
                  <input type="button" onclick="return valid()" value="Submit" class="form-control" style="background-color:mediumseagreen;color:black;font-weight: bolder;">
              </div>
              
          </div>
        </form>
        </div>

        <?php
        $flag=0;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $name=$_POST['name'];
            $mobileno=$_POST['mobileNumber'];
            $email=$_POST['email'];
            $feedback=$_POST['feedback'];
         
            $serverName="localhost";
            $user="root";
            $pass="";
            $db_name="insta";
          
              $con=mysqli_connect($serverName,$user,$pass,$db_name);
              
              if(!$con)
                  die("Connection failed".mysqli_connect_error());

            $sql="INSERT INTO `feedback`(`name`, `mobileno`, `email`, `feedback`) VALUES ('$name','$mobileno','$email','$feedback')";    
              

            if(mysqli_query($con,$sql)){
            $flag=1;
            $header="From:pranavsutar4747@gmail.com\r\n";
            $subject="Insta Restaurant";
            $txt="Dear $name.\r\nWe appreciate the time you commited to providing us with detailed and constructive feedback.\r\nWe appreciate you for sending us your feedback.\r\nThank You !!!\r\nKind Regards,\r\nInsta Restaurant";
            
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username='pranavsutar4747@gmail.com';
            $mail->Password='nawxhssrcoorggnq';
            $mail->SMTPSecure="tls";
            $mail->Port=587;
            $mail->setFrom('pranavsutar4747@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body=$txt;
            if($mail->send()){
              echo "<script> alert('Email sent successfully') </script>";
            }
            else{
              echo $mail->ErrorInfo;
            }
            }
            else{
                $flag=0;
            }
          }
          if($flag==1){
              ?>
                <script>
                    var x=document.getElementById('d2');
                    x.style.display="none";
                    var y=document.getElementById('d4');
                    var z=document.getElementById('i1');
                    y.innerHTML="Thank you for your Feedback !!!";
                    z.style.display="block";
                    var m=document.getElementById('b1');
                    m.style.display="block";
                </script>
              <?php
              $name="";
              $mobileno="";
              $feedback="";
              $email="";
          }
        ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>