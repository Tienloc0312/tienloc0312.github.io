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
   .resignter{
    
     padding: 25px;
     background-color: white;
     border: 1px solid rgb(209, 208, 208);
     border-radius:8px;
   }
   .table{
		 width: 500px;
		 margin: auto;
		 transform: translateY(150%);
		 background-color: #ffff;
		 padding: 20px 0;
		 border-radius: 8px;
	 }
   .dk{
     text-align: center;
     margin: 0;
     color: black;
    }
   .form-input{
     width: 70%;
     border-radius: 2px;
     padding: 3px;
   }
  </style>
</head>
<body>
<form method="POST">
			<div class="register">
			<table class="table">
				<tr>
					<td class="dk">User id:</td>
					<td><input type="text" class="form-input" placeholder="Userid" name="userid"></td>
				</tr>
				<tr>
					<td class="dk">Username:</td>
					<td><input type="text" class="form-input" placeholder="Username" name="username"></td>
				</tr>
				<tr>
					<td class="dk">Password</td>
					<td><input type="password" class="form-input" placeholder="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="form-input" name="register" value="Register"></td>
				</tr>
			</table>
		</div>
	   <?php 
	      $connect =mysqli_connect('localhost','root','','mydb');
	      if($connect){
	      	echo "kết nối thành công";
	      }
	      else{
	      	echo"Kết nối thất bại";
	      }
	      ////nếu click vào register thì mới thực hiện
	      if(isset($_POST['register'])){
            echo "ok";
	      	$userid = $_POST['userid'];
	      	$username= $_POST['username'];
	      	$password= $_POST['password'];
	      	$sql ="INSERT INTO user VALUES('$userid','$username','$password')";
	      	$result= mysqli_Query($connect,$sql);
	      if($result){
	      	echo "<br>";
	      	echo "<script> alert('thêm mới thành công')</script>";
	      	header("location:login.php");
	      }
	      else{
	      	echo "<script> alert('thêm mới thất bại')</script>";
	      }
	   }
	   ?>
</body>
</html>