<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
    exit();
}
include("config.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/distanhortic.png" height="64px" width="64px" alt="">
                </div>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gudang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-box"></i>
                    <span>Barang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <?php
                            if ($_SESSION['level'] == "admin") {
                            ?>
                                <a class="collapse-item" href="Laporan.php">Laporan Data</a>
                            <?php
                            }
                            ?>
                            
                            <?php
                             if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"){
                            ?>
                                <a class="collapse-item" href="table-barang.php">Data Barang</a>
                            <?php
                            }
                            ?>
                        
                        <a class="collapse-item" href="table-pengajuan.php">Data pengajuan</a>
                        <a class="collapse-item" href="table-pengembalian.php">Data pengembalian</a>
                        
                    </div>
                </div>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.php">Login</a>
                            <a class="collapse-item" href="register.php">Register</a>
                            <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- topbar search-->
                            <div
                                class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
                                <img src="img/distanhorti.png" height="64px" alt="">
                            </div>

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                                </button>


                  
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                          
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['username'] ?>
                            </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Data Barang</h1>
                    <p class="mb-4"><a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> 
                            
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#tambahbarang"><i
                                class="fas 	fa fa-boxes text-white-50"></i> Tambahkan Barang </a>
                                </button>

                                <!-- Modal tambah barang -->
                                <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Formulir Barang Masuk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                                <form action="config.php" method="POST">
                                                    <div class="modal-body">

                                                        
                                                        <div class="form-group mb-3">
                                                            <label for="">Supplier</label> 
                                                            <input type="text" class="form-control" placeholder="Nama" name="supplierB">
                                                        </div>


                                                        <div class="form-group mb-3">
                                                            <label for="namaBarang">Barang</label>
                                                            <input type="text" class="form-control" placeholder="Nama Barang" name="namaB">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Jenis Barang</label>
                                                                <select class="form-control" name="jenisbarang">
                                                                <option>Folder</option>
                                                                <option>Cairan</option>
                                                                <option>Elektronik</option>
                                                                <option>Alat Tulis</option>
                                                                <option>tes</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Satuan Barang</label>
                                                                <select class="form-control" name="satuanbarang">
                                                                <option>unit</option>
                                                                <option>buah</option>
                                                                <option>kardus</option>
                                                                <option>box</option>
                                                                <option>Lembar</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Rak</label>
                                                                <select class="form-control" name="rakbarang">
                                                                <option>Rak 1</option>
                                                                <option>Rak 2</option>
                                                                <option>Rak 3</option>
                                                                <option>Rak 4</option>
                                                                <option>Rak 5</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="">Stok Barang</label>
                                                            <input type="number" class="form-control" placeholder="stok Barang" name="stokbarang">
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="tambah-barang">Tambah</button>
                                                    </div>

                                                </form>

                                        </div>
                                    </div>
                                </div>

                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>supplier</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang </th>
                                            <th>Jenis Barang</th>
                                            <th>Satuan</th>
                                            <th>Gudang</th>
                                            <th>Stok</th>
                                            <th>Tindakan</th>          
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>supplier</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang </th>
                                            <th>Jenis Barang</th>
                                            <th>Satuan</th>
                                            <th>Gudang</th>
                                            <th>Stok</th> 
                                            <th>Tindakan</th>           
                                        </tr>
                                    </tfoot>

                                    <tbody>

                                        <?php
                                            $sql = "SELECT * FROM table_barang";
                                            $query = mysqli_query($db, $sql);
                                            $no = 1;

                                            while($barang = mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $barang['supplier'];?></td>
                                                <td><?php echo $barang['id_barang'];?></td>
                                                <td><?php echo $barang['nama_barang'];?></td>
                                                <td><?php echo $barang['jenis_barang'];?></td>
                                                <td><?php echo $barang['satuan'];?></td>
                                                <td><?php echo $barang['gudang'];?></td>
                                                <td><?php echo $barang['stok'];?></td>

                                                <td>
                                                    <button type='button' class='btn btn-primary btn-sm shadow-sm' data-toggle='modal' data-target='#editbarang<?php echo $barang['id_barang'];?>'><i
                                                        class='fas fa fa-edit text-white-50'> </i> </button> 
                                                    <a href='hapus.php?id_barang=<?php echo $barang['id_barang']; ?>'> <button class='btn btn-danger btn-sm shadow-sm' type='button'>
                                                        <i class='fas fa fa-trash text-white-50'> </i> </button> </a>
                                                </td>
                                            </tr>
                                                <?php $no++; ?>
                                            
                                                <!-- modal edit -->
                                                <div class="modal fade" id="editbarang<?php echo $barang['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Informasi Barang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    
                                                            <form action="barang-edit.php" method="POST">
                                                                <div class="modal-body">
                                                    
                                                                    <?php
                                                                        $id_barang = $barang['id_barang'];
                                                                        $query_edit = mysqli_query($db, "SELECT * FROM table_barang WHERE id_barang='$id_barang'");
                                                                        
                                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                                    ?>
                                                    
                                                                        <input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">

                                                                    <div class="form-group mb-3">
                                                                        <label for="">Supplier</label> </a>
                                                                        <input type="text" class="form-control" placeholder="Nama" name="editSupplier" value="<?php echo $row['supplier'] ?>">
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="namaBarang">Barang</label>
                                                                        <input type="text" class="form-control" placeholder="Nama Barang" name="editNama" value="<?php echo $row['nama_barang'] ?>">
                                                                    </div>
                                                    
                                                                    <div class="form-group mb-3">
                                                                        <div class="form-group">
                                                                            <label for="jenis">Jenis Barang</label>
                                                                            <select class="form-control" name="editJenis">
                                                                            <option <?php if($row['jenis_barang'] == "Folder"){echo "selected"; } ?>>Folder</option>
                                                                            <option <?php if($row['jenis_barang'] == "Cairan"){echo "selected"; } ?>>Cairan</option>
                                                                            <option <?php if($row['jenis_barang'] == "Elektronik"){echo "selected"; } ?>>Elektronik</option>
                                                                            <option <?php if($row['jenis_barang'] == "Alat Tulis"){echo "selected"; } ?>>Alat Tulis</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                    
                                                    
                                                                    <div class="form-group mb-3">
                                                                        <div class="form-group">
                                                                            <label for="satuan">Satuan Barang</label>
                                                                            <select class="form-control" name="editSatuan">
                                                                            <option <?php if($row['satuan'] == "unit"){echo "selected"; } ?>>unit</option>
                                                                            <option <?php if($row['satuan'] == "buah"){echo "selected"; } ?>>buah</option>
                                                                            <option <?php if($row['satuan'] == "kardus"){echo "selected"; } ?>>kardus</option>
                                                                            <option <?php if($row['satuan'] == "box"){echo "selected"; } ?>>box</option>
                                                                            <option <?php if($row['satuan'] == "lembar"){echo "selected"; } ?>>Lembar</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                    
                                                    
                                                                    <div class="form-group mb-3">
                                                                        <div class="form-group">
                                                                                <label for="gudang">Rak</label>
                                                                                <select class="form-control" placeholder="<?php echo $row['gudang'] ?>" name="editRak">
                                                                                <option <?php if($row['gudang'] == "Rak 1"){echo "selected"; } ?>>Rak 1</option>
                                                                                <option <?php if($row['gudang'] == "Rak 2"){echo "selected"; } ?>>Rak 2</option>
                                                                                <option <?php if($row['gudang'] == "Rak 3"){echo "selected"; } ?>>Rak 3</option>
                                                                                <option <?php if($row['gudang'] == "Rak 4"){echo "selected"; } ?>>Rak 4</option>
                                                                                <option <?php if($row['gudang'] == "Rak 5"){echo "selected"; } ?>>Rak 5</option>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                            
                                                                    <div class="form-group mb-3">
                                                                        <label for="stok">Stok Barang</label>
                                                                        <input type="number" class="form-control" placeholder="<?php echo $row['stok'] ?>" name="editStok">
                                                                    </div>
                                                        
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="simpan">simpan</button>
                                                                </div>

                                                            </form>  
                                                                <?php 

                                                                    }

                                                                ?>
                                                        </div>
                                                    </div>  
                                                </div>
                                                        
                                    </tbody>
                                        <?php
                                             }   
                                         ?>
                                 </table>

                            </div>
                        </div>
                    </div>
                        
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; MarSep 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>