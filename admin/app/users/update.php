<?php
  include_once '../../shared/head.php';
  include_once '../../shared/header.php';
  include_once '../../shared/aside.php';
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row container">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create New User Form</h5>
            <?php if (isset($_SESSION['done'])) :?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                  <?php echo $_SESSION['done'];?>
                <form action="" method="POST">
                  <button type="submit" name="clearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </form>
              </div>
            <?php endif;?>
            <!-- Vertical Form -->
            <form method="POST" enctype="multipart/form-data" class="row g-3">
              <div class="col-12">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="1234 Main St">
              </div>
              <div class="col-12">
                <label for="" class="form-label">National ID</label>
                <input type="text" class="form-control" name="nid" placeholder="National ID">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Image">
              </div>
              <div class="text-center">
                <button type="submit"  name="send" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- Vertical Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php
    include_once '../../shared/footer.php';
    include_once '../../shared/script.php';
?>