$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });

  $('.approved').change(function (e) {
      var url = $(this).data('url');
      var post_id = $(this).data('content');
      var approved = $(this).val();
      
      $.get(url, {post_id: post_id, approved: approved}, function (response) {
          if(response.status){
              alert('Success');
          }
      });
  });
  
});