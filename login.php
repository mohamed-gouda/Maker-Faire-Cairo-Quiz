

<?php
include 'navbar.html';
include 'db-cont.php';
?>

<html>
<head>
<title>Login</title>
</head>
<body>
  <form action="" method="post">
    <div class="form-group">
      <div class="form-group">
        <label for="exampleInputPassword1">your Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Your Name">
      </div>

      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Login</button>
  </form>

<?php
if(isset($_POST["submit"])){

  $name = $_POST["name"];
  $email = $_POST["email"];

  $select = $cont->prepare("SELECT COUNT(email) FROM users WHERE email=?");
  $select->execute(array($email));
  $count = $select->fetchColumn();
  if($count <= 0){
    $insert = $cont->prepare("INSERT INTO users(name , email) VALUES(? , ?)");
    $insert->execute(array($name , $email));
    session_start();
    $_SESSION["name"] = $name; 
    header('Location:dashboard.php');
  }else{
    ?>
    <script>alert("This Email Is Esxit")</script>
    <div class="alert alert-danger" role="alert">
  This Email Is Esist
</div>
    <?php
  }
}

?>

</body>
</html>
