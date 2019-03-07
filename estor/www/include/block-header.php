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
              <a class="nav-link menu_color_text h3" href="feedback.php">Контакты</a>
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
            <input id="form_search_menu" class="form-control mr-sm-2 " type="search" name="q" placeholder="Поиск среди более 10 брендов" value="<?php echo $search; ?>"/>
            <input id="form_search_menu_btn " class="btn btn-outline-success my-2 my-sm-0" id="button-search" type="submit" value="Поиск" />
            <ul id="result-search">
            
            
            
            </ul>
          </form>
  </div>
  </div>
  <!-- Карусель-->
  <div class="container carusel_height_empty">
    <div class="container-fluid text-center h1 animated_text_carusel">
    
    <h1>Estor - shop
      <span
         class="txt-rotate"
         data-period="2000"
         data-rotate='[ "phones.", "tablets.", "laptops.", "device for a good mood.", "fun!" ]'></span>
    </h1>
    <h2>A new era of devices.</h2>
    
    </div>
    <!--Carucel-->
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 " src="/images/wallpaper-2093957.jpg" alt="First slide">
            <div class="carousel-caption">
              <h1 class="h2">New era</h1>
              <p class="h2">Digital technology</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/Sony-Xperia-ZR-1920x1080-004.jpg" alt="Second slide">
            <div class="carousel-caption">
              <p class="h2">Sony Xperia ZR</p>
            </div>
          </div>
          <div class="carousel-item ">
            <img class="d-block w-100" src="/images/Samsung-Galaxy-S6-edge-1920x1080-002.jpg" alt="Third slide">
            <div class="carousel-caption">
              <h1 class="h2">Samsung Galaxy-S6</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/Samsung-Galaxy-K-zoom-1920x1080-007.jpg" alt="Four slide">
            <div class="carousel-caption carousel_text">
              <p class="h2">Samsung Galaxy K zoom</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    </div>
  <!--Меню категорий товара -->

  <div id="top-menu" class="container">
  <div class="row">
    <div class="col-xl-auto .col-md-auto .col-sm-12">
        <ul>
            <li class="cl-effect-1"><img src="/images/online-store.png" /><a class="menu_color_text h5 " href="index.php">Главная</a></li> 
        </ul>
    </div>
  <div class="col-xl-auto .col-md-auto .col-sm-12">
        <ul>
            <li class="cl-effect-1"><img src="/images/new.png" /><a class="menu_color_text h5" href="view_aystopper.php?go=news">Новинки</a></li> 
        </ul>
  </div>
  <div class="col-xl-auto .col-md-auto .col-sm-12">
        <ul>
            <li class="cl-effect-1"><img src="/images/best-seller.png" /><a class="menu_color_text h5" href="view_aystopper.php?go=leaders">Лидеры продаж</a></li>
        </ul>
  </div>
  <div class="col-xl-auto .col-md-auto .col-sm-12">
        <ul>
            <li class="cl-effect-1"><img src="/images/sale.png" /><a class="menu_color_text h5" href="view_aystopper.php?go=sale">Распродажа</a></li>
        </ul>
  </div>
  <div class="col-xl-auto .col-md-auto .col-sm-12">
        <ul>
            <li class="cl-effect-1"><img src="/images/add-to-cart.png" /><a id="block-basket" class="menu_color_text h5" href="cart.php?action=oneclick">Корзина</a></li>
        </ul>
  </div>
  
  </div>
  </div>
  <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-auto">
            <?php echo '<p id="news_leaders_sale">'.$name_aystopper.'</p>';?>        
        </div>
    </div>
  
  </div>
  