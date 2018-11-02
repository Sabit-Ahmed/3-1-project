<?php
session_start();

$servername="localhost";
$username="root";  //root
$password="";
$db="registration";

$conn=new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
  die("Connection failed:  ".$conn->connect_error);
}


//Registration
$all_user=$fname=$lname=$remail=$gender=$rpass1=$pass2=$pass=$mob="";
$caterr=$fnerr=$lnerr=$remerr=$generr=$rperr1=$perr2=$moberr="";
$error=array();
if(isset($_POST['register'])){
  $fname=$conn->real_escape_string($_POST['fname']);
  $lname=$conn->real_escape_string($_POST['lname']);
  $remail=$conn->real_escape_string($_POST['email']);
  $rpass1=$conn->real_escape_string($_POST['password1']);
  $pass2=$conn->real_escape_string($_POST['password2']);
  $mob=$conn->real_escape_string($_POST['mob']);
//  $gender=$conn->real_escape_string($_POST['gender']);

    if (empty($_POST['all_user'])){
       array_push($error,1);
       $caterr="Please select your category!";
     }
    else {
        $all_user=test($_POST['all_user']);
        if (empty($_POST['gender'])){
            array_push($error,1);
            $generr="Put your gender!";
          }
        else {
            $gender=test($_POST['gender']);
        }

        if (empty($fname)){
            array_push($error,1);
            $fnerr="Name is required!";
        }
        else{
          $fname=test($fname);
          if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
             array_push($error,1);
             $fnerr="Only letters and whitespace are allowed";
         }
       }

       if (empty($lname)){
           $lname="";
       }
       else {
          $lname=test($lname);
          if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
             array_push($error,1);
             $lnerr="Only letters and whitespace are allowed!";
         }
       }

        if(empty($remail)) {
            array_push($error,1);
            $remerr="Email is required!";
         }

        else {
           $remail=test($remail);
           if(!filter_var($remail,FILTER_VALIDATE_EMAIL)){
              array_push($error,1);
              $remerr="Invalid Format!";
           }
        }




        if(empty($rpass1)){
          array_push($error,1);
          $rperr1="Password is required!";
        }
        else{
          $rpass1=test($rpass1);
        }

        if(empty($pass2)){
           array_push($error,1);
           $perr2="Please confirm password!";
        }
        else{
           $pass2=test($pass2);
           if($rpass1!=$pass2){
             array_push($error,1);
             $perr2="Passwords are not same!";
           }
        }
        if(empty($mob)){
          array_push($error,1);
          $moberr="Phone number is required!";
        }
        else{
          $mob=test($mob);
          if(!preg_match(" /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/", $mob)){
            array_push($error,1);
            $moberr="Invalid format!";
          }

        }

        $q="SELECT email FROM $all_user WHERE email='$remail'";
        $re=$conn->query($q);

        if($re->num_rows>0){
        array_push($error,1);
        $remerr="This email already exists!";
        }

        if (count($error) == 0){
        $rpass=SHA1($rpass1);

        $sql="INSERT INTO $all_user (First_name,Last_name,Email,Password,Gender,Mobile_no) VALUES ('$fname','$lname','$remail','$rpass','$gender',$mob)";

        $result=$conn->query($sql);
         if($all_user=="customer"){
            header('location: login.php');

         }
         else{
           $_SESSION['pro_email']=$remail;
           header('location:pro_service.php');

         }
        }
    }


}

$lall_user=$lcaterr=$email=$pass1=$emerr=$perr1=$count="";
if(isset($_POST['login'])&&empty($_SESSION['email'])){
$email=$conn->real_escape_string($_POST['email']);
$pass1=$conn->real_escape_string($_POST['password1']);

if (empty($_POST['all_user'])){
   array_push($error,1);
   $lcaterr="Please select your category!";
 }
else {
    $lall_user=test($_POST['all_user']);
    if(empty($email)){
         $emerr="Email is required!";
         $count++;
    }
    else{
      $email=test($email);
    }
    if(empty($pass1)){
      $perr1="Password is required!";
      $count++;
    }
    else{
      $pass1=test($pass1);
    }

    if($count==0){
      $pass=SHA1($pass1);
      $sql="SELECT * FROM $lall_user WHERE Email='$email' AND Password='$pass'";
      $result=$conn->query($sql);
      if(($result->num_rows) == 1){
          $rows=$result->fetch_assoc();
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in!";

          if($lall_user=="customer"){
            $id=$rows['Cus_ID'];
            $_SESSION['c_id']=$id;
            $_SESSION['name']=$rows['First_name'];
            header('location: index2.php');
          }
          else{
            $id=$rows['Pro_ID'];
            $_SESSION['p_id']=$id;
            $_SESSION['name']=$rows['First_name'];
            header('location: index1.php');
          }


          //echo $id;
          //header('location: index2.php');
       }
       else{
         $emerr="Wrong email address or password!";
         $count++;
       }
    }

 }

}

else if(isset($_POST['login'])&&!empty($_SESSION['email'])){
  die("You are logged in already!");
}

function test($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

//logout
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['c_id']);
    unset($_SESSION['p_id']);
    unset($_SESSION['name']);
    //echo $_SESSION['id'];
    header('location: login.php');
}


$conn->close();

 ?>
