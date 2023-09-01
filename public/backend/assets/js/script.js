/*
  Theme Name: Bootstrap Admin Dashboard
  Author: Nababur Rahaman
  Support: nababurbd@gmail.com
  Author URL: https://github.com/nababur
  Author URL: https://www.peopleperhour.com/freelancer/development-it/nababur-rahman-wordpress-codeigniter-expert-qjnjaw
  Description: Free use for Backend Development.
  Version: 1.0
*/




(function ($) {
    "use strict";


    //===== Prealoader
    
    $(window).on('load', function(){
        $('.spinner_body').delay(500).fadeOut(500);
    });



  // Wow Js
  new WOW().init();


// Add Data Table
  $(document).ready(function() {
      $('#usersTable').DataTable();

      $('#roleTable').DataTable({});
  } );

// Left side Toggle Function

$('#nav-toggle').on('click', function(){
  $('.cta').toggleClass('active');
  // $('#menu-action').toggleClass('active');
  $('.left-sidebar').toggleClass('active');
  $('.page-content-wrapper').toggleClass('active');
  $(this).toggleClass('active');


});




  // Image preview uploader js
  // For Only Profile Photo upload
  function profileURLfind(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview-thumb').attr('src', e.target.result);
        $('#preview-thumb').hide();
        $('#preview-thumb').fadeIn(650);


      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input-profile").change(function() {
    profileURLfind(this);
  });


  // Image preview uploader js
  // For Only Favicon upload
  function readFaviconURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview-favicon').attr('src', e.target.result);
        $('#preview-favicon').hide();
        $('#preview-favicon').fadeIn(650);

        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input-favicon").change(function() {
    readFaviconURL(this);
  });

  // Image preview uploader js
  // For Website logo upload
  function readLogoURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview-thumb').attr('src', e.target.result);
        $('#preview-thumb').hide();
        $('#preview-thumb').fadeIn(650);

        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input-logo").change(function() {
    readLogoURL(this);
  });




  // Toggle jquery Mobile 
  $(document).ready(function(){
      $("#toggle-button").click(function(){
          $("#toggle-user-menu").slideToggle( "fast" );
      });
  });


    // Add current class
    jQuery(document).ready(function() {
      $("#left-sidebar-section .left-sidebar ul li a.dropdown-item-list").click(function(){
          $("#left-sidebar-section .left-sidebar ul li a.dropdown-item-list").removeClass('current');
          $(this).addClass("current");
      });


    });


    // CkEditor Install
    ClassicEditor
      .create( document.querySelector( '#editor' ))
      .catch( error => {
        console.error( error );
    } );






})(jQuery);



