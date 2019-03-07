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

    
    
<title>Авторизация</title>   
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
              <a class="nav-link menu_color_text h3" href="">Вход</a>
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
  //<?php
	//if ($_SESSION['auth'] == 'yes_auth')
    //{
        
        //echo'
        
        //<p>Вы успешно авторизовались! Имя='.$_SESSION['auth_name'].'!</p>
        
       // ';
        
   // }else{
        
      //  echo '
            
         //   <p>Вы не авторизовались!</p>
           
        //';
    //}
//?>
<div class="container range_autoriz">
      <div class="row justify-content-center">
     
      <div class="col-md-offset-3 col-md-6">
      <form class="form-horizontal">
      <span class="heading">АВТОРИЗАЦИЯ</span>
      <div class="form-group">
      <input type="text" class="form-control" id="auth_login" placeholder="E-mail">
      <i class="fa fa-user"></i>
      </div>
      <p id="message-auth">не верный логин или пароль!</p>
      <div class="form-group help">
      <input type="password" class="form-control" id="auth_pass" placeholder="Password">
      <i class="fa fa-lock"></i>
      <a href="#" class="fa fa-question-circle"></a>
      <div id="range_reimind_pass">
      </div>
      </div>
      <div class="form-group">
      <div class="main-checkbox">
      <input type="checkbox" value="none" id="rememberme" name="rememberme"/>
      <label for="rememberme"></label>
      </div>
      <span class="text">Запомнить</span>
      <button type="submit" id="button-auth" class="btn btn-default">ВХОД</button>
            
      </div>
      </form>
      </div>
     
      </div><!-- /.row -->
</div><!-- /.container -->
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