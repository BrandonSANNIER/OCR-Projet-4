rellax = new Rellax('.rellax');
btnComment = $("#btn_add_comment");

const nbRoman = $('.list').length;
var list = $('.list');
console.log(list[0]);
var current = 0;

$('#next').on("click", () => {
  current++;
  if(current > nbRoman){
    current = 0;
  } else {
    const test = list[1];
    test.show();
    test.css('display', 'block');
    console.log("list[1]");
  }
});

$('#prev').on("click", () => {
  current--;
  if(current < 0){
    current = nbRoman - 1;
  } else {
    list[1].css('display', 'none');
    console.log("test");
  }
});
btnComment.on('click', () =>{
  console.log("show comment");
  $(".add_comment").show(500);
  $("#btn_add_comment").hide();
}); 