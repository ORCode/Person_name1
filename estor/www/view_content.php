<?php
	
    include("include/db_connect.php");
    include("function/functions.php");
    session_start();
    
    $id = clear_string($_GET["id"]);
    
    If ($id != $_SESSION['countid'])
{
$querycount = mysql_query("SELECT count FROM table_products WHERE products_id='$id'",$link);
$resultcount = mysql_fetch_array($querycount); 
 
$newcount = $resultcount["count"] + 1;
 
$update = mysql_query ("UPDATE table_products SET count='$newcount' WHERE products_id='$id'",$link);  
}
 
$_SESSION['countid'] = $id; 

    
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
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/estore-basket.js"></script>
    <script type="text/javascript" src="/js/animated-estor.js"></script>
    
    
    
<title>Интернет-Магазин Цифровой Техники</title> 
  
</head>
<body>
  <div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-left">
            <?php
                $result1 = mysql_query("SELECT * FROM table_products WHERE products_id='$id' AND visible='1'",$link);
                If (mysql_num_rows($result1) > 0)
                {
                $row1 = mysql_fetch_array($result1);
                do
                {   
                if  (strlen($row1["image"]) > 0 && file_exists("./uploads_images/".$row1["image"]))
                {
                $img_path = './uploads_images/'.$row1["image"];
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
                $img_path = "/images/no-image.png";
                $width = 110;
                $height = 200;
                } 
                
                echo '
                
                
                    <div id="zaebala" class="container"
                        <p><a href="index.php">Главная страница </a> \ <span>'.$row1["brand"].'</span></p>
                    </div>
                <div class="container">
						<div class="row range_basket_tovar_count align-items-center">
							<div class="col-12 col-md-6 text-center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/></div>
							<div class="col-12 col-md-6 text-justify">
								<h3><p id="range_viewcontent_title" class="range_basket_tovar_count_center">'.$row1["title"].'</p></h3>
                            <div class="row text-center">    
                                <div class="col-1">
                                    <p><img src="/images/eye.png" /></p>
                                </div>
                                <div class="col-1">
                                    <p>'.$row1["count"].'</p>
                                </div>
                                <div class="col-1">
                                    <p><img src="/images/speech-bubble.png" /></p>
                                </div>
                                <div class="col-1">
                                    <p><img src="" /> 0</p>
                                </div>
                            </div>
                                <h5 class="range_basket_tovar_count_color_h5">Цена : <span>'.group_numerals($row1["price"]).' руб.</span></h5>
								<p class="cart-mini-features">'.$row1["mini_features"].'</p>
								<a class="btn btn-primary my-3 btn-block add-cart-style-grid" tid="'.$row1["products_id"].'" href="">Купить</a>
							</div>
						</div>
					</div>
                
                
                ';
                
                
                }
                while ($row1 = mysql_fetch_array($result1));
                
            $result = mysql_query("SELECT * FROM uploads_images WHERE products_id='$id'",$link);
            If (mysql_num_rows($result) > 0)
            {
            $row = mysql_fetch_array($result);
            echo '
            <div class="container">
                <div id="block-img-slide">
                  ';
            do
            {
                 
            $img_path = './uploads_images/'.$row["image"];
            $max_width = 70; 
            $max_height = 70; 
             list($width, $height) = getimagesize($img_path); 
            $ratioh = $max_height/$height; 
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh, $ratiow); 
             
            $width = intval($ratio*$width); 
            $height = intval($ratio*$height);    
                 
                 
            echo '

            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary button_color_content" data-toggle="modal" data-target="#exampleModal">
                  <a href="#image'.$row["id"].'"><img class="img111" src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt=""></a>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header justify-content-center align-items-center">
                        <h5 class="modal-title" id="exampleModalLabel">Изображения</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <a href="#image'.$row["id"].'"><img class="img111" src="'.$img_path.'"></a>  
                        <a href="#image'.$row["id"].'"><img class="img111" src="'.$img_path.'"></a>  
                        <a href="#image'.$row["id"].'"><img class="img111" src="'.$img_path.'"></a>                                                                             
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            
            
            
            ';
            }
             while ($row = mysql_fetch_array($result));
             echo '
                </div>
             </div>    
                    ';
            }
                
$result = mysql_query("SELECT * FROM table_products WHERE products_id='$id' AND visible='1'",$link);
$row = mysql_fetch_array($result);
                
            echo '
            <div class="container">
                    
            <div id="accordion">
              <div class="card">
                <div class="card-header text-center" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Описание
                    </button>
                  </h5>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    '.$row["description"].'
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header text-center" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Характеристики
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    '.$row["features"].'
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header text-center" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Отзывы
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    Не успел сделать(.
                  </div>
                </div>
              </div>
            </div>
</div>          
            
            
            
            
            ';
            
                
            }
    
            ?>
    

</div>
</div>
<div id="footer_bg_color">
<?php
include("include/block-footer.php");
 
?>
</div>

    
    
  
  
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>    
</body>
</html>