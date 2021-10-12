<?php require 'connection.php';
if(isset($_POST['ridersignup'])){
    $query_user="SELECT code From rider_serial ORDER BY code DESC";
      $result=  mysqli_query($connection,$query_user);
      $row= mysqli_fetch_array($result);
      $lastid=$row['code'];
      if(empty($lastid)){
        $coderider= "Rider-0000001";
      }else{
        $id=str_replace("Rider-","",$lastid);
        $id=str_pad($id+1,7,0, STR_PAD_LEFT);
        $coderider ="Rider-" .$id;
      }
      $nid=$_POST['nid'];
      $name=$_POST['firstname']. ' ' .$_POST['lastname'];
      $code=$coderider;
      $email=$_POST['email'];
      $contact = $_POST['contact'];
      $address = $_POST['addrees'];
      $password = $_POST['password'];
      $encrypt_password = md5($password);
      $user_table_check = mysqli_query($connection,"SELECT * FROM rider  WHERE email='$email'");
      if(mysqli_num_rows($user_table_check) === 1){
        header("Location: ../ridersignup?message_failed= $email is already registered.Please try with another email",true,  302 );
        exit();
            }else{
              $details_sql="INSERT INTO rider_details(code,name,email,nid,contact,address)VALUE('$code','$name','$email','$nid','$contact','$address')";
              if ($connection->query($details_sql) === TRUE) {
                $user_serial="INSERT INTO rider_serial(code,name)VALUE('$code','$name')";
                if ($connection->query($user_serial) === TRUE) {
                  $login_user="INSERT INTO rider(name,email,code,password)VALUE('$name','$email','$code','$encrypt_password')";
                  if ($connection->query($login_user) === TRUE) {
                    header("Location: ../login?message_success= Account created successfully.Plase login here.",true,  302 );
                    exit;
                  }else {
                    header("Location: ../ridersignup?message_failed= Could not add your account.",true,  302 );
                        exit;
                  }
                }else {
                  header("Location: ../ridersignup?message_failed= Could not add your account.",true,  302 );
                      exit;
                }
              }else {
                header("Location: ../ridersignup?message_failed= Could not add your account.",true,  302 );
                    exit;
              }
            }
    }else {
      header("Location: ../ridersignup?message_failed= Server taking too long to respond.",true,  302 );
          exit;
   }?>