<?php
include 'navbar.html';
include 'db-cont.php';
?>
<form action="" method="post">
  <div class="form-group">
    <div class="form-group">
      <label for="exampleInputPassword1">your question</label>
      <input type="text" name="question" class="form-control" id="exampleInputPassword1" placeholder="Your question">
    </div>


  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>


<?php
if(isset($_POST["submit"])){
  $question = $_POST["question"];

$select = $cont->prepare("SELECT COUNT(name) FROM question WHERE name=?");
$select->execute(array($question));
$count = $select->fetchColumn();
if($count <= 0){
$insert = $cont->prepare("INSERT INTO question(name) VALUES(?)");
$insert->execute(array($question));
?>
<div class="alert alert-success" role="alert">
    added :) ...
</div>
<?php
}else{
  ?>

  <div class="alert alert-danger" role="alert">
    this question exist :( ...
  </div>
  <?php
}
}
?>
