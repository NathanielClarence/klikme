<?php
    include "koneksi.php";

    $id = $_GET['id'];
    $photo = $_GET['photo'];
    $uname = $_GET['uname'];
    $fname = $_GET['fname'];
    $mname = $_GET['mname'];
    $lname = $_GET['lname'];
    $tmbh_email = $_GET['tmbh_email'];
    $pwd = $_GET['pwd'];
    $bday = $_GET['bday'];
    $biodt = $_GET['biodt'];

    $uploadfile = 'images/'.$photo;
    if(move_uploaded_file($photo, $uploadfile)){

    }else{
      echo "failed";
    }

    $sql = "UPDATE user set username = '".$uname."', first_name = '".$fname."', mid_name = '".$mname."', last_name = '".$lname."', email = '".$tmbh_email."', password = '".$pwd."', birthday = '".$bday."', bio = '".$biodt."' where id_num = '".$id."'";
    if(mysqli_query($conn, $sql)){
      header("location:editProfile.php?id=".$id);
    }
    else{
      echo "false".mysqli_error($conn);
    }
?>