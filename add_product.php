<!DOCTYPE html>
<html>
<body>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
	body{
      margin: auto;
      background-image: url(https://i.pinimg.com/originals/6c/63/82/6c638291a66ddc93b86bf4f43c337701.jpg);
      background-size:  cover;
    }
   .add{
   	    width: 400px;
        padding: 25px;
        border-radius:8px;
        margin: auto;
   }
   .holder{
		width: 500px;
		margin: auto;
		transform: translateY(150%);
		background-color: #ffff;
		padding: 20px 0;
		border-radius: 8px;
	 }
   .TL{
        text-align: center;
        margin: 0;
        color: black;
    }
   .DHLM{
        width: 70%;
        border-radius: 2px;
        padding: 3px;
   }
	</style>
</head>
<body>
	<!-- làm giống form đăng ký tài khoản -->
<form method="POST" enctype="multipart/form-data">
	<div class="add">
	    <table class="holder">
		    <tr> 
			    <td class="TL"> Product ID</td>
			    <td><input type="text" name="product_id" placeholder="Product ID" class="DHLM"></td>
		    </tr>
		    <tr> 
			    <td class="TL"> Product Name</td>
			    <td><input type="text" name="product_name" placeholder="Product Name" class="DHLM"> </td>
		    </tr>
		    <tr> 
			    <td class="TL"> Product Price</td>
			    <td><input type="text" name="product_price" placeholder="Product Price" class="DHLM"> </td>
		    </tr>
		    <tr> 
			    <td class="TL"> Product Img</td>
			    <td><input type="file" name="product_img" class="DHLM"> </td>
		    </tr>
		    <tr> 
			    <td> </td>
			    <td><input type="submit" name="add_product" value="Thêm"> </td>
		    </tr>
	    </table>
	</div>
</form>

<?php 
$connect = mysqli_connect('localhost','root','','mydb');
				if(!$connect){
					echo "Kết nối thất bại";
				}

				if(isset($_POST['add_product'])){
					$product_id = $_POST['product_id'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					//Lấy ảnh từ thư mục bất kỳ của máy tính
					$product_img = $_FILES['product_img']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục luutruanh của htdoc
					$product_img_luutruanh = $_FILES['product_img']['luutruanh_name'];

					// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 
					move_uploaded_file($product_img_luutruanh, "Img/$product_img");

					//Thêm sản phẩm vào cơ sở dữ liệu
					$sql = "INSERT INTO product VALUES('$product_id','$product_name','$product_price','luutruanh/$product_img')";
					$result = mysqli_query($connect,$sql);
					if($result){
						echo"<script>alert('Thêm mới sản phẩm thành công') </script>";
						echo"<script> window.open('Index.php','_self') </script>";
					}
					else{
						echo"<script>alert('Thêm mới lỗi') </script>";
					}
				}
?>
</body>
</body>
</html>