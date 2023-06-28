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
    <title>SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
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
                    <a  class="active-menu"  href="settings2.php"><i class="fa fa-star-o"></i>Status Kamar</a>
                </li>
                <li>
                    <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Pesan Kamar</a>
                </li>
                <li>
                    <a href="payment.php"><i class="fa fa-qrcode"></i> Pembayaran</a>
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
                           Kamar <small> Tersedia</small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "SELECT A.no_kamar, A.kode_tipekamar, B.nama_kamar, C.jenis_kasur FROM kamar A JOIN tipe_kamar B ON A.kode_tipekamar = B.kode_tipekamar JOIN tipe_kasur C ON C.kode_kasur = A.kode_kasur WHERE status='Y' ORDER BY no_kamar ASC";
						$re = mysqli_query($con,$sql)
				?>
                <div class="row">
				
				
				<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['kode_tipekamar'];
											if($id == "SR") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
                                                            <i class='fa fa-users fa-5x'></i>
                                                            <h3>".$row['no_kamar']."</h3>
															<h3>".$row['jenis_kasur']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['nama_kamar']."

														</div>
													</div>
												</div>";
											}
											else if ($id == "MR")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
                                                            <i class='fa fa-users fa-5x'></i>
                                                            <h3>".$row['no_kamar']."</h3>
															<h3>".$row['jenis_kasur']."</h3>
														</div>
														<div class='panel-footer back-footer-green'>
															".$row['nama_kamar']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="LR")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-brown'>
														<div class='panel-body'>
                                                            <i class='fa fa-users fa-5x'></i>
                                                            <h3>".$row['no_kamar']."</h3>
															<h3>".$row['jenis_kasur']."</h3>
														</div>
														<div class='panel-footer back-footer-brown'>
															".$row['nama_kamar']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="EXR")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-red'>
														<div class='panel-body'>
                                                            <i class='fa fa-users fa-5x'></i>
                                                            <h3>".$row['no_kamar']."</h3>
															<h3>".$row['jenis_kasur']."</h3>
														</div>
														<div class='panel-footer back-footer-red'>
															".$row['nama_kamar']."

														</div>
													</div>
												</div>";
											
											}
										}
									?>
                    
                </div>
                <!-- /. ROW  -->
                
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
