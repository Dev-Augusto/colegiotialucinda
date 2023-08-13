/******************************************
    Version: 1.0
/****************************************** */

(function($) {
    "use strict";

    /* ==============================================
    Fixed menu
    =============================================== */
    
	$(window).on('scroll', function () {
		if ($(window).scrollTop() > 50) {
			//$('.top-navbar').addClass('fixed-menu');
		} else {
			//$('.top-navbar').removeClass('fixed-menu');
		}
	});

    /* ==============================================
    Back top
    =============================================== */
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.dmtop').css({
                bottom: "10px"
            });
        } else {
            jQuery('.dmtop').css({
                bottom: "-100px"
            });
        }
    });

    /* ==============================================
	Loader -->
	=============================================== */
	
	$(window).load(function() {
        $("#preloader").on(500).fadeOut();
        $(".preloader").on(600).fadeOut("slow");
		$('.loader-container').addClass('done');
		$('.progress-br').addClass('done');	 
    });
	
	/* ==============================================
		Scroll to top  
	============================================== */
		
	if ($('#scroll-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#scroll-to-top').addClass('show');
				} else {
					$('#scroll-to-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#scroll-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
	
    /* ==============================================
     Fun Facts -->
     =============================================== */

    function count($this) {
        var current = parseInt($this.html(), 10);
        current = current + 50; /* Where 50 is increment */
        $this.html(++current);
        if (current > $this.data('count')) {
            $this.html($this.data('count'));
        } else {
            setTimeout(function() {
                count($this)
            }, 30);
        }
    }
    $(".stat_count, .stat_count_download").each(function() {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });

	/* ==============================================
     Bootstrap Touch Slider -->
     =============================================== */
	 
	$('#carouselExampleControls').bsTouchSlider();
	
    /* ==============================================
     Tooltip -->
     =============================================== */
    $('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popover"]').popover()

    /* ==============================================
     Contact -->
     =============================================== */
    jQuery(document).ready(function() {
        $('#contactform').submit(function() {
            var action = $(this).attr('action');
            $("#message").slideUp(750, function() {
                $('#message').hide();
                $('#submit')
                    .after('<img src="images/ajax-loader.gif" class="loader" />')
                    .attr('disabled', 'disabled');
                $.post(action, {
                        first_name: $('#first_name').val(),
                        last_name: $('#last_name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        select_service: $('#select_service').val(),
                        select_price: $('#select_price').val(),
                        comments: $('#comments').val(),
                        verify: $('#verify').val()
                    },
                    function(data) {
                        document.getElementById('message').innerHTML = data;
                        $('#message').slideDown('slow');
                        $('#contactform img.loader').fadeOut('slow', function() {
                            $(this).remove()
                        });
                        $('#submit').removeAttr('disabled');
                        if (data.match('success') != null) $('#contactform').slideUp('slow');
                    }
                );
            });
            return false;
        });
    });
    // Porfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });
    
      $('#portfolio-flters li').on( 'click', function() {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');
    
        portfolioIsotope.isotope({ filter: $(this).data('filter') });
      });
    
	
})(jQuery);
// Javascript Puro
function chooseCourse(colegios) {
    let colegio = document.getElementById('colegio').value;
    for (let index = 1; index <= colegios; index++) {
        if (colegio == index) {
            let select = document.getElementById('cursoCollege'+colegio);
            select.className = 'form-control';
        }else{
            let select2 = document.getElementById('cursoCollege'+index);
            select2.className = 'form-control fatn';
        }
    }
    // 
    TruncURL();
}

function TruncURL(e = 0) {
    let colegio,classe,curso,url;
    colegio = document.getElementById('colegio').value;
    classe = document.getElementById('classe').value;
    if (e) {
        url = document.getElementById('link');
        url.href = document.location.href+'/'+colegio+'/'+classe+'/';
    } else {
        curso = document.getElementById('cursoCollege'+colegio).value;
        url = document.getElementById('link');
        url.href = document.location.href+'/'+colegio+'/'+classe+'/'+curso+'/';  
    }
}

function VerifyEstrageiro(){
    let nacionalidade,numero_passaporte,bi,image_bi,image_passaporte,label_passa,label_bi;
    nacionalidade = document.getElementById('nacionalidade').value;
    numero_passaporte = document.getElementById('numero_passaporte');
    bi = document.getElementById('bi');
    image_bi = document.getElementById('image_bi');
    image_passaporte = document.getElementById('image_passaporte');
    label_passa = document.getElementById('label_passa');
    label_bi = document.getElementById('label_bi');
    if (nacionalidade == 'Estrangeiro') {
        numero_passaporte.className = 'form-control';
        numero_passaporte.required = true;
        bi.className = 'form-control fatn';
        bi.required = false;
        image_bi.className = 'imaInput fatn';
        image_bi.required = false;
        image_passaporte.className = 'imaInput';
        image_passaporte.required = true;
        label_passa.className = '';
        label_bi.className = 'fatn';
    }else{
        numero_passaporte.className = 'form-control fatn';
        numero_passaporte.required = false;
        bi.className = 'form-control';
        bi.required = true;
        image_bi.className = 'imaInput';
        image_bi.required = true;
        image_passaporte.className = 'imaInput fatn';
        image_passaporte.required = false;
            label_passa.className = 'fatn';
        label_bi.className = '';
    }
    console.log(nacionalidade);
}

  
  