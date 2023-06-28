<?php
    session_start();  
    if(!isset($_SESSION["user"]))
    {
     header("location:index.php");
    }
?>
<?php
    ob_start();
		if(!isset($_GET["skid"]))
		{
				
			 header("location:index.php");
		}
		else {
				include ('db.php');
				$id = $_GET['skid'];
				$sql ="SELECT * FROM reservasi A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN tipe_kamar C ON A.kode_tipekamar = C.kode_tipekamar JOIN tipe_kasur D ON A.kode_kasur=D.kode_kasur JOIN kota E ON B.kode_kota=E.kode_kota JOIN negara F ON E.kode_negara = F.kode_negara where A.kode_reservasi = '$id'";
				$re = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($re))
				{
					$fname = $row['namaDepan'];
					$lname = $row['namaBelakang'];
					$email = $row['email'];
					$nat = $row['nama_negara'];
					$country = $row['nama_kota'];
					$Phone = $row['no_telp'];
					$troom = $row['nama_kamar'];
					$nroom = $row['jumlah'];
					$bed = $row['jenis_kasur'];
					$cin = $row['waktu_checkin'];
					$cout = $row['waktu_checkout'];
					$sta = $row['status'];
					$days = $row['lama_tinggal'];
				}
	}
			?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVASI HOTEL ALEXIS</title>
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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li>
                    <a href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                </li>
				</ul>
            </div>
        </nav>
        <div id="page-wrapper" >
            <div id="page-inner">
			    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            REGISTRASI SUKSES ! <small></small>
                        </h1>
                    </div>
                </div>  
                <div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Informasi Pesanan Anda
                        </div>
                        <div class="panel-body">	
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESKRIPSI</th>
                                            <th>INFORMASI</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $fname." ".$lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Nationality </th>
                                            <th><?php echo $nat; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone No </th>
                                            <th><?php echo $Phone; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Type Of the Room </th>
                                            <th><?php echo $troom; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>No Of the Room </th>
                                            <th><?php echo $nroom; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Meal Plan </th>
                                            <th><?php echo $meal; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Bedding </th>
                                            <th><?php echo $bed; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $cin; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-out Date</th>
                                            <th><?php echo $cout; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>No of days</th>
                                            <th><?php echo $days; ?></th> 
                                        </tr>
										<tr>
                                            <th>Status Level</th>
                                            <th><?php echo $sta; ?></th> 
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name="co" value="OK" class="btn btn-success">
                        </div>
                    </div>
				</div>                
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
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>
