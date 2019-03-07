<?php
	
    include("include/db_connect.php");
    include("function/functions.php");
    session_start();
  
$cat = clear_string($_GET["cat"]); 
$type = clear_string($_GET["type"]);  

    
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
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/animated-estor.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>

    
    
<title>Поиск по параметрам</title>   
</head>
<body>
  <div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-left">
<!-- 2 страница сортировки по подразделам устройств-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 .col-md-3 .col-sm-12"> 
            <?php
	           include("include/block-category.php");
               include("include/block-parameter1.php");
               
               //include("include/block-news.php");
            ?>
        </div>  
        
  <!--Вывод товара пока так -->
  <?php
  
    if($_GET["brand"])
    {
        $check_brand = implode(',',$_GET["brand"]);
        
    }
    $start_price = (int)$_GET["start_price"];
    $end_price = (int)$_GET["end_price"];
    
    if (!empty($check_brand) OR !empty($end_price))
    {
        if(!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
        if(!empty($end_price)) $query_price = " AND price BETWEEN $start_price AND $end_price";
        
    }
    
    
    
  
  
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
             if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
        {
        $img_path = './uploads_images/'.$row["image"];
        $max_width = 300;
        $max_height = 300;
        list($width, $height) = getimagesize($img_path);
        $ratioh = $max_height/$height;
        $ratiow = $max_width/$width;
        $ratio = min($ratioh, $ratiow);
        $width = intval($ratio*$width);
        $height = intval($ratio*$height);
        }else
        {
        $img_path = "/images/none.png";
        $width = 210;
        $height = 300;
        }
          echo '
             <div class="col-xl-3 .col-md-3 .col-sm-12 card_margin_top_grid">
                      <div class="card profile-card-5 cart_max_width">
                        <div class="card-img-block text-center">
                          <a href=""><img class="" src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt="Card image cap"></a>
                        </div>
                        <div class="card-body pt-0 ">
                          <h5 class="card-title text-danger  text-center style-title-grid"><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></h5>
                          <div class="row text-center">
                          <div class="col-4">
                            <p><img src="/images/eye.png" /> 0</p>
                          </div>
                          <div class="col-4">
                            <p><img src="/images/speech-bubble.png" /> 0</p>
                          </div>
                          <div class="col-4">
                          <a class="add-cart-style-grid"><img class="img_cart_tovar" src="/images/shopping-cart.png" /></a>
                          </div>
                          </div>
                          
                          <p class="style-price-grid text-center">Цена <strong>'.$row["price"].'</strong> руб.</p>
                          <p class="card-text text-justify">'.$row["mini_features"].'</p>
                          <div class="text-center">
                          <a href="view_content.php?id='.$row["products_id"].'" class="btn btn-primary button_card_empty">Открыть</a>
                          </div>
                        </div>
                      </div>
                    </div>
          
          ';  
        }
        while ($row = mysql_fetch_array($result));
    }
        else
    {
        echo'<div class="h3">Категория не доступна или не добавлена, обратитесь к разработчику или администратору!</div>';
    }

	
?>
  
  
    </div>
    </div>
    

</div>



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