<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="index.php">Medee Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="shop.php">สินค้า</a>
      </li>
      <?PHP
      $username = (isset($_SESSION['Name'])) ? $_SESSION['Name'] : '';
      if ($username && $Status=='1') {?>
        <li class="nav-item">
          <a class="nav-link" href="add_product.php">เพิ่มสินค้า</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_check.php">รายการอนุมัติ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list_cus.php">รายชื่อสมาชิก</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <?PHP echo $username; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="backend/logout.php">ออกจากระบบ</a>
            </li>
        <?PHP } else if ($username && $Status=='2') { ?>
          <li class="nav-item">
              <a class="nav-link" href="order_create.php">สั่งทำ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listorders.php">ออเดอร์</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <?PHP echo $username; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="backend/logout.php">ออกจากระบบ</a>
            </li>
          <?PHP } 
            if (!$username) { ?>
              <li class="nav-item " >
              <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="register.php">ลงทะเบียน</a>
            </li>
            <?PHP
            }
          ?>
    </ul>

  </div>
</nav>
