<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>
<?php
	if(!isset($_GET["rid"])){	
		header("location:index.php");
	}else{
		$curdate=date("Y/m/d");
		include ('db.php');
		$id = $_GET['rid'];
		$sql ="SELECT * FROM reservasi A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN tipe_kamar C ON A.kode_tipekamar = C.kode_tipekamar JOIN tipe_kasur D ON A.kode_kasur=D.kode_kasur JOIN kota E ON B.kode_kota=E.kode_kota JOIN negara F ON E.kode_negara = F.kode_negara where A.kode_tamu = '$id'";
		$re = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($re)){
			$fname = $row['namaDepan'];
			$lname = $row['namaBelakang'];
			$email = $row['email'];
			$nat = $row['nama_negara'];
			$country = $row['nama_kota'];
			$Phone = $row['no_telp'];
			$tkamar = $row['kode_tipekamar'];
			$tkasur = $row['kode_kasur'];
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
    <title>Administrator	</title>
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
					<a ref="home.php"><i class="fa fa-dashboard"></i>Status Pesan</a>
				</li>
				<li>
					<a href="settings2.php"><i class="fa fa-star-o"></i>Status Kamar</a>
				</li>
				<li>
					<a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i>Pesan Kamar</a>
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
                        Pesanan Kamar<small>	<?php echo  $curdate; ?> </small>
                    </h1>
                </div>
				<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Konfirmasi Pesanan
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>DESKRIPSI</th>
                                        <th>INFORMASI</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th><?php echo $fname." ".$lname; ?> </th>
                                    </tr>
									<tr>
                                        <th>Email</th>
                                        <th><?php echo $email; ?> </th>
                                    </tr>
									<tr>
                                        <th>Negara </th>
                                        <th><?php echo $nat; ?></th>
                                    </tr>
									<tr>
                                        <th>Kota </th>
                                        <th><?php echo $country;  ?></th>
                                    </tr>
									<tr>
                                       	<th>No Telepon </th>
                                        <th><?php echo $Phone; ?></th>
                                    </tr>
									<tr>
                                        <th>Jenis Kamar </th>
                                        <th><?php echo $troom; ?></th>
                                    </tr>
									<tr>
                                        <th>Jumlah Pesan </th>
                                        <th><?php echo $nroom; ?></th>
                                    </tr>
									<tr>
                                        <th>Jenis Kasur </th>
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
                                        <th>Lama Tinggal</th>
                                        <th><?php echo $days; ?></th>
                                    </tr>
									<tr>
                                        <th>Status Pesanan</th>
                                        <th><?php echo $sta; ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <form method="post">
								<div class="form-group">
									<label>Pilih Kamar Anda</label>
									<select name="kamar"class="form-control">
										<option value selected>	
											<?php include ("db.php");
												$statkmr = "Y";
												$sql = "SELECT * FROM kamar WHERE kode_tipekamar ='$tkamar' AND kode_kasur ='$tkasur' AND status='$statkmr'";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_array($result)){
													echo "<option value='$row[no_kamar]'>$row[no_kamar]</option>";
												}
											?>
										</option>
									</select>
								</div>
								<div class="form-group">
									<label>Pilih Konfirmasi</label>
									<select name="conf"class="form-control">
										<option value selected>	</option>
										<option value="accepted">accepted</option>
									</select>
								</div>
								<input type="submit" name="co" value="accepted" class="btn btn-success">
							</form>
                        </div>
                    </div>
					</div>
					
					<?php
						$rsql = "SELECT * FROM kamar A JOIN tipe_kamar B ON A.kode_tipekamar = B.kode_tipekamar JOIN tipe_kasur C ON C.kode_kasur = A.kode_kasur ORDER BY no_kamar ASC";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['kode_tipekamar'];
							$b = $rrow['kode_kasur'];
							$p = $rrow['status'];
							if($s=="SR" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="MR")
							{
								$gh = $gh + 1;
							}
							if($s=="LR" )
							{
								$sr = $sr + 1;
							}
							if($s=="EXR" )
							{
								$dr = $dr + 1;
							}
							
						
						}
						?>
						
						<?php
						$csql ="SELECT * FROM pembayaran A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN reservasi C ON B.kode_tamu = C.kode_tamu";
						$cre= mysqli_query($con,$csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['kode_tipekamar'];
							
							if($cs=="SR"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="MR" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="LR" )
							{
								$csr = $csr + 1;
							}
							if($cs=="EXR" )
							{
								$cdr = $cdr + 1;
							}
							
						
						}
				
					?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Detail Kamar Tersedia
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Small Room</b></td>
								<td><button type="button" class="btn btn-success btn-circle"><?php  
									$f1 =$sc - $csc;
									if($f1 <=0 )
									{	$f1 = "NO";
										echo $f1;
									}
									else{
											echo $f1;
									}
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Medium Room</b>	 </td>
								<td><button type="button" class="btn btn-success btn-circle"><?php 
								$f2 =  $gh -$cgh;
								if($f2 <=0 )
									{	$f2 = "NO";
										echo $f2;
									}
									else{
											echo $f2;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Large Room</b></td>
								<td><button type="button" class="btn btn-success btn-circle"><?php
								$f3 =$sr - $csr;
								if($f3 <=0 )
									{	$f3 = "NO";
										echo $f3;
									}
									else{
											echo $f3;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Extra Large Room</b>	 </td>
								<td><button type="button" class="btn btn-success btn-circle"><?php 
								
								$f4 =$dr - $cdr; 
								if($f4 <=0 )
									{	$f4 = "NO";
										echo $f4;
									}
									else{
											echo $f4;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Total Kamar</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f5 =$r-$cr; 
								if($f5 <=0 )
									{	$f5 = "NO";
										echo $f5;
									}
									else{
											echo $f5;
									}
								 ?> </button></td> 
							</tr>
						</table>
						
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
                <!-- /. ROW  -->
				
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

<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							
							 
							
							if($st=="accepted")
							{
								$urb = "UPDATE reservasi SET status='$st' WHERE kode_tamu = '$id'";
									
								if($f1=="NO" )
								{
									echo "<script type='text/javascript'> alert('Sorry! Small Room Tidak Tersedia ')</script>";
								}
								else if($f2 =="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Medium Room Tidak Tersedia')</script>";
										
									}
									else if ($f3 == "NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Large Room Tidak Tersedia')</script>";
									}
										else if($f4=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
										}
										
										else if( mysqli_query($con,$urb))
											{	
												//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
												//echo "<script type='text/javascript'> window.location='home.php'</script>";
												$sql3 = "SELECT * FROM pembayaran A JOIN tamu B ON A.kode_tamu = B.kode_tamu JOIN reservasi C ON B.kode_tamu = C.kode_tamu JOIN tipe_kamar D ON C.kode_tipekamar = D.kode_tipekamar JOIN tipe_kasur E ON C.kode_kasur = E.kode_kasur";
												$res = mysqli_query($con,$sql3);
												if($data2 = mysqli_fetch_array($res)) {
													$hrgkmr = $data2['harga'];
													$hrgksr = $data2['harga_kasur'];
													$total = $hrgkmr + $hrgksr;
													$type_of_room = 0;       
													if($s=="SR")
													{
														$type_of_room = 185500;
													}
													else if($s=="MR")
													{
														$type_of_room = 257850;	
													}
													else if($s=="LR")
													{
														$type_of_room = 321500;
													}
													else if($s=="MR")
													{
														$type_of_room = 425999;
													}

													if($b=="Single Bed")
													{
														$type_of_bed = 15000;
													}
													else if($b=="2 Single Bed")
													{
														$type_of_bed = 25000;
													}
													else if($b=="Double Bed")
													{
														$type_of_bed = 27000;
													}
													else if($b=="King Bed")
													{
														$type_of_bed = 45000;
													}
													else if($b=="Super King Bed")
													{
														$type_of_bed = 70000;
													}

													$ttot = $hrgkmr * $days;
													$btot = $hrgksr *$days;
													
													$fintot = $ttot + $btot ;
														
														//echo "<script type='text/javascript'> alert('$count_date')</script>";
													$psql = "INSERT INTO pembayaran(kode_tamu, total_tagihan) VALUES ('$id','$fintot')";
													if(mysqli_query($con,$psql))
													{	
														$notfree="N";
														$rpsql = "UPDATE kamar SET status='$notfree' WHERE kode_tipekamar=(select kode_tipekamar from reservasi where kode_tamu=$id) AND kode_kasur=(select kode_kasur from reservasi where kode_tamu=$id) AND status='Y' AND no_kamar = '$_POST[kamar]' ";
														if(mysqli_query($con,$rpsql))
														{
														echo "<script type='text/javascript'> alert('Pemesanan Dikonfirmasi')</script>";
														echo "<script type='text/javascript'> window.location='roombook.php'</script>";
														}
														
														
													}
												}
												
												
											}
									
                                        
							}	
					
						}		
						?>