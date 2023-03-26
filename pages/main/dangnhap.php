<style type="text/css">


.login-box {
    margin-top: 75px;
    height: auto;
    
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
   
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {

    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
  
}

input[type=password] {
  
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}



input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}
</style>
<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];

			$_SESSION['id_khachhang'] = $row_data['id_dangky'];
			header("Location: index.php?quanly=giohang");
		}else{
			echo '<p style="color: red;">Email hoặc Mật khẩu sai ! Vui lòng nhập lại !</p>';
		}
	}
?>
<!-- <form action="" autocomplete="off" method="POST">
			<table width="50%" border="1" class="table-login" style="text-align: center;">
				<tr>
					<td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
				</tr>
				<tr>
					<td>Tài khoản</td>
					<td><input type="text" size="50" name="email" placeholder="Email..."></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
				</tr>
			</table>
</form> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Đăng nhập khách hàng
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" autocomplete="off" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" size="50" name="email" placeholder="Email..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Mật Khẩu</label>
                                <input type="password" size="50" name="password" placeholder="Mật khẩu..."class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                   
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                   
                                    <input type="submit" name="dangnhap"class="btn btn-outline-primary" value="Đăng nhập">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>



