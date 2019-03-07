<div id="block-category">
<div id="category-name-product">
<p>Категории товаров</p>
</div>
<div class="dropdown show ">
    <a class="btn btn-secondary dropdown-toggle rage_list_menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Мобильные телефоны
    </a>
  
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#"><img class="img_width_rage" src="/images/phone-call.png" /></a>
      <a class="dropdown-item" href="view_cat.php?type=mobile">Все модели</a>
<?php
	
    $result = mysql_query("SELECT * FROM category WHERE type='mobile'",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
          echo '
        
          <a class="dropdown-item" href="view_cat.php?cat='.strtolower($row["brand"].'&type='.$row["type"]).'">'.$row["brand"].'</a>
          
          ';  
        }
        while ($row = mysql_fetch_array($result));
    }
?> 
    </div>
  </div>
    <div class="dropdown show ">
    <a class="btn btn-secondary dropdown-toggle rage_list_menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Ноутбуки
    </a>
  
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#"><img class="img_width_rage" src="/images/laptop.png" /></a>
      <a class="dropdown-item" href="view_cat.php?type=notebook">Все модели</a>
      <?php
	
    $result = mysql_query("SELECT * FROM category WHERE type='notebook'",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
          echo '
        
          <a class="dropdown-item" href="view_cat.php?cat='.strtolower($row["brand"].'&type='.$row["type"]).'">'.$row["brand"].'</a>
          
          ';  
        }
        while ($row = mysql_fetch_array($result));
    }
?> 
    </div>
  </div>
    <div class="dropdown show ">
    <a class="btn btn-secondary dropdown-toggle rage_list_menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Планшеты
    </a>
  
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#"><img class="img_width_rage" src="/images/ipad.png" /></a>
      <a class="dropdown-item" href="view_cat.php?type=notepad">Все модели</a>
<?php
	
    $result = mysql_query("SELECT * FROM category WHERE type='notepad'",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
          echo '
        
          <a class="dropdown-item" href="view_cat.php?cat='.strtolower($row["brand"].'&type='.$row["type"]).'">'.$row["brand"].'</a>
          
          ';  
        }
        while ($row = mysql_fetch_array($result));
    }
?> 
    </div>
  </div>

</div>