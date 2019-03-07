<div id="block-parameter">
<div id="category-name-product">
<p>Поиск по параметрам</p>
</div>
<p class="title-filter">Стоимость</p>
<form method="GET" action="search_filter.php">
    <div id="block-input-price">
    <ul>
    <li><p>от</p></li>
    <li><input maxlength="7" pattern="^[ 0-9]+$" type="text" id="start-price" name="start_price" value="100" /></li>
    <li><p>до</p></li>
    <li><input maxlength="7" pattern="^[ 0-9]+$" type="text" id="end-price" name="end_price" value="5000" /></li>
    <li><p>руб.</p></li>
    </ul>
    </div>
    
    <p class="title-filter">Производители</p>
    <ul class="checkbox-brand">
        
<?php

$result = mysql_query("SELECT * FROM category WHERE type='mobile'",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
        $checked_brand ="";
           if ($_GET["brand"]){
            
                if(in_array($row["id"],$_GET["brand"]))
                {
                    
                    $checked_brand = "checked";
                }
            
           }
           
            
          echo '
          
          <li><input '. $checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'"/><label for="checkbrend'.$row["id"].'">'.$row["brand"].'</label></li>
          
          ';
           
        }
        while ($row = mysql_fetch_array($result));
    }
	
?>
    </ul>
    

<center><input type="submit" name="submit" id="button-param-search" value="Найти" /></center> 

</form>
</div>