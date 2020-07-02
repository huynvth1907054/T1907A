<?php


$s_name = $s_price  = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['name'])) {
		$s_name = $_POST['name'];
	}

	if (isset($_POST['price'])) {
		$s_price = $_POST['price'];
	}

	

	$s_name = str_replace('\'', '\\\'', $s_name);
	$s_price    = str_replace('\'', '\\\'', $s_price);

	if ($s_id != '') {
		//update
		$sql = "update maytin set name = '$s_name', price = '$s_price',  where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into maytin(name, price) value ('$s_name', '$s_price')";
	}

	// echo $sql;

	execute($sql);

	header('Location: index.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from maytin where id = '.$id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_name = $std['name'];
		$s_price      = $std['price'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Sport Store</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<style type="text/css">
* {
  margin: 0;
  padding: 0;
}
html, body {
margin: 0;
padding: 0;
font-family: 'Helvetica', 'Arial'; /* initial fonts */
}
.top-bar {
width: 100%;
background: #F1F1F1; /* light gray */
border-bottom: 1px solid #D4D4D4; /* dark gray "underline" */
height: 25px;
}
.normal-wrapper {
width: 100%;
margin: 0 auto;
padding: 15px 40px;
overflow: auto;
border-bottom: 3px solid black;
background: white;
}
.logo-icon {
color: #000000;
font-size: 60pt;
float: left;
}
h1 {
float: left;
margin: 21px 0 0 25px;
}
#navbar {
list-style-type: none; /* remove bullet points */
margin: 29px 0 0 0;
padding: 0; float: left;
font-size: 16pt;
margin-left: 260px;
}
#navbar li {
display: inline; /* make items horizontal */
}
#navbar li a:link, #navbar li a:visited, #navbar li a:active {
text-decoration: none; /* remove underline */
color: #000000;
padding: 0 16px 0 10px; /* space links apart */
margin: 0;
border-right: 2px solid #B4B4B4; /* divider */
}
#navbar li a:link.last-link {
/* remove divider */
border-right: 0px;
}
#navbar li a:hover {
/* change color on hover (mouseover) */
color: #EB6361;
}
#logo-container{
  float: left;
  margin-left: 20px;
}
#login{
  width: 3320px;
  height: 130px;
  border: 1px solid black;
}
  .shop-item {
    margin: 30px;
}

.shop-item-title {
    display: block;
    width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 1.5em;
    color: #333;
    margin-bottom: 15px;
}

.shop-item-image {
    height: 250px;
}

.shop-item-details {
    display: flex;
    align-items: center;
    padding: 5px;
}

.shop-item-price {
    flex-grow: 1;
    color: #333;
}

.shop-items {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;

}
</style>
 <body>

<div class="normal-wrapper">

  <div id="logo-container">
 <i class="fa fa-flag"></i> <h1>Mobile World</h1>
</div>
<ul id="navbar">
 <li><a href="">Home</a></li>
 <li><a href="">Contact</a></li>
 <li><a href="">My basket</a></li>
 <li><a href="" class="last-link">Sign in</a></li>
 <i class="fa fa-search "></i>
</ul>
</div>
	<div class="shop-items">
                <div class="shop-item categorya">
                    <span class="shop-item-title">Redmi note 5 pro</span>
                    <a href="">
                    <img class="shop-item-image" src="image/redmi5.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$807.500</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item categoryb">
                    <span class="shop-item-title">Redmi note 6 pro</span>
                    <a href="">
                    <img class="shop-item-image" src="image/redmi6.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$522.99</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button"type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item categoryb">
                    <span class="shop-item-title">Redmi note 8 pro</span>
                    <a href="">
                    <img class="shop-item-image" src="image/redmi8.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$522.000</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item categorya">
                    <span class="shop-item-title">Iphone 11 pro </span>
                    <a href="">
                    <img class="shop-item-image" src="image/iphone11.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$667.300</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title"> Iphone XS max pro</span>
                    <a href="">
                    <img class="shop-item-image" src="image/iphonex.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$712.000</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Iphone 8 pro</span>
                    <a href="">
                    <img class="shop-item-image" src="image/iphone8.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$632.500</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Oppo F3 max</span>
                    <a href="">
                    <img class="shop-item-image" src="image/oppof3.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$632.500</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Oppo F5 2019</span>
                    <a href="">
                    <img class="shop-item-image" src="image/oppof5.jpg"></a>
                    <div class="shop-item-details">
                        <span class="shop-item-price">$632.500</span>
                        <a href="input.php"><button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button></a>
                    </div>
                </div>
            </div>
            
</body>
</html>