<?php
	include("include/db_connect.php");
     include("function/functions.php");
    session_start();
    
    
    $id = clear_string($_GET["id"]);
    $action = clear_string($_GET["action"]);
     
   switch ($action) {
 
        case 'clear':
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);     
        break;
         
        case 'delete':     
        $delete = mysql_query("DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);        
        break;
         
    }

if (isset($_POST["submitdata"]))
{
    
    $_SESSION["order_delivery"] = $_POST["order_delivery"];
    $_SESSION["order_fio"] = $_POST["order_fio"];
    $_SESSION["order_email"] = $_POST["order_email"];
    $_SESSION["order_phone"] = $_POST["order_phone"];
    $_SESSION["order_address"] = $_POST["order_address"];
    $_SESSION["order_note"] = $_POST["order_note"];
    
    
    header("Location: cart.php?action=completion");
}

$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);

If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
 
do
{ 
$int = $int + ($row["price"] * $row["cart_count"]); 
}
 while ($row = mysql_fetch_array($result));
  
 
   $itogpricecart = $int;
}
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/animated-estor.js"></script>
    
    
<title>Интернет-Магазин Цифровой Техники</title>   
</head>
<body>
  <div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-left">
<div class="container">
 
        
<?php

    $action = clear_string($_GET["action"]);
    switch ($action){
        
        case 'oneclick':
        
        echo '
        
            <div class="row a_create_link">
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="active" href="">1. Корзина товаров</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="" href="cart.php?action=confirm">2. Контактная информация</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="" href="">3. Завершение</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
              <div id="style_button_clear">
                <a class="" href="cart.php?action=clear">Очистить</a> 
                </div>  
              </div>
            </div>  
              
              <div id="line_basket_tovar">
                 <p>Шаг 1 из 3</p>
              </div>
        ';
        
        
        
        $result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);
 
            If (mysql_num_rows($result) > 0)
            {
            $row = mysql_fetch_array($result);
            
            do
            {
             
            $int = $row["cart_price"] * $row["cart_count"];
            $all_price = $all_price + $int;
             
            if  (strlen($row["image"]) > 0 && file_exists("./uploads_images/".$row["image"]))
            {
            $img_path = './uploads_images/'.$row["image"];
            $max_width = 200; 
            $max_height = 190; 
             list($width, $height) = getimagesize($img_path); 
            $ratioh = $max_height/$height; 
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh, $ratiow); 
             
            $width = intval($ratio*$width); 
            $height = intval($ratio*$height);    
            }else
            {
            $img_path = "/images/none.png";
            $width = 120;
            $height = 105;
            } 
            //Вывод товаров в корзину
        echo '
        <div class="container ">
						<div class="row range_basket_tovar_count align-items-center">
							<div class="col-12 col-md-6 text-center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/></div>
							<div class="col-12 col-md-6 text-justify">
								<h3><p class="range_basket_tovar_count_center"><a href="view_content.php?id="'.$row["products_id"].'">'.$row["title"].'</a></p></h3>
								<p class="cart-mini-features">'.$row["mini_features"].'</p>
                                <input id="input_cart_width" maxlength="3" size="1" type="text" value="'.$row["cart_count"].'"/>
                                <h5 class="range_basket_tovar_count_color_h5">Цена : <span>'.group_numerals($row["cart_price"]).' руб.</span></h5>
								<a class="btn btn-primary my-3 btn-block" href="cart.php?id='.$row["cart_id"].'&action=delete">Удалить</a>
							</div>
						</div>
					</div>
        
        ';
            
            }
 while ($row = mysql_fetch_array($result));
  
 echo '
 <h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> руб</h2>
 <p align="right" class="button-next" ><a href="cart.php?action=confirm" >Далее</a></p> 
 ';
   
} 
else
{
    echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
}
        
        
        
        
        
        break;
        
        case 'confirm':
        
        echo '
        
            <div class="row row_range_footer a_create_link">
              <div class="col-xl-auto col-md-auto col-sm-auto">
                    <ul>
                        <li class=""><a class="" href="cart.php?action=oneclick">1. Корзина товаров</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-auto">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-auto">
                    <ul>
                        <li class=""><a class="active" href="">2. Контактная информация</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-auto">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-auto">
                    <ul>
                        <li class=""><a class="" href="">3. Завершение</a></li>
                    </ul>
              </div>
            </div>  
            <div id="line_basket_tovar">
                <p>Шаг 2 из 3</p>
            </div> 
        
        ';
        
if ($_SESSION['order_delivery'] == "По почте") $chck1 = "checked";
if ($_SESSION['order_delivery'] == "Курьерам") $chck2 = "checked";
if ($_SESSION['order_delivery'] == "Самовывоз") $chck3 = "checked"; 
  
 echo '
 

<div class="container">
<h3 class="title-h3 title_h3_2step" >Способы доставки:</h3>
<form method="post">
<ul id="info-radio">
<li>
<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="По почте" '.$chck1.'  />
<label class="label_delivery" for="order_delivery1">По почте</label>
</li>
<li>
<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Курьерам" '.$chck2.' />
<label class="label_delivery" for="order_delivery2">Курьерам</label>
</li>
<li>
<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery3" value="Самовывоз" '.$chck3.' />
<label class="label_delivery" for="order_delivery3">Самовывоз</label>
</li>
</ul>
<h3 class="title-h3 title_h3_2step1" >Информация для доставки:</h3>

';
  if ( $_SESSION['auth'] != 'yes_auth' ) 
{
echo '
<div class="row ">
<div class="col-12">
    <ul class="info-order">
        <li><label for="order_fio"></label><input required="" type="text" placeholder="ФИО" name="order_fio" id="order_fio" value="'.$_SESSION["order_fio"].'" /><span class="order_span_style" ></span></li>
    </ul>
</div>
<div class="col-12">
    <ul class="info-order">
        <li><label for="order_email"></label><input required="" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" type="text" placeholder="E-mail" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /><span class="order_span_style" ></span></li>
    </ul>
</div>
<div class="col-12">
    <ul class="info-order">
        <li><label for="order_phone"></label><input required="" pattern="^(?:8[ -]?\d{2}[ -]?\d{2}(?:[ -]?\d{2})?|\+\d{3}[ -]?\d{3}[ -]?\d{3})$" type="text" placeholder="Телефон" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'" /><span class="order_span_style" ></span></li>
    </ul>
</div>
<div class="col-12">
    <ul class="info-order">
        <li><label class="order_label_style" for="order_address"></label><input required="" type="text" placeholder="Адрес" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'" /><span></span></li>
    </ul>
</div>
';
}
echo '
<div class="col-12">
    <ul class="info-order">
        <li><label class="order_label_style" for="order_note"></label><textarea placeholder="Уточните информацию о заказе. Например, удобное время для звонка
нашего менеджера" name="order_note"  >'.$_SESSION["order_note"].'</textarea><span></span></li>
    </ul>
</div>

</div>
</div>
<p align="right" ><input type="submit" name="submitdata" id="confirm-button-next" value="Далее" /></p>
</form>
 
 
 ';    
        
                                
        break;
        
        case 'completion':
        echo '
        
        <div class="row a_create_link">
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="active" href="">1. Корзина товаров</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="" href="cart.php?action=confirm">2. Контактная информация</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto col-md-auto col-sm-12">
                    <ul>
                        <li class=""><a class="" href="">3. Завершение</a></li>
                    </ul>
              </div>
            </div>  
              
              <div id="line_basket_tovar">
                 <p>Шаг 3 из 3</p>
              </div>
        
        
        
        
        ';
        
        
        if ( $_SESSION['auth'] == 'yes_auth' ) 
    {
echo '

<ul id="list-info" >
<li><strong>Способ доставки:</strong>'.$_SESSION['order_delivery'].'</li>
<li><strong>Email:</strong>'.$_SESSION['auth_email'].'</li>
<li><strong>ФИО:</strong>'.$_SESSION['auth_surname'].' '.$_SESSION['auth_name'].' '.$_SESSION['auth_patronymic'].'</li>
<li><strong>Адрес доставки:</strong>'.$_SESSION['auth_address'].'</li>
<li><strong>Телефон:</strong>'.$_SESSION['auth_phone'].'</li>
<li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
</ul>
 
';
   }else
   {
echo '
<h3 class="last_info">Конечная информация</h3>
<ul class="list-info" >
<li><strong>Способ доставки:</strong>'.$_SESSION['order_delivery'].'</li>
<li><strong>Email:</strong>'.$_SESSION['order_email'].'</li>
<li><strong>ФИО:</strong>'.$_SESSION['order_fio'].'</li>
<li><strong>Адрес доставки:</strong>'.$_SESSION['order_address'].'</li>
<li><strong>Телефон:</strong>'.$_SESSION['order_phone'].'</li>
<li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
</ul>
 
';    
}
 echo '
<h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($itogpricecart).'</strong> руб</h2>
  <p align="right" class="button-next" ><a href="" >Оплатить</a></p> 
  
 '; 
        
        
        
        
        
        
        break;
        
        default:
        
         echo '
        
            <div class="row a_create_link">
              <div class="col-xl-auto .col-md-auto .col-sm-12">
                    <ul>
                        <li class=""><a class="active" href="cart.php?action=oneclick">1. Корзина товаров</a></li>
                    </ul>
                    <div id="line_basket_tovar">
                        <p>Шаг 1 из 3</p>

                    </div>
              </div>
              <div class="col-xl-auto .col-md-auto .col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto .col-md-auto .col-sm-12">
                    <ul>
                        <li class=""><a class="" href="cart.php?action=confirm">2. Контактная информация</a></li>
                    </ul>
              </div>
              <div class="col-xl-auto .col-md-auto .col-sm-12">
                    <ul>
                        <li class=""><span>&rarr;</span></li>
                    </ul>
              </div>
              <div class="col-xl-auto .col-md-auto .col-sm-12">
                    <ul>
                        <li class=""><a class="" href="">3. Завершение</a></li>
                    </ul>
              </div>
            <div class="col-xl-auto col-md-auto col-sm-12">
              <div id="style_button_clear">
                <a class="" href="cart.php?action=clear">Очистить</a> 
                </div>  
              </div>
            </div>  
              
        
        ';
        
        
        
        $result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);
 
            If (mysql_num_rows($result) > 0)
            {
            $row = mysql_fetch_array($result);
            
            do
            {
             
            $int = $row["cart_price"] * $row["cart_count"];
            $all_price = $all_price + $int;
             
            if  (strlen($row["image"]) > 0 && file_exists("./uploads_images/".$row["image"]))
            {
            $img_path = './uploads_images/'.$row["image"];
            $max_width = 200; 
            $max_height = 190; 
             list($width, $height) = getimagesize($img_path); 
            $ratioh = $max_height/$height; 
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh, $ratiow); 
             
            $width = intval($ratio*$width); 
            $height = intval($ratio*$height);    
            }else
            {
            $img_path = "/images/none.png";
            $width = 120;
            $height = 105;
            } 
            //Вывод товаров в корзину
        echo '
        <div class="container ">
						<div class="row range_basket_tovar_count align-items-center">
							<div class="col-12 col-md-6 text-center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/></div>
							<div class="col-12 col-md-6 text-justify">
								<h3><p class="range_basket_tovar_count_center"><a href="">'.$row["title"].'</a></p></h3>
								<p class="cart-mini-features">'.$row["mini_features"].'</p>
                                <h5 class="range_basket_tovar_count_color_h5">Цена : <span>'.$row["cart_price"].' руб.</span></h5>
								<a class="btn btn-primary my-3 btn-block" href="cart.php?id='.$row["cart_id"].'&action=delete">Удалить</a>
							</div>
						</div>
					</div>
        
        ';
            
            }
 while ($row = mysql_fetch_array($result));
  
 echo '
 <h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> руб</h2>
 <p align="right" class="button-next" ><a href="cart.php?action=confirm" >Далее</a></p> 
 ';
   
} 
else
{
    echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
}
        
        
        
                       
        
        break;
        
    
    
    
    
}


	
?>



</div>
<div id="footer_bg_color">
<?php
include("include/block-footer.php");
 
?>
</div>
</div>
  
    
    
  
  
  
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>     
</body>
</html>