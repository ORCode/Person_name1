<?php
	
    include("include/db_connect.php");
    include("function/functions.php");
    session_start();
    
$search = clear_string($_GET["q"]);
$sorting = $_GET["sort"];

switch($sorting)
{
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = 'По возрастанию';
    break;
    case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = 'По убыванию';
    break;
    case 'popular';
    $sorting = 'count DESC';
    $sort_name = 'Популярные';
    break;
    case 'news';
    $sorting = 'datetime DESC';
    $sort_name = 'Новинки';
    break;
    case 'brand';
    $sorting = 'brand';
    $sort_name = 'От A до Z';
    break;
    
    default:
    
    $sorting = 'products_id DESC';
    $sort_name = 'Без сортировки';
    
    break;
    
    
    
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
    
    
    
<title>Поиск - <?php echo $search; ?></title>   
</head>
<body>
  <div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-left">
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 .col-md-3 .col-sm-12"> 
            <?php
	           include("include/block-category.php");
               include("include/block-parameter.php");
               //include("include/block-news.php");
            ?>
        </div>  
  <!--Проверка поиска на отсувствие данных -->   
  <!--Вывод товара пока так -->
  <?php
  if (strlen($search) >=3 && strlen($search) < 150 )
    {
        
        
    
  
    $num = 3; //колличество выводимого товара.
    $page = (int)$_GET['page'];              
     
    $count = mysql_query("SELECT COUNT(*) FROM table_products WHERE title LIKE '%$search%' AND visible = '1'",$link);
    $temp = mysql_fetch_array($count);
 
    If ($temp[0] > 0)
    {  
    $tempcount = $temp[0];
 
    // нахождения числа страниц под созданный товар
    $total = (($tempcount - 1) / $num) + 1;
    $total =  intval($total);
 
    $page = intval($page);
 
    if(empty($page) or $page < 0) $page = 1;  
        
    if($page > $total) $page = $total;
      
    // Вычисляем начиная с какого номера
    // следует выводить товары 
    $start = $page * $num - $num;
 
    $qury_start_num = " LIMIT $start, $num"; 
    }
   If ($temp[0] > 0)
    {
    $result = mysql_query("SELECT * FROM table_products WHERE title LIKE '%$search%' AND visible='1' ORDER BY $sorting $qury_start_num",$link);
    
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
    
if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="search.php?q='.$search.'&page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="search.php?q='.$search.'&page='.($page + 1).'">&gt;</a></li>';
 
 
// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="search.php?q='.$search.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="search.php?q='.$search.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="search.php?q='.$search.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="search.php?q='.$search.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="search.php?q='.$search.'&page='.($page - 1).'">'.($page - 1).'</a></li>';
 
if($page + 5 <= $total) $page5right = '<li><a href="search.php?q='.$search.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="search.php?q='.$search.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="search.php?q='.$search.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="search.php?q='.$search.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="search.php?q='.$search.'&page='.($page + 1).'">'.($page + 1).'</a></li>';
 
 
if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="search.php?q='.$search.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}
 
if ($total > 1)
{
    echo '
    <div class="container d-flex justify-content-center pstrnav">
    <p>
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='search.php?q=".$search."&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </p>
    </div>
    ';
}

}
else{
   echo "<p>Ничего не найдено</p>"; 
    
}
}
else
{
    
    echo "<p>Длинна строки для поиска должна быть больше 2 символов</p>";
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