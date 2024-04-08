<?php include_once 'C:\xampp\htdocs\EstateAgency\admin\vendor\functions.php'?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="<?= url("index.php")?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

  <?php //if ($_SESSION['admin']['rule'] == 1) :?>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admins-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-gear"></i></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admins-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link " href="<?= url("app/admins/create.php")?>">
              <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
            <a class="nav-link " href="<?= url("app/admins/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
    </li><!-- End Admins Nav -->
  <? //endif ?>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#agents-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Agents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="agents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a class="nav-link " href="<?= url("app/agents/create.php")?>">
          <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
          <a class="nav-link " href="<?= url("app/agents/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Agents Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#developers-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-gear"></i><span>Developers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="developers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a class="nav-link " href="<?= url("app/developers/create.php")?>">
              <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
          <a class="nav-link " href="<?= url("app/developers/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Developers Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#properties-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-houses"></i></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="properties-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a class="nav-link " href="<?= url("app/properties/create.php")?>">
          <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
          <a class="nav-link " href="<?= url("app/properties/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Properties Nav -->
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a class="nav-link " href="<?= url("app/users/create.php")?>">
          <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
          <a class="nav-link " href="<?= url("app/users/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a class="nav-link " href="<?= url("app/orders/create.php")?>">
          <i class="bi bi-plus-circle"></i></i><span>Create</span>
            </a>
          </li>
          <li>
          <a class="nav-link " href="<?= url("app/orders/list.php")?>">
              <i class="bi bi-list"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Orders Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-faq.php")?>">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-contact.php")?>">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-register.php")?>">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-login.php")?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-error-404.php")?>">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= url("pages-blank.php")?>">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
      </a>
    </li><!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->
