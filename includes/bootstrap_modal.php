<?php
/**
 * Main function for the modals.
 *
 * this is the main function. it gets the modal data, generates the markup then
 * outputs it, and the triggers, to the page.
 *
 * @since 1.0.0
 *
 * @author Taras Gavrysh <ter4444@gmail.com>
 *
 */
function bootstrap_modal_add_to_page(){
  // gets the data for modal - title & content
  $data = bootstrap_modal_get();
  // generate markup for the modal
  $markup = bootstrap_modal_generate( $data );
  // for extendability the option is there to return or echo modal
  // we tell it to echo in the render function here
  $options['echo'] = true;
  $result = false;
  // render the markup to the page. returns true if the modal was rendered
  $result = bootstrap_modal_render($markup, $options);
  // if the markup was rendered add trigger script immediately after
  if($result){
    bootstrap_modal_triggers();
  }
}
// hook the main function to wp_footer
add_action( 'wp_footer', 'bootstrap_modal_add_to_page', 100 );

/**
 * Get Modal Data
 *
 * gets the title and content for the the modal and returns it
 *
 * @since 1.0.0
 *
 * @author Taras Gavrysh <ter4444@gmail.com>
 *
 * @param int $post_id An ID of a post to get the data from
 * @return array $data Array with the title and content
 *
 */
function bootstrap_modal_get( $post_id = 0 ){
  // if no id was passed then get latest modal data
  if($post_id === 0 ){
    $args = array(
      'numberposts' => 1,
      'post_type' => 'bootstrap_modal'
    );
    $latest_modal = get_posts($args);
    $latest_modal_id = absint( $latest_modal[0]->ID );
  }
  // grab title and post content and return them
  $data['title'] = get_the_title( $latest_modal[0]->ID );
  $data['content'] = $latest_modal[0]->post_content;
  // return the data array
  return $data;
};

/**
 * Generate Markup
 *
 * builds the markup needed to create a bootstrap modal popup
 *
 * @since 1.0.0
 *
 * @author Taras Gavrysh <ter4444@gmail.com>
 *
 * @param array $options Array with modal data and options
 * @return string $modal_markup Markup to render
 *
 */
function bootstrap_modal_generate( $options = array() ){
  // if we have no options or very small body content return
  if( empty($options) && strlen( $options['content'] ) > 5 ){
    return;
  }
  // we'll be generating a standard modal with a header, close button and a body
  // buffer the output
  ob_start(); ?>
  <!-- Modal -->
  <div class="modal fade" id="bsModalPlugin" tabindex="-1" role="dialog" aria-labelledby="bsModalPluginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <?php if( $options['title'] ) { ?>
            <h5 class="modal-title" id="bsModalPluginLabel"><?php echo esc_html( $options['title'] ); ?></h5>
          <?php } ?>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--?php echo $options['content']; ?-->
          <!--#TODO this stuff should be dynamic!-->
          <?php echo do_shortcode( '[contact-form-7 id="19" title=""]' ) ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END Modal -->
  <?php
  // get the buffer
  $modal_markup = ob_get_clean();
  // return the markup for render
  return $modal_markup;
}


/**
 * Render
 *
 * render the markup to the page or return it
 *
 * @since 1.0.0
 *
 * @author Taras Gavrysh <ter4444@gmail.com>
 *
 * @param string $modal An ID of a post to get the data from
 * @param array $options Array containing options for output
 * @return booleen If we rendered return true else return string $modal
 *
 */
function bootstrap_modal_render($modal, $options){
  // test we have markup to output.
  // done by checking length is greater than an arbritary amount of characters
  if( strlen( $modal ) > 10 ){
    // when echo is passed as true do that or we should return the markup
    if( true === $options['echo'] ){
      echo $modal;
      return true;
    }
    // since echo was false return $modal again
    return $modal;
  }
}

/**
 * Triggers
 *
 * outputs a trigger script to the page to show the modal
 *
 * @since 1.0.0
 *
 * @author Taras Gavrysh <ter4444@gmail.com>
 *
 */
function bootstrap_modal_triggers(){
  // trigger the modal with javascript after a number of seconds
  ?>
  <script>
      jQuery( document ).ready( function(){
          var $trigger = jQuery('#userFormModalTrigger')
          $trigger.on('click', function () {
              jQuery('#bsModalPlugin').modal('show');
          })
      });
  </script>
  <?php
}
