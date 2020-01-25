
var header_height = $("header").outerHeight(),
    footer_height = $("footer").outerHeight();

function mainheight(){
    var tot_height = parseInt(header_height) + parseInt(footer_height);
    $(".main").css("min-height","calc(100vh - " + tot_height + "px)");
    $("body").css("padding-top",header_height+"px")
};
$(document).ready(mainheight);
$(window).resize(mainheight);

function bannerheight(){
    $(".full-height").css("min-height","calc(100vh - " + header_height + "px)");
    $("body").css("padding-top",header_height+"px")
};
$(document).ready(bannerheight);
$(window).resize(bannerheight);

function loginwrap(){
    $(".login-wrap").css("min-height","calc(100vh - " + header_height + "px)");
    $("body").css("padding-top",header_height+"px")
};
$(document).ready(loginwrap);
$(window).resize(loginwrap);

$(document).ready(function() {

    $(".navbar-toggler").click(function() {
        $('body').toggleClass('show-menu');
    });
    $(window).scroll(function() {
        var sticky = $('header'),
            scroll = $(window).scrollTop();

        if (scroll >= 70) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });

    /*****  Show PassWord  *****/
    $(".toggle-password").click(function() {
    	var src = $(this).attr('src');
	    var newsrc = (src==''+APP_URL+'/public/Frontassets/images/password-show.svg') ? ''+APP_URL+'/public/Frontassets/images/password-hide.svg' : ''+APP_URL+'/public/Frontassets/images/password-show.svg';
	        $(this).attr('src', newsrc );

	    if ($('#password').attr("type") == "password") {
	        $('#password').attr("type", "text");
	    } else {
	    	$('#password').attr("type", "password");
	    }

	});
    /*****  Show PassWord  *****/
});


$('#browsemain').change(function() {
  $('#browse').val($('#browsemain')[0].files[0].name);
});


// $(document).ready(function() {
//   var formFields = $('.form-label-group');
//
//   formFields.each(function() {
//
//     var field = $(this);
//     var input = field.find('input');
//     var label = field.find('label');
//
//     function checkInput() {
//
//       var valueLength = input.val().length;
//       alert(input.val().length);
//       if (valueLength > 0 ) {
//         label.addClass('freeze')
//       } else {
//             label.removeClass('freeze')
//       }
//     }
//
//     input.change(function() {
//       checkInput()
//     })
//   });
// });
function checkInput() {
	var formFields = $('.form-label-group');
	formFields.each(function() {

	  var labell = $(this).find('label');
	  if($(this).find('input').length == 1) {
	  	console.log("input found");
	  	if($(this).find('input').val().length > 0) {
	  		labell.addClass('freeze')
	  	} else {
	  		labell.removeClass('freeze')
	  	}
	  }
	  if($(this).find('textarea').length == 1) {
	  	console.log("textarea found");
	  	if($(this).find('textarea').val().length > 0) {
	  		labell.addClass('freeze')
	  	} else {
	  		labell.removeClass('freeze')
	  	}
	  }
	  // var valueLength = $(this).find('input').val().length;
	  // var arealength = $(this).find('textarea').val().length;

	  //   if (valueLength > 0 || arealength > 0 ) {
	  //     labell.addClass('freeze')
	  //   } else {
	  //         labell.removeClass('freeze')
	  //   }
	});


}
$('.form-label-group input, .form-label-group textarea').change(function() {
  checkInput()
});
$(document).ready(checkInput);
