/**
 * This file adds some LIVE preview to the Under Construction Maintenance Mode in WordPress Customizer.
 */
(function($) {
  $(document).ready(function() {
    // header text h1
    // wp.customize( 'ucmm_wpbrigade_customization[ucmm_logo_width]', function( value ) {
    // 	value.bind( function( newval ) {
    //
    //     if ( '' != newval) {
    //       $('#customize-preview iframe').contents().find( '.ucmm-logo img' ).css( 'width',  newval );
    //     }
    //
    // 	} );
    // } );
    // // header text h1
    // wp.customize( 'ucmm_wpbrigade_customization[ucmm_logo_height]', function( value ) {
    // 	value.bind( function( newval ) {
    //
    //     if ( '' != newval) {
    //       $('#customize-preview iframe').contents().find( '.ucmm-logo img' ).css( 'height',  newval );
    //     }
    //
    // 	} );
    // } );
    // header text h1
    wp.customize("ucmm_wpbrigade_customization[header_text]", function(value) {
      value.bind(function(newval) {
        if ("" != newval) {
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo h1")
            .html(newval);
        }else {
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo h1")
            .html(newval);
        }
      });
    });

    // footer text h2

    wp.customize("ucmm_wpbrigade_customization[footer_text]", function(value) {
      value.bind(function(newval) {
        if ("" != newval) {
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo h2")
            .html(newval)
				}
				else{ $("#customize-preview iframe")
					.contents()
					.find(".ucmm-logo h2")
					.html(newval)
				}
      });
    });
    // footer text "Love" hide and show
    wp.customize(
      "ucmm_wpbrigade_customization[ucmm_display_footer_text]",
      function(value) {
        value.bind(function(newval) {
          if (true==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".footer-love")
              .show();
          } else {
            $("#customize-preview iframe")
              .contents()
              .find(".footer-love")
              .hide();
          }
        });
      }
    );
    // change background image
    wp.customize("ucmm_wpbrigade_customization[setting_background]", function(
      value
    ) {
      value.bind(function(newval) {
        if ("" !== newval) {
          $("#customize-preview iframe")
            .contents()
            .find("body")
            .css({
              "background-image": "url(" + newval.toString() + ")", 
            });
        }
      });
    });

    //Background Cover 
    wp.customize("ucmm_wpbrigade_customization[background_cover]",
      function (value)
      {
      value.bind(function(newval) {
        if ('' !== newval) {
          $("#customize-preview iframe")
            .contents()
            .find("html>body")
            .css({
              "background-size": newval,
            });
        }
      });
    });
 
    //Background Repeat
    wp.customize("ucmm_wpbrigade_customization[background_repeat]",
      function (value)
      {
      value.bind(function(newval) {
        if ('' !== newval) {
          $("#customize-preview iframe")
            .contents()
            .find("html>body")
            .css({
              "background-repeat": newval,
            });
        }
      });
      });
    
    //background Position
    wp.customize("ucmm_wpbrigade_customization[background_position]",
    function (value)
    {
    value.bind(function(newval) {
      if ('' !== newval) {
        $("#customize-preview iframe")
          .contents()
          .find("html>body")
          .css({
            "background-position": newval,
          });
      }
    });
  });
  
    // change  logo image
    wp.customize("ucmm_wpbrigade_customization[ucmm_logo]", function(value) {
      value.bind(function(newval) {
        if ("" !== newval) {
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo img")
            .show();
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo img")
            .attr("src", newval);
        } else {
          $("#customize-preview iframe")
            .contents()
            .find(".ucmm-logo img")
            .hide();
        }
      });
    });
    // width change logo
    wp.customize("ucmm_wpbrigade_customization[ucmm_logo_width]", function( value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find(".ucmm-logo img")
						.css({ width: newval });
				}
			});
			
    });
    // height logo change
    wp.customize("ucmm_wpbrigade_customization[ucmm_logo_height]", function( value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find(".ucmm-logo img")
						.css({ height: newval });
				}
      });
    });

    //style apply
    wp.customize("ucmm_wpbrigade_customization[ucmm_custom_css]", function(  value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find("style")
						.append(newval);
				}
      });
    });
//Header Color
    
    wp.customize("ucmm_wpbrigade_customization[ucmm_header_text_color]", function( value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find("h1")
						.css({ color: newval });
				}
      });
		});
		wp.customize("ucmm_wpbrigade_customization[ucmm_schedule_text_color]", function( value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find(".ucmm_schedule_time")
						.css({ color: newval });
				}
      });
		});
    wp.customize("ucmm_wpbrigade_customization[ucmm_footer_text_color]", function( value ) {
      value.bind(function(newval) {
				if ('' !== newval) {
					$("#customize-preview iframe")
						.contents()
						.find("h2")
						.css({ color: newval });
				}
      });
    });
        // Show Schedule Date and time
        wp.customize( "ucmm_wpbrigade_customization[ucmm_schedule_show_end_time]", function(value) {
            value.bind(function(newval) {
              if (true==newval) {
                $("#customize-preview iframe")
                  .contents()
                  .find(".ucmm_schedule_time")
                  .show();
              } else {
                $("#customize-preview iframe")
                  .contents()
                  .find(".ucmm_schedule_time")
                  .hide();
              }
            });
          }
        );
    
     // Show Schedule Date and time
     wp.customize( "ucmm_wpbrigade_customization[ucmm_facebook]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-facebook-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-facebook-icon").css({"display": "inline-block"});
          }
        });
      }
     );
    
     wp.customize( "ucmm_wpbrigade_customization[ucmm_youtube]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-youtube-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-youtube-icon").css({"display": "inline-block"});
          }
        });
      }
     );
     wp.customize( "ucmm_wpbrigade_customization[ucmm_linkedin]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-linkedin-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-linkedin-icon").css({"display": "inline-block"});
          }
        });
      }
     );
    
     wp.customize( "ucmm_wpbrigade_customization[ucmm_twitter]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-twitter-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-twitter-icon").css({"display": "inline-block"});
          }
        });
      }
     );
    
     wp.customize( "ucmm_wpbrigade_customization[ucmm_instagram]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-instagram-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-instagram-icon").css({"display": "inline-block"});
              
          }
        });
      }
     );
     wp.customize( "ucmm_wpbrigade_customization[ucmm_pinterest]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-pinterest-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-pinterest-icon").css({"display": "inline-block"});
              
          }
        });
      }
     );
     wp.customize( "ucmm_wpbrigade_customization[ucmm_codepen]", function(value) {
        value.bind(function(newval) {
          if (""==newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-codepen-icon")
              .css({"display":'none'});
          }
          else {
            $("#customize-preview iframe")
              .contents()
              .find(".ucmm-codepen-icon").css({"display": "inline-block"});
          }
        });
      }
    );

    //  End time show on select
     // footer text "Love" hide and show
    wp.customize( "ucmm_wpbrigade_customization[ucmm_schedule_end]", function (value) {
        value.bind(function (newval) {
          if (true == newval) {
            $("#customize-preview iframe")
              .contents()
              .find(".footer-love")
              .show();
          }
        });
      }
    );
    //auto focus to
    if (UCMM.autoFocus) {
      wp.customize.panel( 'ucmm_wpbrigade_panel' ).focus()
    }
  });
})(jQuery);
