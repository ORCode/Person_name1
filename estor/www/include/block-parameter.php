<div id="block-parameter">
<div id="category-name-product">
<p>����� �� ����������</p>
</div>
<p class="title-filter">���������</p>
<form method="GET" action="search_filter.php">
    <div id="block-input-price">
    <ul>
    <li><p>��</p></li>
    <li><input maxlength="7" pattern="^[ 0-9]+$" type="text" id="start-price" name="start_price" value="100" /></li>
    <li><p>��</p></li>
    <li><input maxlength="7" pattern="^[ 0-9]+$" type="text" id="end-price" name="end_price" value="5000" /></li>
    <li><p>���.</p></li>
    </ul>
    </div>
    
    <p class="title-filter">�������������</p>
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
    

<center><input type="submit" name="submit" id="button-param-search" value="�����" /></center> 

</form>
<!-- ���� ����������-->
<div id="category-name-product">
<p>����������</p>
</div>
<div class="dropdown show ">
    <a class="btn btn-secondary dropdown-toggle rage_list_menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php
	echo $sort_name;
?>
    </a>
  
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="index.php">��� ����������</a>
      <a class="dropdown-item" href="index.php?sort=price-asc">�� �����������</a>
      <a class="dropdown-item" href="index.php?sort=price-desc">�� ��������</a>
      <a class="dropdown-item" href="index.php?sort=popular">����������</a>
      <a class="dropdown-item" href="index.php?sort=news">�������</a>
      <a class="dropdown-item" href="index.php?sort=brand">�� A �� Z</a>
    </div>
  </div>



</div>