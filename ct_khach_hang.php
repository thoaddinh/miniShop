<html>
<head>

<link href="assets/js/bootstrap.min.js" rel="stylesheet"/>
<link href="assets/js/jquery.min.js" rel="stylesheet"/>
<link href="assets/css/bootstrap.css" rel="stylesheet">
 <link href="assets/css/style_chitiet_khachhang.css" rel="stylesheet"/>
 <link  href="./assets/fontawesome/css/all.css" rel="stylesheet"/>
</head>
<body>
<?php
require('Connect.php');

	if(isset($_GET['makh']))
		$makh = $_GET['makh']; 
	else $makh = "KH002";

	$sql = "SELECT *
	        FROM khach_hang
			WHERE makh ='".$makh."'";

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) <> 0){
		while($rows= mysqli_fetch_array($result))
		{
			 
?>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                             <img src="assets/img/khach_hang/<?php echo $rows['Hinh']?>" alt="">
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                                    <h5> Mã khách hàng :  <?php echo $rows['makh']?></h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tên khách hàng </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input  name ="hoten" value="<?php echo $rows['hoten']?>" /></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Điện thoại </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="dienthoai" value="<?php echo $rows['dienthoai']?>" /></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Địa chỉ</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="diachi" value="<?php echo $rows['diachi']?> "/></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="email" value="<?php echo $rows['email']?>" /></p>
                                            </div>
                                        </div>
										 <div class="row">
                                            <div class="col-md-6">
                                                <label>Ghi chú</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="ghichu" value="<?php echo $rows['ghichu']?>" /></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
						<div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-center" type="submit" name="capnhat"><i class="fas fa-check-circle"></i> Cập Nhật</button>
              
                            </div>
                      </div>
                    </div>
                </div>
            </form>           
</div>
</body>
</html>
<?php
		}
	}
	
	if(isset($_POST['capnhat']))
			{
			$ghichu = '';
			$hoten = $_POST['hoten'];
			$diachi =$_POST['diachi'];
			$dienthoai =$_POST['dienthoai'];
		    $email =$_POST['email'];
			$ghichu =$_POST['ghichu'];
			$sql ="UPDATE khach_hang
			      SET diachi ='$diachi',dienthoai ='$dienthoai',email ='$email',ghichu ='$ghichu',hoten ='$hoten'
				  WHERE makh ='".$makh."'";
				  $re = mysqli_query($conn, $sql);
				  if(mysqli_affected_rows($conn))
				  {
					 	echo "<p style='text-align:center'>Sửa thành công</p>";
				  }
				  else
				  {
				  	echo "<p style='text-align:center'>Sửa thất bại</p>";
				  }
		}

	?>
