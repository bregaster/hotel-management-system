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
                        <a  href="settings.php"><i class="fa fa-dashboard"></i> Status Kamar</a>
                    </li>
					<li>
                        <a  class="active-menu" href="room.php"><i class="fa fa-plus-circle"></i> Tambah Kamar</a>
                    </li>
                    <li>
                        <a  href="roomdel.php"><i class="fa fa-desktop"></i> Hapus Kamar</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Update Kamar <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tambah Kamar Baru
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                        <div class="form-group">
                                        <label>Nomor Kamar</label>
                                        <input name="noKamar" type="form-control" class="form-control" required>
                                    </div>
                            <div class="form-group">
                                            <label>Tipe Kamar</label>
                                            <select name="tipeKmr"  class="form-control" required>
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
                                            <select name="tipeKsr" class="form-control" required>
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
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 if(isset($_POST['add']))
							 {
                                        $no = $_POST['noKamar'];
										$room = $_POST['tipeKmr'];
										$bed = $_POST['tipeKsr'];
										$status = 'Y';
										
										$check="SELECT * FROM kamar WHERE no_kamar = '$no'";
										$rs = mysqli_query($con,$check);
										$data = mysqli_fetch_array($rs, MYSQLI_NUM);
										if($data[0] > 1) {
											echo "<script type='text/javascript'> alert('Kamar telah tersedia, tidak dapat ditambah lagi')</script>";
											
										}

										else
										{
							 
										
										$sql ="INSERT INTO kamar( no_kamar, kode_tipekamar, kode_kasur, status) VALUES ('$no','$room','$bed','$status')" ;
										if(mysqli_query($con,$sql))
										{
										 echo '<script>alert("Kamar telah ditambah") </script>' ;
										}else {
											echo '<script>alert("Sorry ! Sistem error") </script>' ;
										}
							 }
							}
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ROOMS INFORMATION
                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor Kamar</th>
                                            <th>Tipe Kamar</th>
											<th>Tipe Kasur</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
                                    include ('db.php');
                                        $sql = "SELECT A.no_kamar, A.status, B.nama_kamar, C.jenis_kasur FROM kamar A JOIN tipe_kamar B ON A.kode_tipekamar = B.kode_tipekamar JOIN tipe_kasur C ON C.kode_kasur = A.kode_kasur ORDER BY no_kamar ASC";
                                        $re = mysqli_query($con,$sql);
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['no_kamar'];
											if($id % 2 == 0) 
											{
												echo "<tr class=odd gradeX>
													<td>".$row['no_kamar']."</td>
													<td>".$row['nama_kamar']."</td>
                                                    <th>".$row['jenis_kasur']."</th>
                                                    <th>".$row['status']."</th>
												</tr>";
											}
											else
											{
												echo"<tr class=even gradeC>
													<td>".$row['no_kamar']."</td>
													<td>".$row['nama_kamar']."</td>
                                                    <th>".$row['jenis_kasur']."</th>
                                                    <th>".$row['status']."</th>
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
