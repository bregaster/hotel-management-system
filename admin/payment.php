<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOTEL ALEXIS</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="home.php"><i class="fa fa-dashboard"></i>Status Pesan</a>
                </li>
                <li>
                    <a href="settings2.php"><i class="fa fa-star-o"></i>Status Kamar</a>
                </li>
                <li>
                    <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Pesan Kamar</a>
                </li>
                <li>
                    <a class="active-menu"  href="payment.php"><i class="fa fa-qrcode"></i> Pembayaran</a>
                </li>
                <li>
                    <a  href="profit.php"><i class="fa fa-qrcode"></i> Keuntungan</a>
                </li>
                <li>
                    <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                </li>
        </div>
    </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Detail Pembayaran<small> </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
											<th>Tipe Kamar</th>
                                            <th>Tipe Kasur</th>
                                            <th>Check in</th>
											<th>Check out</th>
											<th>Jumlah Orang</th>
                                            <th>Tagihan Kamar</th>
											<th>Tagihan Kasur</th>
											<th>Total Tagihan</th>
											<th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										include ('db.php');
										$sql="SELECT * FROM pembayaran A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN reservasi C ON B.kode_tamu = C.kode_tamu JOIN tipe_kamar D ON C.kode_tipekamar = D.kode_tipekamar JOIN tipe_kasur E ON C.kode_kasur = E.kode_kasur";
										$re = mysqli_query($con,$sql);
										while($row = mysqli_fetch_array($re))
										{
											$id = $row['kode_tamu'];
											if($id % 2 ==1 )
											{
                                                echo"<tr class='gradeC'>
													<td>".$row['namaDepan']." ".$row['namaBelakang']."</td>
													<td>".$row['kode_tipekamar']."</td>
													<td>".$row['kode_kasur']."</td>
													<td>".$row['waktu_checkin']."</td>
													<td>".$row['waktu_checkout']."</td>
                                                    <td>".$row['jumlah']."</td>
                                                    <td>".$row['harga']."</td>
                                                    <td>".$row['harga_kasur']."</td>
													<td>".$row['total_tagihan']."</td>
													<td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
											}
											else
											{
                                                echo"<tr class='gradeU'>
                                                <td>".$row['namaDepan']." ".$row['namaBelakang']."</td>
                                                <td>".$row['kode_tipekamar']."</td>
                                                <td>".$row['kode_kasur']."</td>
                                                <td>".$row['waktu_checkin']."</td>
                                                <td>".$row['waktu_checkout']."</td>
                                                <td>".$row['jumlah']."</td>
                                                <td>".$row['harga']."</td>
                                                <td>".$row['harga_kasur']."</td>
                                                <td>".$row['total_tagihan']."</td>
                                                <td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
                                                </tr>";
											}
										}
									?> 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
               
            </div>
        
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
