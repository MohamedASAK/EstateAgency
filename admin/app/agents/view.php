<?php
    include_once '../../shared/head.php';
    include_once '../../shared/header.php';
    include_once '../../shared/aside.php';

    if(isset($_GET['view'])){
        $idView = $_GET['view'];
        $select = "SELECT * FROM agents WHERE id = $idView";
        $data = mysqli_query($connect, $select);
        $row = mysqli_fetch_assoc($data);
    }
?>

<div class="pagetitle">
    <h1>View Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=<?=url("index.php")?>>Home</a></li>
        <li class="breadcrumb-item">Agents</li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <img class="image-fluid" src="./upload/<?=$row['image']?>" alt="">     
                    <div class="card-body" id="myContent">
                        <h5>Name : <?= $row['name'] ?></h5>
                        <h6>Phone : <?= $row['phone'] ?> </h6>
                        <h6>Email : <?= $row['email'] ?></h6>
                        <h6>Password : <?= $row['password'] ?></h6>
                        <h6>Phone : <?= $row['phone'] ?></h6>
                        <h6>National ID : <?= $row['nid'] ?></h6>
                        <h6>Salary : <?= $row['salary'] ?></h6>
                        <h6>Create At : <?= $row['create_at'] ?></h6>
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