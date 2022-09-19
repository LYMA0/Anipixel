<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));


   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_position'] = $row['position'];
      $user_position = $row['position'];
      if($user_position > 1){    //if está em funcionamento porem ele não manda para o link que estou mandando sempre vai pro link de baixo
         header('location:/Anipixel/Anipixel Admin/pages');
         exit;
      }
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

   //background rand
   $bg = array('background_login1.png', 'background_login2.png', 'background_login3.png'); // array of filenames

   $i = rand(0, count($bg)-1);
   $selectedBg = "$bg[$i]";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Anipixel - Login</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">
   <style>
      body{
         background-image: url("assets/<?php echo $selectedBg;?>");
      }
   </style>
</head>
   <body>
      <div class="background_transparent">
         <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
            }
         }
         ?>
         
         <div class="form-container">

            <form action="" method="post">
               <h1>Anipixel</h1>
               <h3>login now</h3>
               <input type="email" name="email" required placeholder="Email" class="box">
               <input type="password" name="password" required placeholder="Password" class="box">
               <input type="submit" name="submit" class="btn" value="login now">
               <p>don't have an account? <a href="register.php">register now</a></p>
            </form>

         </div>

         <footer class="footer">
            <div class="footer__contents">
               Anipixel<br>
               © Copyright Anipixel 2022
               <div class="footer__follows__app">
                  <i class="bi bi-instagram"></i>
                  <i class="bi bi-facebook"></i>
                  <i class="bi bi-discord"></i>
               </div>
               <div>
                  <img height="60px" width="155px" src="../Anipixel/assets/google-play.png" alt="">
               </div>
            </div>
         </footer>
      </div>
   </body>
</html>