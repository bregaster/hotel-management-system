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
    <title>Administrator Alexis</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Profil Saya</a>
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
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i>Status Pesan</a>
                    </li>
                    <li>
                        <a href="settings2.php"><i class="fa fa-star-o"></i>Status Kamar</a>
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
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
				</ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Pesan Kamar </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
					include ('db.php');
					$sql = "select * from reservasi";
					$re = mysqli_query($con,$sql);
					$c =0;
					while($row=mysqli_fetch_array($re) ){
						$new = $row['status'];
						if($new=="booking"){
                            $c = $c + 1;
                        }
                    }	
				?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											    <button class="btn btn-default" type="button">
												    New Room Bookings  <span class="badge"><?php echo $c ; ?></span>
											    </button>
											    </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama</th>
                                                                    <th>Email</th>
                                                                    <th>Negara</th>
											                        <th>Kamar</th>
											                        <th>Kasur</th>
											                        <th>Jumlah Orang</th>
											                        <th>Check In</th>
											                        <th>Check Out</th>
											                        <th>Status</th>
											                        <th>More</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  
									                        <?php
									                            $tsql = "SELECT * FROM reservasi A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN tipe_kamar C ON A.kode_tipekamar = C.kode_tipekamar JOIN tipe_kasur D ON A.kode_kasur=D.kode_kasur JOIN kota E ON B.kode_kota=E.kode_kota JOIN negara F ON E.kode_negara = F.kode_negara";
                                                                $tre = mysqli_query($con,$tsql);
                                                                $no = 1;
									                            while($trow=mysqli_fetch_array($tre) ){	
                                                                    $co =$trow['status']; 
										                            if($co=="booking"){
											                            echo"<tr>
												                            <th>".$no."</th>
												                            <th>".$trow['namaDepan']." ".$trow['namaBelakang']."</th>
												                            <th>".$trow['email']."</th>
												                            <th>".$trow['nama_negara']."</th>
												                            <th>".$trow['nama_kamar']."</th>
                                                                            <th>".$trow['jenis_kasur']."</th>
                                                                            <th>".$trow['jumlah']."</th>
                                                                            <th>".$trow['waktu_checkin']."</th>
                                                                            <th>".$trow['waktu_checkin']."</th>
                                                                            <th>".$co."</th>
												                            <th><a href='roombook.php?rid=".$trow['kode_tamu']." ' class='btn btn-primary'>Action</a></th></tr>";
                                                                            $no = $no + 1;	
                                                                    }
                                                                    
									                            }
									                        ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End  Basic Table  --> 
                                            </div>
                                        </div>
                                    </div>
								    <?php
                                        $rsql = "SELECT * FROM reservasi";
								        $rre = mysqli_query($con,$rsql);
								        $r =0;
								        while($row=mysqli_fetch_array($rre) ){		
										    $br = $row['status'];
										    if($br=="accepted"){
											    $r = $r + 1;
                                            }
								        }
                                    ?>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
											    <button class="btn btn-primary" type="button">
												    Booked Rooms  <span class="badge"><?php echo $r ; ?></span>
											    </button>
											    </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">
										        <?php
										            $msql = "SELECT * FROM reservasi JOIN tipe_kamar ON reservasi.kode_tipekamar = tipe_kamar.kode_tipekamar JOIN tamu ON reservasi.kode_tamu = tamu.kode_tamu";
										            $mre = mysqli_query($con,$msql);
                                                    while($mrow=mysqli_fetch_array($mre) ){		
											            $br = $mrow['status'];
											            if($br=="accepted"){
												            $fid = $mrow['kode_tamu'];
                                                    echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$mrow['namaDepan']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														    <a href=show.php?sid=".$fid ."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													    Show
													                    </button></a>
															        ".$mrow['nama_kamar']."
														        </div>
													        </div>	
											            </div>";
											            }
										            }
										        ?>
                                           
										</div>
										
                                    </div>
									
                                </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /. ROW  -->
				
            </div>
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
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>