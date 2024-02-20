<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
            .table tr:hover{
                background-color: turquoise !important;
            }
    </style>
    <script>
        var flag = 1;
        var count = 0;
        function login(){
            var un=document.getElementById('un').value;
            var pw=document.getElementById('pw').value;
            var check=document.getElementById('check');
            var flag=0;
            if(un=="" || pw=="")
            {
                flag=1;
                alert("Provide Details !!!");
                return false;
            }
            else{
                if(un=="admin" && pw=="admin" && check.checked==true){
                    flag=0;
                    document.getElementById('id01').style.display="none";
                    document.getElementById('title').innerHTML="View Order";
                    document.getElementById('book').style.display="block";
                    
                    return true;
                }
                else{
                    if(check.checked!=true)
                    {
                        alert("Select the checkbox !!!");
                        flag=1;
                        return false;
                    }
                        
                    else{
                        flag=1;
                        alert("Invalid username or password !!!");
                        document.getElementById('un').value="";
                        document.getElementById('pw').value="";
                        document.getElementById('check').checked=false;
                        return false;    
                    }
                    
                }
            }
            if(flag==0){
                document.getElementById('data').style.display="block";
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
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li>
                    <button class="btn b btn-success navbar-btn" onclick="document.getElementById('id01').style.display='block'" style="margin-block-end: 5% !important;">Admin</button>
                </li>
            </ul>
            </div>

        </div>
    </nav>

    <div id="id01" class="modal">
  
        <form class="modal-content animate" action="#" method="post">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <div class="container">
            <div class="form-group row" id="name">
                <label for="nm" class="col-sm-1 col-form-label" id="nm">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="un" id="un">
                </div>
            </div>
            <div class="form-group row" id="name">
                <label for="nm" class="col-sm-1 col-form-label" id="nm">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="pw" id="pw">
                </div>
            </div>
            <label id="l">
                <input type="checkbox" name="remember" id="check"> Remember me
              </label>
              <div class="form-group row">
                <div class="col-sm-3">
                    <button type="button" onclick="return login()" class="form-control"
                        style="background-color:mediumseagreen;color:black;font-weight: bolder; margin-bottom: 3%;">Login</button>
                </div>
                <div class="col-sm-3">
                    <button type="reset" class="form-control"
                        style="background-color: tomato;color:black;font-weight: bolder;">Cancel</button>
                </div>
            </div>
            </div>
        </form>
      </div>



    <br><br><br><br>
    <div class="container">
        <div class="jumbotron">
            <h1 style="text-align: center;" id="title">Please Login</h1>
        </div>
    </div>
    
    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="book" style="display:none;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="book" method="post">
        <button type="submit" name="new" class="btn btn-primary col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 1%;">New Order</button>
        <button type="submit" name="all" class="btn btn-success col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 1%;">All Order</button>
        <button type="submit" name="reject" class="btn btn-danger col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 1%;">Rejected Order</button>
        </form>
    </div> 

    

    <?php

    $conn = mysqli_connect("localhost", "root", "", "insta");
    if (!$conn)
        die($conn);

        if(array_key_exists('new',$_POST))
            newOrder();
        else if(array_key_exists('all',$_POST))
            all();
        else 
            reject();

        function newOrder(){
            global $conn;
            $query="SELECT * FROM `customerdata` WHERE STATUS=0";
            $res=mysqli_query($conn,$query);
            if(mysqli_num_rows($res)){
                echo "<div class='container-fluid'>
                <table class='table table-hover table-responsive'>
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Village</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Item Category</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price Per Quantity</th>
                    <th>Price</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>";
                while($row=mysqli_fetch_assoc($res)){
                    $i=$row['id'];
                    $j=$i*2-$i;
                    echo "<form method='post' action='<?php echo htmlspecialchars($_SERVER[PHP_SELF]); ?>'>
                        <tr>
                        <td>$row[name]</td><td>$row[mobileno]</td><td>$row[email]</td><td>$row[village]</td><td>$row[dist]</td>
                        <td>$row[state]</td><td>$row[itemcategory]</td><td>$row[itemname]</td><td>$row[quantity]</td><td>$row[pperq]</td>
                        <td>$row[price]</td><td>
                        <button type='submit' class='btn btn-success' value=$i name='subbtn'>Accept</button></td>
                        <td><button type='submit' class='btn btn-danger' value=$j name='subbtn'>Reject</button></td>
                    </tr>
                    </form>";
                }
                echo "</table>";
            }
                
            
        }
        function all(){
            global $conn;
            $query="SELECT * FROM `customerdata` WHERE STATUS=1";
        }
        function reject(){
            global $conn;
            $query="SELECT * FROM `customerdata` WHERE STATUS=-1";
        }  
    ?>

    <?php 
         if($_SERVER["REQUEST_METHOD"]=='post'){
            $id1=$_POST['subbtn'];
            if($id1>0)
                $query="UPDATE customerdata set status=1 WHERE id=$id1";
            else 
                $query="UPDATE customerdata set status=-1 WHERE id=$id1";
            $res=mysqli_query($conn,$query);
        }      
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>