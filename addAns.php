<?php
include 'navbar.html';
include 'db-cont.php';
?>
<form action="" method="post">
  <div class="form-group">
    <div class="form-group">
      <label for="exampleInputPassword1">your Answer</label>
      <select name="ans">
          <?php
            $sql = $cont->prepare("SELECT * FROM question");
            $sql->execute();
            while($row = $sql->fetch()){
              ?>
              <option><?php echo $row['name'] ?></option>
<?php
            }
          ?>
      </select>
      <input type="text" name="data" class="form-control" id="exampleInputPassword1" placeholder="Your Answer">
      <select name="status">
          <option value="1">True</option>
          <option value="0">False</option>
      </select>
    </div>


  <button type="submit" name="submit" class="btn btn-primary">ADD</button>
</form>


<?php
if(isset($_POST["submit"])){
  $data = $_POST["data"];
  $ans = $_POST["ans"];
  $status = $_POST["status"];
//$select = $cont->prepare("SELECT COUNT(name) FROM ans WHERE name=? AND q_code =?");
//$select->execute(array($data , $ans));
//$count = $select->fetchColumn();

//if($count <= 0){
  $valitaion = $cont->prepare("SELECT id FROM question WHERE name=?");
  $valitaion->execute(array($ans));
  while ($row = $valitaion->fetch()) {

    $insert = $cont->prepare("INSERT INTO ans(name,q_code,status) VALUES(?,?,?)");
    $insert->execute(array($data , $row['id'] , $status));
  }

?>
<div class="alert alert-success" role="alert">
    added :) ...
</div>



  <!-- <div class="alert alert-danger" role="alert"> -->
    <!-- this Answer exist :( ... -->
  <!-- </div> -->
  <?php

}
?>
