<?php
    include ("db.php");
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
    <!-- JQuery Styles-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
    function getKota(val) {
	    $.ajax({
	        type: "POST",
	        url: "getKota.php",
	        data:'negara='+val,
	        success: function(data){
		        $("#listKota").html(data);
	        }
	    });
    }
    </script>
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
                            REGISTRASI KAMAR <small></small>
                        </h1>
                    </div>
                </div>                  
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                IDENTITAS PELANGGAN
                            </div>
                            <div class="panel-body">
						    <form name="form" method="post">
                                <div class="form-group">
                                    <label>Title*</label>
                                    <select name="title" class="form-control" required >
									    <option value selected ></option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Miss.">Miss.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
									    <option value="Prof.">Prof.</option>
									    <option value="Rev .">Rev .</option>
									    <option value="Rev . Fr">Rev . Fr .</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input name="noKTP" class="form-control" required>           
                                </div>
							    <div class="form-group">
                                    <label>First Name</label>
                                    <input name="namaDpn" class="form-control" required>                  
                                </div>
							    <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="namaBlkg" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input name="alamat" class="form-control" required>             
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input name="noTelp" type ="text" class="form-control" required>       
                                </div>
							    <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <label>Negara</label>
                                    <select name="negara" class="form-control" id="listNegara" onChange="getKota(this.value);">
										<option value="">Pilih Negara</option>
                                        <?php
                                        $sql = "SELECT * FROM negara";
                                        $result = mysqli_query( $con, $sql);
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            echo "<option value='$row[kode_negara]'>$row[nama_negara]</option>";
                                        }
                                        ?>
                                    </select>
								</div>
                                <div class="form-group">
                                    <label>Kota</label>
                                    <select name="kota" class="form-control" id="listKota">
                                    <option value="">Pilih Kota</option>
                                    </select>
								</div>
                            </div>                
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    RESERVATION INFORMATION
                                </div>
                                <div class="panel-body">
								    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <select name="tipeKamar"  class="form-control" required>
										    <option value selected >
                                                <?php include ("db.php");
                                                $sql = "SELECT * FROM tipe_kamar";
                                                $result = mysqli_query( $con, $sql);
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                    echo "<option value='$row[kode_tipekamar]'>$row[nama_kamar]</option>";
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
							        <div class="form-group">
                                        <label>Tipe Kasur</label>
                                        <select name="tipeKasur" class="form-control" required>
										    <option value selected >
                                                <?php include ("db.php");
                                                $sql = "SELECT * FROM tipe_kasur";
                                                $result = mysqli_query( $con, $sql);
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                    echo "<option value='$row[kode_kasur]'>$row[jenis_kasur]</option>";
                                                }
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Orang</label>
                                        <input name="jumlah" type="form-control" class="form-control" required>
                                    </div>
							        <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="cin" type ="date" class="form-control">        
                                    </div>
							        <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="cout" type ="date" class="form-control">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below this code 
                                    <?php 
                                    $Random_code=rand(); 
                                    echo$Random_code; 
                                    ?> 
                                </p><br />
						        <p>Enter the random code<br /></p>
							    <input  type="text" name="code1" title="random code" />
							    <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
						        <input type="submit" name="submit" class="btn btn-primary">
						        <?php
							    if(isset($_POST['submit'])){
							        $code1=$_POST['code1'];
                                    $code=$_POST['code'];
							        if($code1!="$code") {
							            $msg="Invalide code"; 
							        }else{
                                        include ("db.php");
                                        $check = "SELECT * FROM tamu WHERE email ='$_POST[email]'";
									    $rs = mysqli_query($con,$check);
									    $data = mysqli_fetch_array($rs);
									    if($data[0] > 1) {
										    echo "<script type='text/javascript'> alert('User Already in Exists')</script>";	
									    }else{
                                            $start = strtotime($_POST['cin']);
                                            $end = strtotime($_POST['cout']);
                                            $lama = ceil(abs($end - $start) / 86400);
										    $new ="booking";
										    $newUser="INSERT INTO tamu (no_ktp, namaDepan, namaBelakang, alamat, no_telp, email, kode_kota) VALUES ('$_POST[noKTP]','$_POST[namaDpn]','$_POST[namaBlkg]','$_POST[alamat]','$_POST[noTelp]','$_POST[email]','$_POST[kota]')";
                                            if(mysqli_query($con,$newUser)){
                                                $last_id = mysqli_insert_id($con);
                                                $newBook= "INSERT INTO reservasi(kode_tamu, waktu_checkin, waktu_checkout, lama_tinggal, kode_tipekamar, kode_kasur, jumlah, status) VALUES ('$last_id','$_POST[cin]','$_POST[cout]','$lama','$_POST[tipeKamar]','$_POST[tipeKasur]','$_POST[jumlah]','$new')";
                                                if (mysqli_query($con,$newBook)){
                                                    $id = $row['kode_reservasi'];
                                                    echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
                                                    echo "<a href=succes.php?skid=".$last_id."></a>";
                                                }else{
                                                    echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
                                                }
							                }
                                        }
                                        $msg="Your code is correct";
                                    }
                                }
							    ?>
                            </div>
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
