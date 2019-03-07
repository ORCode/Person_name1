$(document).ready(function(){
 
$('.add-cart-style-grid, .add-cart').click(function(){
               
 var  tid = $(this).attr("tid");
 
 $.ajax({
  type: "POST",
  url: "/include/addtocart.php",
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) { 
      }
});
 
});
});