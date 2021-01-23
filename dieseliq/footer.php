<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
      <footer id="footer-bottom">
          <div id="footer-area" class="clearfix">
          </div>
          <div id="bottom" class="clearfix">
            <?php echo get_theme_mod('dieseliq_copyright_setting'); ?>
      	</div>
      </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.min.js"></script>
    <script type="text/javascript">
      jQuery(function($){
        $('#filter').submit(function(){
          var filter = $('#filter');
          $.ajax({
            url:filter.attr('action'),
            data:filter.serialize(), // form data
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
              filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
              filter.find('button').text('Find Part Numbers'); // changing the button label back
              $('#response').html(data); // insert data
            }
          });
          return false;
        });
      });
    </script>
    <script type="text/javascript">
      function getFilter(){
        var selected = $('#enginecat').val();
        $('.d-none').css('display','inline');
      }
    </script>
    <script>
      window.onscroll = function() {scrollFunction()};
      function scrollFunction() {
         var shareBox = document.getElementById("shareBox");
      if (shareBox !== null) {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
             shareBox.className = "fixed";
          } else {
              shareBox.className = "";
          }
        }
      }
    </script>
    <script type="text/javascript">
    	jQuery(document).ready(function($){
    		jQuery(window).load(function() {
 
			  var transition_effect = "fade";
			  var transition_delay = "5000";
			  var transition_duration = "1000";

			  jQuery('#slider-wrap').cycle({ 
			    fx: transition_effect, // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle') 
			    next: '#nav-slider .nav-next',    // advances slideshow to next slide 
			    prev: '#nav-slider .nav-previous',    // advances slideshow to previous slide
			    timeout: transition_delay,  // milliseconds between slide transitions (0 to disable auto advance) 
			    speed: transition_duration,  // speed of the transition (any valid fx speed value) 
			    pause: 1,     // true to enable "pause on hover" 
			    pauseOnPagerHover: 1, // true to pause when hovering over pager link 
			    width: '100%',
			    containerResize: 0,   // resize container to fit largest slide 
			    fit: 1,
			    after: function (){
			        jQuery(this).parent().css("height", jQuery(this).height());
			      }
			  });

			});
		});
    </script>

    <?php wp_footer(); ?>
  </body>
</html>