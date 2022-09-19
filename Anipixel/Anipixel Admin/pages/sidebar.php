<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/<?php echo $fetch_user['avatar']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fetch_user['name']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./index.php" class="nav-link active">
              <i class="fa-solid fa-house nav-icon"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-upload nav-icon"></i>
              <p>
                Publicar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-upload nav-icon"></i>
                  <p>Anime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-upload nav-icon"></i>
                  <p>Filme</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-upload nav-icon"></i>
                  <p>Manga</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-bug nav-icon"></i>
              <p>Bug Reports</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
                <a href="contacts.php" class="nav-link">
                  <i class="fa-solid fa-users nav-icon"></i>
                  <p>Membros</p>
                </a>
          </li>
          <li class="nav-header">CONFIGURAÇÕES</li>
          <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="fa-solid fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
          </li>
          <li class="nav-item">
            <?php
              $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
              if(mysqli_num_rows($select_user) > 0){
                  $fetch_user = mysqli_fetch_assoc($select_user);
              };
            ?>
            <a class="nav-link" href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Quer mesmo sair?');">
              <i class="fa-solid fa-arrow-right-from-bracket nav-icon"></i>
              <p class="text">Sair</p></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>