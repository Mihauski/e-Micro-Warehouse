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

  $(document).ready(function() {
    $('.alert').delay(5000).fadeOut(1000);
  });
  
  $(document).ready(function() {
  //modal Window
  //catch all modals
  var modals = document.getElementsByClassName('modal');
  // Get the buttons that opens the modal
  var btns = document.getElementsByClassName("openmodal");
  //get the close buttons
  var spans=document.getElementsByClassName("close");

  for(let i=0;i<btns.length;i++){
      btns[i].onclick = function() {
          modals[i].style.display = "block";
      }
  }
  for(let i=0;i<spans.length;i++){
      spans[i].onclick = function() {
          modals[i].style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modals[i]) {
          modals[i].style.display = "none";
        }
      }
    }
});

$(document).ready(function() {
  //modal Window
  //catch all modals
  var modals = document.getElementsByClassName('modaldel');
  // Get the buttons that opens the modal
  var btns = document.getElementsByClassName("openmodaldel");
  //get the close buttons
  var spans=document.getElementsByClassName("closedel");

  for(let i=0;i<btns.length;i++){
      btns[i].onclick = function() {
          modals[i].style.display = "block";
      }
  }
  for(let i=0;i<spans.length;i++){
      spans[i].onclick = function() {
          modals[i].style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modals[i]) {
          modals[i].style.display = "none";
        }
      }
    }
});

$(document).ready(function() {
  //modal Window
  //catch all modals
  var modals = document.getElementsByClassName('modaladd');
  // Get the buttons that opens the modal
  var btns = document.getElementsByClassName("openmodaladd");
  //get the close buttons
  var spans=document.getElementsByClassName("closeadd");

  for(let i=0;i<btns.length;i++){
      btns[i].onclick = function() {
          modals[i].style.display = "block";
      }
  }
  for(let i=0;i<spans.length;i++){
      spans[i].onclick = function() {
          modals[i].style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modals[i]) {
          modals[i].style.display = "none";
        }
      }
    }
});

/*  //AJAX FORM CODE
    $('form').submit(function(event) {
      var modals = document.getElementsByClassName('modal');
  // Get the buttons that opens the modal
  var btns = document.getElementsByClassName("openmodal");
  //get the close buttons
  var spans=document.getElementsByClassName("close");
        itemlp = $('.countertd').innerHTML;
        var formData = {
          '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': $('input[name=id]').val(),
            'nazwa': $('input[name=nazwa]').val(),
            'typ': $('input[name=typ]').val(),
            'ilosc': $('input[name=ilosc]').val(),
            'jednostka': $('input[name=jednostka]').val(),
            'uwagi': $('textarea').val(),
            'alarm': $('input[name=alarm]').val()
        };

        $.ajax({
            type: 'POST',
            url: '/stock/edit',
            data: formData,
            dataType: 'json',
            success: function(Result) {
              if(Result == "true") {
                alert('Works!');
              } else if(Result == "false") {
                alert('Fuck!');
              }
              var modals = document.getElementsByClassName('modal');
              for(let i=0;i<spans.length;i++){
                spans[i].onclick = function() {
                    modals[i].style.display = "none";
                }
                window.onclick = function(event) {
                  if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                  }
                }
            }
              //code for "silent items update"
              var $request = $.get('/stock/refresh'); // make request
              var $container = $('.table-container');
              $container.fadeOut();

              $request.done(function(data) { // success
                  $container.html(data.html).fadeIn();
              });
              $request.always(function() {
                  $container.removeClass('loading');
              });
            }
        });
        event.preventDefault();
    });*/