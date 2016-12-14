function errorShake(elm, text){
  $(elm).html(text);
  $(elm).show();
  $(elm).addClass("animated shake");
  $(elm).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
    $(elm).removeClass("animated shake");
  });
}
