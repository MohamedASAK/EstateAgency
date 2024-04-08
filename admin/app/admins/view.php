<?php
    include_once '../../shared/head.php';
    include_once '../../shared/header.php';
    include_once '../../shared/aside.php';

    if(isset($_GET['view'])){
        $idView = $_GET['view'];
        $select = "SELECT * FROM admins WHERE id = $idView";
        $data = mysqli_query($connect, $select);
        $row = mysqli_fetch_assoc($data);
    }
?>

<div class="pagetitle">
    <h1>View Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Admins</li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <img class="image-fluid" src="./upload/<?=$row['image']?>" alt="">     
                    <div class="card-body mt-3" id="myContent">
                        <h4>Name : <?= $row['name'] ?></h4>
                        <h5>Phone : <?= $row['phone'] ?> </h5>
                        <h5>Email : <?= $row['email'] ?></h5>
                        <h5>Password : <?= $row['password'] ?></h5>
                        <h5>Phone : <?= $row['phone'] ?></h5>
                        <h5>National ID : <?= $row['nid'] ?></h5>
                        <h5>Salary : <?= $row['salary'] ?></h5>
                        <h5>Create At : <?= $row['create_at'] ?></h5>
                        <a href="./list.php" class="btn btn-light d-grid">Go Back To List</a>
                    </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once '../../shared/footer.php';
    include_once '../../shared/script.php';
?>