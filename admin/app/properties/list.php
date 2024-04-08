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

?>
  <div class="pagetitle">
    <h1>List Of All Properties</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Properties</li>
        <li class="breadcrumb-item active">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">List Of All Properties</h5>

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