(function($) {

  'use strict';

  function removeNoJsClass() {
    $( 'html:first' ).removeClass( 'no-js' );
  }

  /* Sidr Menu ---------------------*/
  function sidrMenu() {
    if ($("body.block-nav-left")[0]) {
      $('#menu-toggle').sidr({
        name: 'side-menu',
        side: 'left', // By default
        source: '#navigation'
      });
    } else {
      $('#menu-toggle').sidr({
        name: 'side-menu',
        side: 'right', // By default
        source: '#navigation'
      });
    }
  }

  /* Submenu Offset Fix ---------------------*/
  function menuOffset() {
    // Fix menu if off screen.
    var mainWindowWidth = $(window).width();

    $('#navigation ul.menu li.menu-item-has-children').mouseover(function() {

      // Checks if second level menu exist.
      var subMenuExist = $(this).find('.sub-menu').length;

      if ( subMenuExist > 0 ) {
        var subMenuWidth = $(this).find('.sub-menu').width();
        var subMenuOffset = $(this).find('.sub-menu').parent().offset().left + subMenuWidth;

        // If sub menu is off screen, give new position.
        if ( (subMenuOffset + subMenuWidth) > mainWindowWidth ) {
          var newSubMenuPosition = subMenuWidth;
          $(this).find('ul.sub-menu').css({
            right: 0,
            left: 'auto',
          });
        }
        if ( (subMenuOffset + subMenuWidth + subMenuWidth) > mainWindowWidth ) {
          var newSubMenuPosition = subMenuWidth;
          $(this).find('ul.sub-menu ul.sub-menu').css({
            left: -newSubMenuPosition - 6,
            right: 'auto',
          });
        }
      }
    });
  }

  function headerSetup() {
    if ( $('body').hasClass('block-header-video-active') ) {
      $('#nav-bar').removeClass('block-lite-bg-light').addClass('block-lite-bg-dark');
      $('#header').removeClass('block-lite-bg-light').addClass('block-lite-bg-dark');
      $('.wp-custom-header').removeClass('block-lite-bg-light').addClass('block-lite-bg-dark');
    }
    if ( $('.wp-custom-header').hasClass('block-lite-bg-light') ) {
      $('#nav-bar').addClass('block-lite-bg-light');
      $('#header').addClass('block-lite-bg-light');
    }
    if ( $('.wp-custom-header').hasClass('block-lite-bg-dark') ) {
      $('#nav-bar').addClass('block-lite-bg-dark');
      $('#header').addClass('block-lite-bg-dark');
    }
    if ( $('.blog.block-header-inactive #header, .block-header-inactive.error404 #header, .block-header-inactive.block-no-img #header, .block-singular .banner-img').hasClass('block-lite-bg-dark') ) {
      $('#nav-bar').addClass('block-lite-bg-dark');
    }
    if ( $('.block-header-inactive.block-no-img #header, .block-header-inactive.archive #header, .block-header-inactive.error404 #header, .block-singular .banner-img').hasClass('block-lite-bg-light') ) {
      $('#nav-bar').addClass('block-lite-bg-light');
    }
  }

  function brightnessSetup() {
    /* Check Element BG Brightness ---------------------*/
    if ( $('.banner-img').length ) {
      $('.banner-img').bgBrightness();
    }
    if ( $('.wp-custom-header').length ) {
      $('.wp-custom-header').bgBrightness();
    }

    /* Check Element BG Color ---------------------*/
    $('.block-header-inactive #header').bgBrightness();
    $('body.custom-background').bgBrightness();
    $('.single .previous-post').bgBrightness();
    $('.single .next-post').bgBrightness();
    $('.footer').bgBrightness();
  }

  function modifyPosts() {

    $(".previous-post, .next-post").click(function() {
      window.location = $(this).find("a").attr("href");
      return false;
    });

    /* Toggle Mobile Menu Icon ---------------------*/
    $('.menu-toggle').on('click touchstart', function() {
      $('.icon-menu-open').toggle();
      $('.icon-menu-close').toggle();
    });

    // Properly update the ARIA states on focus (keyboard) and mouse over events
    $( '[role="menubar"]' ).on( 'focus.aria  mouseenter.aria', '[aria-haspopup="true"]', function ( ev ) {
      $( ev.currentTarget ).attr( 'aria-expanded', true );
    } );

    // Properly update the ARIA states on blur (keyboard) and mouse out events
    $( '[role="menubar"]' ).on( 'blur.aria  mouseleave.aria', '[aria-haspopup="true"]', function ( ev ) {
      $( ev.currentTarget ).attr( 'aria-expanded', false );
    } );

    /* Animate Page Scroll ---------------------*/
    $(".scroll").click(function(event){
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
    });

    /* Fit Vids ---------------------*/
    $('.content').fitVids();

  }

  $( document )
  .ready( removeNoJsClass )
  .ready( sidrMenu )
  .ready( menuOffset )
  .ready( brightnessSetup )
  .ready( modifyPosts )
  .on( 'post-load', modifyPosts );

  $( window )
  .load( headerSetup )
  .resize( menuOffset );

})( jQuery );
