<?php
  include_once '../../shared/head.php';
  include_once '../../shared/header.php';
  include_once '../../shared/aside.php';

  $selectAdmins = "SELECT * FROM admins";
  $admins = mysqli_query($connect, $selectAdmins);

  $selectDevelopers = "SELECT * FROM 	real_estate_developers";
  $developers = mysqli_query($connect, $selectDeveloper);

  $selectAgents = "SELECT * FROM agents";
  $agents = mysqli_query($connect, $select);

  if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $imageName = time() . rand(0,255) . rand(0,255) . $_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $imageName;
    $imagePath = url('properties/upload/') . $imageName;
    move_uploaded_file($imageTemp, $location);
    $agent = $_POST['agent'];
    $admin = $_SESSION['admin']['id'];
    $developer = $_POST['developer'];

    $create = "INSERT INTO `properties` VALUES (NULL,'$title','$description','$price','$imageName','$imagePath', '$agent','$admin','$developer')";
    $createRun = mysqli_query($connect, $create);
    redirect('properties/create.php');
    getMessage($createRun,'Property is added');
  }
  clearSessionDone('properties/create.php');
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
      <li class="breadcrumb-item">Properties</li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row container">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create New Properties Form</h5>
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
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Location">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Image">
              </div>
              
              <div class="col-12">
                <select name="developer" class="form-control">
                  <option selected>Developer Name</option>
                  <?php foreach($developers as $items):?>
                    <option value="<?=$items['id']?>"><?=$items['name']?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="col-12">
                <select name="agent" class="form-control">
                  <option selected>Sales Name</option>
                  <?php foreach($agents as $items):?>
                    <option value="<?=$items['id']?>"><?=$items['name']?></option>
                  <?php endforeach;?>
                </select>
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
  include_once './shared/footer.php';
  include_once './shared/script.php';
?>