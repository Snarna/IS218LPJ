function errorShake(elm, text){
  $(elm).attr("class", "alert alert-danger");
  $(elm).html(text);
  $(elm).show();
  $(elm).addClass("animated shake");
  $(elm).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
    $(elm).removeClass("animated shake");
  });
}

function successFadeIn(elm, text){
  $(elm).attr("class", "alert alert-success");
  $(elm).html(text);
  $(elm).show();
  $(elm).addClass("animated fadeIn");
  $(elm).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
    $(elm).removeClass("animated fadeIn");
  });
}

function fadePic(elm, path){
  $(elm).fadeOut(300, function(){
      $(this).attr('src',path).bind('onreadystatechange load', function(){
         if (this.complete) $(this).fadeIn(300);
      });
   });
}

function clearForm(formElm){
  $(':input', formElm)
   .not(':button, :submit, :reset, :hidden')
   .val('')
   .removeAttr('checked')
   .removeAttr('selected');
}
