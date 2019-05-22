//ozdobnik na podkreślenie menu
$(document).scroll(function() { 
    if($(window).scrollTop() !== 0) {
      $(".topmenu").addClass('scroll');
    } else {
        $(".topmenu").removeClass('scroll');
    }
 });


//funkcja rozwijanego contentu w viewStock
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
      this.innerHTML = "Pokaż   <i class=\"fas fa-plus\"></i>";
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
      this.innerHTML = "Ukryj   <i class=\"fas fa-minus\"></i>";
    }
    this.classList.toggle("active"); 
  });
}