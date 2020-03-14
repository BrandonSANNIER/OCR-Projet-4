rellax = new Rellax('.rellax');
btnComment = $("#btn_add_comment");

btnComment.on('click', () =>{
  console.log("show comment");
  $(".add_comment").show(500);
  $("#btn_add_comment").hide();
});







