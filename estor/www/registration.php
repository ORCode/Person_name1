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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/animated-estor.js"></script>

    
<title>Регистрация</title>   
</head>
<body>
  <div id="block-body">
<div class="container-fluid color_header">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light color_header">
        <img width="160px" height="80px" src="/images/logo-store.png" alt="logo"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="index.php">Главная</a>
            </li>
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="o-nas.php">О нас</a>
            </li>
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="magaziny.php">Магазины</a>
            </li>
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="contact.php">Контакты</a>
            </li>
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="autoriz.php">Вход</a>
            </li>
            <li class="nav-item ml-4 cl-effect-1">
              <a class="nav-link menu_color_text h3" href="registration.php">Регистрация</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  </div>
  <div class="container">
  <div class="col-12 ">
            <form id="form_menu_margin" class="form-inline my-2 my-lg-0" method="GET" action="search.php?q=">
            <input id="form_search_menu" class="form-control mr-sm-2 " type="search" name="q" placeholder="Поиск среди более 10 брендов" />
            <input id="form_search_menu_btn " class="btn btn-outline-success my-2 my-sm-0" id="button-search" type="submit" value="Поиск" />
          </form>
  </div>
  </div>
  
  <div class="container-fluid text-center h1 animated_text_carusel">
    
    <h1>Estor - shop
      <span
         class="txt-rotate"
         data-period="2000"
         data-rotate='[ "phones.", "tablets.", "laptops.", "device for a good mood.", "fun!" ]'>
         </span>
    </h1>
    <h2>A new era of devices.</h2>
    
  </div>
<div class="container">
<div id="h2_color_reg" class="h2 h2-title text-dark">
<p>Регистрация</p>
</div>
<form method="post" id="form_reg" action="/reg/handler_reg.php">
<p id="reg_message"></p>

<div id="block-form-registration">
<div class="row">
    <ul id="form-registration">
        <li>
            <label>Логин</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_login" id="reg_login" />
        </li>
        <li>
            <label>Пароль</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_pass" id="reg_pass" />
        </li>
        <li>
            <label>Фамилия</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_surname" id="reg_surname" />
        </li>
        <li>
            <label>Имя</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_name" id="reg_name" />
        </li>
        <li>
            <label>Отчество</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_patronymic" id="reg_patronymic" />
        </li>
        <li>
            <label>E-mail</label>
            <span class="star">*</span>
            <input required="" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" type="text" name="reg_email" id="reg_email" />
        </li>
        <li>
            <label>Мобильный телефон</label>
            <span class="star">*</span>
            <input required="" pattern="^(?:8[ -]?\d{2}[ -]?\d{2}(?:[ -]?\d{2})?|\+\d{3}[ -]?\d{3}[ -]?\d{3})$" type="text" name="reg_phone" id="reg_phone" />
        </li>
        <li>
            <label>Адрес доставки</label>
            <span class="star">*</span>
            <input required="" type="text" name="reg_address" id="reg_address" />
        </li>
        
        <li>
        <div id="block-captcha">
        <img src="/reg/reg_captcha.php" />
        <input required="" type="text" name="reg_captcha" id="red_captcha" />
        
        <p id="reloadcaptcha">Капча</p>
        
        </div>
        </li>
        
    </ul>
</div>
</div>
<div class="row">
    <div class="button_replace">
        <p><input type="submit" name="reg_submit" id="form_submit" value="Регистрация" /></p>
    </div>
</div>
</form>
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