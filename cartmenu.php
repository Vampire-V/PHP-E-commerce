<div class="col-sm-4">
  <?PHP
$username = (isset($_SESSION['Name'])) ? $_SESSION['Name'] : '';
      if ($username) {
?>
    <a href="cart.php">
      <h2>ตระกร้าสินค้า</h2>
    </a>
    <?PHP 
    } 
    ?>
    <h5>จำนวนสินค้า :
      <?PHP echo $meCount; ?>
    </h5>
    <!-- <div class="fakeimg"> Fake Image </div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3>Some Links</h3>
    <p>Lorem ipsum dolor sit ame.</p> -->
    <!-- <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul> -->
    <hr class="d-sm-none">
</div>