jQuery(function($) {
    $(document).ready(function() {
        $(window).scroll(function(){
            if($(this).scrollTop() > 5) {
                $('.site-header').addClass('bcg-white');
            } else {
                $('.site-header').removeClass('bcg-white');
            }
        });
    });

    $('.hamburger').on('click', function() {
        $(this).toggleClass('hamburger-open');
        $('.mobile-menu').toggleClass('mobile-menu-open');
    });

    // filter blog
        function cat_ajax_get(catID) {
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl, // eslint-disable-line no-undef
                data: {
                    'action': 'filter_blog', 
                    cat: catID },
                success: function(response) {
                    $('#team-list').html(response)
                    document.getElementById('ajax__preloader').style.display = 'none'; 
                        
                },
                beforeSend: function() {
                document.getElementById('ajax__preloader').style.display = 'unset';
                    
                },
                error: function() {
                    alert('false')
                    
                },
        
            });
        }
        $( '.blog-categories .ajax' ).click(function(e) {
            e.preventDefault();
            $('.ajax').removeClass('active-box-blog');
            $(this).addClass('active-box-blog'); 
            var catnumber = $(this).attr('data-term-number');
            cat_ajax_get(catnumber);
            console.log(catnumber);
        });

    // contact form acceptance
        $('#cf-acceptance').change(function() {
            if($(this).is(':checked')) {
                $('.checkmark').addClass('activeCheckmark');
            } else {
                $('.checkmark').removeClass('activeCheckmark');
            }
        });
});

// SWIPER SLIDERS
    var heroSlider = new Swiper('.hero-slider', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // loop: true,
        speed: 200,
        pagination: {
            el: '.swiper-pagination-hero-one',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // breakpoints: {
        //     1: {
        //         slidesPerView: 1,
        //     },
        //     576.98: {
        //         slidesPerView:2,
        //         spaceBetween: 10,
        //     },
        //     767.98: {
        //         slidesPerView: 3,
        //         spaceBetween: 15,
        //     },
        //     1023.98: {
        //         slidesPerView: 3,
        //         spaceBetween: 20,
        //     },
        //     1199.98: {
        //         slidesPerView: 4,
        //         spaceBetween: 20,
        //     },
        // },
    });
    var offersSlider = new Swiper('.offersSlider', {
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        // },
        // loop: true,
        speed: 200,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1: {
                slidesPerView: 1,
            },
            576.98: {
                slidesPerView:2,
                spaceBetween: 10,
            },
            767.98: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1023.98: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1199.98: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });

// SINGLE CHART TO ANOTHER LINE
    class SingleCharToNextLine {
        constructor() {
        this.fixAllSingleCharWordsInBody()
        }
        allTextNodes(parentNode) {
        let arr = [];
        if (!parentNode) {
            return arr;
        }
        
        let nodes = parentNode.childNodes;
        nodes.forEach(node => {
            if (node.nodeName === 'SCRIPT') {
            return;
            }
            if (node.nodeType === Node.TEXT_NODE) {
            arr.push(node);
            } else {
            arr = arr.concat(this.allTextNodes(node));
            }
        });
        return arr;
        }
        // convert [space][letter][space] to [space][letter][non-breaking space];
        modifySingleCharWords = str => str.replace(/ ([a-zA-Z]) /g,
    ' $1' + '\u00A0');
        fixAllSingleCharWordsInBody() {
        let tNodes = this.allTextNodes(document.body);
        tNodes.forEach(tNode => {
            tNode.nodeValue = this.modifySingleCharWords(tNode.nodeValue);
        });
        }
    }
    

    document.addEventListener('DOMContentLoaded', init);
    function init() {
        var test = new SingleCharToNextLine;
    }