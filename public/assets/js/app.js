const swup = new Swup({
  plugins: [new SwupOverlayTheme()]
});

swup.on('contentReplaced', () => {
  rellax = new Rellax('.rellax');
  btnComment = $("#btn_add_comment");
  nbComment = $('.slot_comment').length;

  btnComment.on('click', () =>{
    $(".add_comment").show(500);
    $("#btn_add_comment").hide();
  });

  $('#nbComment').text(nbComment);
});







