<header class="main-header">
  <!-- Logo -->

  <!-- nav -->
  <div class="header">
  <img style="max-width:20%;" src="<?php echo base_url("assets/upload/images/lundin.png"); ?>" alt="">
	</div>  
      
	</div>
 
<nav class="navbar navbar-default" style="box-shadow:0px 5px #eee;">
  <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li id="item" class=""><a href="<?php echo site_url('admin/home')?>"><u>H</u>ome</a></li>
      <li class=""><a href="<?php echo site_url('admin/peminjaman')?>">Check <u>O</u>ut</a></li>
      <li class=""><a href="<?php echo site_url('admin/pengembalian')?>">Check <u>I</u>n</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Item <u>L</u>ist<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('admin/barang')?>">Item List</a></li>
          <li><a href="<?php echo site_url('admin/barang/tambah')?>">Add Item</a></li>
          <li><a href="<?php echo site_url('admin/kategori_barang/level1')?>">First Item Category</a></li>
          <li><a href="<?php echo site_url('admin/kategori_barang/level2')?>">Second Item Category</a></li>
          <li><a href="<?php echo site_url('admin/kategori_barang/level3')?>">Thrid Item Category</a></li>
          <li><a href="<?php echo site_url('admin/tipebarang')?>">Item Type</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><u>E</u>mployees<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('admin/pegawai')?>">Employee List</a></li>
          <li><a href="<?php echo site_url('admin/pegawai/tambah')?>">Add Employee</a></li>
          <li><a href="<?php echo site_url('admin/jpegawai')?>">Job Tittle</a></li>
        </ul>
      </li>
      <li class=""><a href="<?php echo site_url('admin/proyek')?>"><u>P</u>roject</a></li>
      <!-- <li class=""><a href="<?php echo site_url('admin/pemesanan')?>">Booking Barang</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <a href="<?php echo base_url() ?>auth/logout"><button class="btn btn-danger navbar-btn" title="Logout"><span class="glyphicon glyphicon-log-out"></span></button></a>
    </ul>
    </div>
  </div>
</nav>
</header>

