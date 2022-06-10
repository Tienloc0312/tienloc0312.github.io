<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.Web{
            width:100%;
            height: auto;
        }
        .Header {
            width: 100%;
            height: 10%;
            border: 1px solid black;
        }
        .Up {
            background-color: #dc3545;
            width: 100%;
            height: 10%;
            border: 1px solid black;
        }
        .Up ul {
            list-style: none;
        }
        .Up ul li {
            display: inline-block;
            margin: 0 auto;
            font-size: 20px;
            color: #ffffff;
            padding-right: 200px;
        }
        .Up p{
            padding-left:70px;
        }
        .Down{
            height:20%;
            width :100%;

        }
        .Down ul li {
            list-style: none;
            display: inline-block;
            margin: auto
        }
        .logo{
            padding-right:100px;
            vertical-align : middle;
            height: 100px;
            width: 150px;
        }
        .search {
            height: 35px;
            width: 500px;
            border-radius: 5px;
        }
        .search input[type=text] {
            width: 300px;
            height: 30px
        }
        .search input[type=submit] {
            height: 30px
        }
        .mainheader {
            background-color: #dc3545;
            height: 66px;
            border: 1px solid black;
        }
        .mainheader ul li {
            list-style: none;
            display: inline-block;
            margin: auto;
            margin-left: 50px;
            padding-right: 50px;    
        }
        .mainheader ul li a {
            text-decoration: none;
            font-size: 24px;
            margin: 5px;
            padding: 15px;
            color: #ffffff;
        }
        .mainheader ul li:hover {
            background-color: black;
            color: red
        }
         .content {
            height: 2000px;
            border: 1px solid black;
            display: flex;
        }
        .left {
            background-color: #dc3545;
            height: 100%;
            border: 1px solid black;
            float: left;
            width: 30%;
        }
        .left >p {
            background: white;
            font-size: 20px;
            font-family: Arial;
            text-align: center;
        }
        .categoty {
            background-color: #dc3545;
            height: 500px;
           
        }
        .categoty ul li {
            list-style: none;
            margin: auto;
            margin-left: 20px;
            line-height:1.5;
                
        }

        .categoty ul li a {
            text-decoration: none;
            font-size: 20px;
            margin: 5px;
            padding: 15px;
            color: #ffffff;
        }

        .categoty ul li:hover {
            background-color: black;
            color: red
        }
        .right {
            width: 80%;
            height: 100%;
            background-color: white;
            border: 1px solid double black;
            float: right;
        }
        .products_box{
            width:780px;
            text-align:center;
            margin-left:30px;
            margin-bottom:10px;
        }
	</style>
</head>
<body>
    <div class=" Web">
        <div class="Header">
            <div class="Up">
                <ul>
                    <li><p>Trùm giày thể thao Adidas - Capvirgo.com</p></li>
                    <li>0971062641</li>
                    <li>T2-CN : 8h-21h30</li>
                </ul>
            </div>
            <div class="Down">
                <ul>
                    <li class="logo">
                        <img src="luutruanh/logo.jpg"/>
                    </li>
                    <li class="search">
                        <form method="get" action="search.php">
                            <input type="text" name="user_query" placeholder="Search a Product" />
                            <input type="submit" name="search" value="search" />
                        </form>
                    </li>
                </ul>
            </div>
            <div class="mainheader">
                <ul>
                    <li><a href="http://localhost:8080/PBIT17102/Index.php">Trang chủ</a></li>
                    <li><a href="https://www.thegioididong.com/">Giới Thiệu</a></li>
                    <li><a href="http://localhost:8080/PBIT17102/login.php">Đăng Nhập</a></li>
                    <li><a href="http://localhost:8080/PBIT17102/register.php">Đăng ký</a></li>
                    <li><a href="http://localhost:8080/PBIT17102/add_product.php">Thêm Sản Phẩm</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="left">
                <p>DANH MỤC SẢN PHẨM</p>
                <div class="categoty">
                    <ul>
                        <li><a href="">Jordan</a></li>
                        <li><a href="">Giày Nike</a></li>
                        <li><a href="">Giày Puma</a></li>
                        <li><a href="">Vans</a></li>
                        <li><a href="">Giày MCqueen</a></li>
                        <li><a href="">Giày Louis Vuitton</a></li>
                        <li><a href="">Giày Versace</a></li>
                        <li><a href="">Giày Gucci</a></li>
                        <li><a href="">Giày Adidas</a></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <?php
                $connect = mysqli_connect('localhost','root','','mydb');
                if($connect){
                    echo " ";
                }
                else{
                    echo"Kết nối thất bại";}
                if (isset($_GET['search'])) {
                    $search = $_GET['user_query'];
                }
                ?>    
                <div class ="products_box">     
                    <h3> Kết quả tìm kiếm cho sản phẩm <?php $search ?> là: </h3>
                    <?php
                    $sql ="select * from product WHERE product_name LIKE '%{$search}%'";
                    $result = mysqli_query($connect,$sql);
                    /* tìm và trả về kết quả dưới dạng 1 mảng*/
                    while($row_product=mysqli_fetch_array($result)){
                        $product_id = $row_product['product_id'];
                        $product_name = $row_product['product_name'];
                        $product_price = $row_product['product_price'];
                        $product_img = $row_product['product_img'];
                        echo"
                        <div class='single_product'>
                        <h3>$product_name</h3>
                        <img src='$product_img' width='180' height='180' />
                        <p><b> Price:$product_price </b></p>
                        <a href='http://localhost:8080/PBIT17102/detail.php'>Details</a>
                        <a href='index.php?add_cart=$product_id'>
                        </a>            
                        </div>       
                        ";
                    }
                    ?>
                </div>
            </div>            
        </div>
    </div>
</body>
</html>