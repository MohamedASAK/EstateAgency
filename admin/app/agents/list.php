<?php
  include_once '../../shared/head.php';
  include_once '../../shared/header.php';
  include_once '../../shared/aside.php';
  //Read
  $select = "SELECT * FROM agents";
  $allData = mysqli_query($connect, $select);

  //Delete
  if (isset($_GET['delete'])) {
    $delID = $_GET['delete'];
    $select = "SELECT `image` FROM agents WHERE id = $delID";
    $data = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($data);
    $imagePathWithName = "./upload/". $row['image'];
    unlink($imagePathWithName);
    $delete = "DELETE FROM agents WHERE id = $delID";
    mysqli_query($connect, $delete);
    header("location: /estateagency/admin/app/agents/list.php");
  }

  //Delete All
  if (isset($_GET['deleteAll'])) {
    $delID = $_GET['deleteAll'];
    $deleteAll = "DELETE FROM teachers";
    mysqli_query($connect, $deleteAll);
    header("location: /estateagency/admin/app/agents/list.php");
    $message = "All agents is deleted";
  }
?>
  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Agents</li>
        <li class="breadcrumb-item active">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">List Of All Agents</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Create At</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allData as $item): ?>
                  <tr>
                    <td><?= $item['id']?></td>
                    <td><?= $item['name']?></td>
                    <td><img width="40" src="./upload/<?=$item['image']?>" alt=""></td>
                    <td><?= $item['create_at']?></td>
                    <td><a href="./update.php?update=<?=$item['id']?>"class="btn btn-warning">Update</a></td>
                    <td><a href="./list.php?delete=<?=$item['id']?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="./view.php?view=<?=$item['id']?>" class="btn btn-primary">View</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

<?php
  include_once '../../shared/footer.php';
  include_once '../../shared/script.php';
?>