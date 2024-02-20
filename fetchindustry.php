<?php

$psw=$_GET['p1'];

$servername = "localhost";
    $username = "id19785536_root";
    $password = "*Scw0ks0j~(&MRtQ";
    $db="id19785536_glamour";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);

    if(!$conn)
        die("Connection failed: " . mysqli_connect_error());
    else{
        $query="SELECT * FROM `industryinfo` WHERE  password='$psw';";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $data[]=$row;
            print(json_encode($data));
        }
        else {
            echo "no";
    }
}

?>