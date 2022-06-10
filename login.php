<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style type="text/css">
    body{
      margin: auto;
      background-color: rgb(214, 248, 248);
      background-image: url(https://i.pinimg.com/originals/6c/63/82/6c638291a66ddc93b86bf4f43c337701.jpg);
      background-size:  cover;
    
    }
    	.login{
    		background-color: #fff;
    		width: 400px;
    		padding: 25px;
    		border-radius: 8px;
    		margin: auto;
    		transform: translateY(150%);
    	}
    	button a{
    		text-decoration: none;
    		color: black;
    	}
    </style>
</head>
<body>
<form method ="POST">
	<div class="login">
		<table>
			<tr>
				<td>UserName</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="login"></td>
				<td>
					<button type="submit" name="register">
					    <a href="http://localhost:8080/PBIT17102/register.php">Register</a>
				    </button>
				</td>
			</tr>
		</table>

	</div>
	<?php 
	//Kết nối theo Mysqli procedural
	$connect = mysqli_connect('localhost','root','','mydb');
	if($connect){
		echo " ";
	}
	else{
		echo"Kết nối thất bại";
	}
    // Nếu click vào nút login thì mới thực hiện 
    if(isset($_POST['login'])){
    	$username= $_POST['username'];
    	$password =$_POST['password'];
    	// Truy vấn từ bảng user cột username = giá trị username nhập từ form và cột password = giá trị password nhập từ form
    	$sql = "SELECT * FROM user WHERE username ='$username' AND password = '$password'";
    	// Thực thi truy vấn
    	$result = mysqli_query($connect, $sql);
    	// Trả về kết quả , chính là các dòng được truy vấn
    	$row = mysqli_num_rows($result);
    	// Nếu $row > 0 --> có trên 1 dòng trong CSDL trùng với dữ liệu nhập vào form -> đăng nhập thành công 
    if($row>0){
	 	echo "<script> alert('Đăng nhập thành công')</script>";
	 	header("location: Index.php");
	 	//Lưu tên đăng nhập lại vào biến toàn cục $_SESSION
	 	$_SESSION['username'] = $username;
	}
	else{
	 	echo"<script>alert('Tên đăng nhập hoặc mật khẩu không đúng')</script>";
	}
	}
	?>
</form>
</body>
</html>