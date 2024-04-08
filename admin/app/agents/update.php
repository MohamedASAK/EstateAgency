<?php
  include_once '../../shared/head.php';
  include_once '../../shared/header.php';
  include_once '../../shared/aside.php';
  if(isset($_GET['update'])){
    $update = true;
    $updateID = $_GET['update'];
    $select = "SELECT * FROM `admin` WHERE id = $updateID";
    $data = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($data);
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $salary = $row['salary'];
    $imageName = $row['image'];
    $oldImage = $row['image'];
    
    if(isset($_POST['update'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $hashPassword = sha1($password);
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $nid = $_POST['nid'];
      if(empty($_FILES['image']['name'])){
          $imageName = $row['image'];
      }else{
        $imageName = time() . rand(0,255) . rand(0,255) . $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $location = "./upload/" . $imageName;
        $imagePathWithName = "./upload/". $oldImage;
        unlink($imagePathWithName);
        move_uploaded_file($imageTemp,$location);
      }
      $updateData = "UPDATE `agents` SET `name` = '$name',`email` = '$email',`password` = $hashPassword, `phone` = '$phone', `address` = '$address', `nid` = '$nid', `image` = '$imageName', '$salary', `salary` = $salary,";
      $updateRun = mysqli_query($connect, $updateData);
      if($updateRun){
          $message = "Agents is updated successfully";
      }
    }
}
  if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $imageName = time() . rand(0,255) . rand(0,255) . $_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $imageName;
    move_uploaded_file($imageTemp, $location);
    $salary = $_POST['salary'];
    $update = "INSERT INTO `agents` VALUES (NULL,'$name','$email','$hashPassword','$phone','$address','$nid','$imageName',$salary,NULL)";
    $updateRun = mysqli_query($connect, $update);
    redirect('agents/update.php');
    getMessage($updateRun,'Admin is updated');
  }
  clearSessionDone('agents/update.php');
?>

<main class="main" id="main">
  <div class="pagetitle">
    <h1>Update Agents</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Agents</li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row container">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Agent Form</h5>
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
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $row['name'] ?>">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $row['email'] ?>">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= $row['phone'] ?>">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address" value="<?= $row['address'] ?>">
              </div>
              <div class="col-12">
                <label for="" class="form-label">National ID</label>
                <input type="text" class="form-control" name="nid" placeholder="National ID" value="<?= $row['nid'] ?>">
              </div>
              <div class="col-12">
                <label for="" class="form-label">Image 
                  <?php if(isset($row['image'])):?>
                    <img width="40" src="./upload/<?= $imageName?>" alt="">
                  <?php endif;?>
                </label>
                <input type="file" class="form-control" name="image" placeholder="Image" >
              </div>
              <div class="col-12">
                <label for="" class="form-label">Salary</label>
                <input type="number" class="form-control" name="salary" placeholder="Salary" value="<?= $row['salary'] ?>">
              </div>
              <div class="text-center">
                <button type="submit" name="update" class="btn btn-warning">Update</button>
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