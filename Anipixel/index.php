<?php

   include 'config.php';
   session_start();
   $user_id = $_SESSION['user_id'];

   if(!isset($user_id)){
      header('location:login.php');
      exit();
   };

   if(isset($_GET['logout'])){
      unset($user_id);
      session_destroy();
      header('location:login.php');
      exit();
   };



   //Pegando usuario
   $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select_user) > 0){
      $fetch_user = mysqli_fetch_assoc($select_user);
   };


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="css/sidebar.css">
   <title>shopping cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/index.css">

</head>
<body>
      
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
      }
   }
   ?>

   <!-- Sidebar -->
   <div class="sidebar">
      <div class="logo-details">
         <img src="" class="" alt="">
         <div class="logo_name">Anipixel</div>
         <i class="bi bi-list" id="btn"></i>
      </div>
      <ul class="nav-list">
         <li>
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Procurar...">
            <span class="tooltip">Procurar</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-house"></i>
               <span class="links_name">Inicio</span>
            </a>
            <span class="tooltip">Inicio</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-archive"></i>
               <span class="links_name">Genero</span>
            </a>
            <span class="tooltip">Genero</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-calendar"></i>
               <span class="links_name">Lançamentos</span>
            </a>
            <span class="tooltip">Lançamentos</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-play-btn"></i>
               <span class="links_name">Animes</span>
            </a>
            <span class="tooltip">Animes</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-film"></i>
               <span class="links_name">Filmes</span>
            </a>
            <span class="tooltip">Filmes</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-phone"></i>
               <span class="links_name">Aplicativo</span>
            </a>
            <span class="tooltip">Aplicativo</span>
         </li>
         <li>
            <a href="#">
               <i class="bi bi-gear"></i>
               <span class="links_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
         </li>
         <li class="profile">
            <div class="profile-details">
               <img src="./Anipixel Admin/dist/img/<?php echo $fetch_user['avatar']?>" alt="profileImg">
               <div class="name_job">
                  <div class="name"><?php echo $fetch_user['name']; ?></div>
                  <!--<div class="job"></div>-->
               </div>
               <div>
                  <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');"><i class="bi bi-box-arrow-left"></i></a>
               </div>
            </div>
         </li>
      </ul>
   </div>
   <!-- Home -->
         
   <div class="home_section">
      <header>
         

         <!-- NOTA: Banner ficara sempre o ultimo anime publicado -->
         <?php

         ?>


         <div class="banner">
            <div class="banner__contents">
                  <h1 class="banner__title">Black Clover</h1>
                  <div class="banner__buttons">
                     <button class="banner__button"><a href="">PLAY</a></button>
                     <button class="banner__button">LIST</button>
                  </div>
                  <div class="banner_description">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam maxime vel cupiditate enim at veniam! Voluptatibus necessitatibus magnam rem ex officiis asperiores quos unde enim doloribus! Quasi inventore eveniet eius?
                  </div>
               </div>
            <div class="banner__fadeBottom"></div>
         </div>
      </header>
   </div>
   


   <!-- Script's -->
   <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bi-search");
        
        closeBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
            menuBtnChange();//calling the function(optional)
        });
        
        searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
        
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if(sidebar.classList.contains("open")){
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
            }else{
                closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
            }
        }
    </script>
</body>
</html>