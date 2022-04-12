// alert( $("edite_name").text());

// $(function (){
//     "use strict";
//     $(".form-control").on("keyup", function (){
//     //    alert( $("name"));

// $(".project-category").text($(this).val());
// // alert( $("edite_name").text());
//     });
// });

const list = document.querySelectorAll('.list');
function activelink(){
   //  remove(...tokens:string[]);
    list.forEach((item) =>
   //   void
    item.classList.remove('active'));
    this.classList.add('active');

}
list.forEach((item)=>
item.addEventListener('click',activelink));


$(function (){
    "use strict";
    $("#name").on("keyup", function (){
    //    alert( $("name"));

$(".project-category").text($(this).val());
// alert( $("edite_name").text());
    });
});






const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");

one.onclick = function() {
    one.classList.add("active");
    two.classList.remove("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}

two.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
three.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
four.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.remove("active");
}
five.onclick = function() {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.add("active");
}




