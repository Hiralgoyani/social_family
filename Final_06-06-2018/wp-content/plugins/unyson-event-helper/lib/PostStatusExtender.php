<?php
/**
 * PostStatusExtender
 *
 * @author Hyyan Abo Fakher<hyyanaf@gmail.com>
 */
class PostStatusExtender
{

    /**
     * Extend
     *
     * Extend the current status list for the given post type
     *
     * @global \WP_POST $post
     *
     * @param string $postType the post type name , ex: product
     * @param array $states array of states where key is the id(state id) and value
     *                      is the state array
     */
    public static function extend($postType, $states = null)
    {

        foreach ($states as $id => $state) {
            register_post_status($id, $state);
        }

        add_action('admin_footer', function() use($postType, $states) {

            global $post;
            if (!$post || $post->post_type !== $postType) {
                return false;
            }

            foreach ($states as $id => $state) {

                printf(
                        '<script>'
                        . 'jQuery(document).ready(function($){'
                        . '   $("select#post_status").append("<option value=\"%s\" %s>%s</option>");'
                        . '   $("a.save-post-status").on("click",function(e){'
                        . '      e.preventDefault();'
                        . '      var value = $("select#post_status").val();'
                        . '      $("select#post_status").value = value;'
                        . '      $("select#post_status option").removeAttr("selected", true);'
                        . '      $("select#post_status option[value=\'"+value+"\']").attr("selected", true)'
                        . '    });'
                        . '});'
                        . '</script>'
                        , $id
                        , $post->post_status !== $id ? '' : 'selected=\"selected\"'
                        , $state['label']
                );

                if ($post->post_status === $id) {
                    printf(
                            '<script>'
                            . 'jQuery(document).ready(function($){'
                            . '   $(".misc-pub-section #post-status-display").text("%s");'
                            . '});'
                            . '</script>'
                            , $state['label']
                    );
                }
            }

            // auto save on change status
            echo '
            <script>
              jQuery("body").on("change", "select#post_status", function() {
                jQuery("#save-post").trigger("click");
              })
            </script>';
        });


        add_action('admin_footer-edit.php', function() use($states, $postType) {

            global $post;

            if (!$post || $post->post_type !== $postType) {
                return false;
            }

            foreach ($states as $id => $state) {
                printf(
                        '<script>'
                        . 'jQuery(document).ready(function($){'
                        . " $('select[name=\"_status\"]' ).append( '<option value=\"%s\">%s</option>' );"
                        . '});'
                        . '</script>'
                        , $id
                        , $state['label']
                );
            }
        });

        /*
        add_filter('display_post_states', function($states, $post) use($states, $postType) {

            foreach ($states as $id => $state) {
                if ($post->post_type == $postType && $post->post_status === $id) {
                    return array($state['label']);
                } else {
                    if (array_key_exists($id, $states)) {
                        unset($states[$id]);
                    }
                }
            }

            return $states;
        }, 10, 2);
        */
        add_filter('display_post_states', 'PostStatusExtender::display_post_states_filter', 10, 2);
    }

    public function display_post_states_filter($states = null, $post = null) {
      foreach ($states as $id => $state) {
          if ($post->post_type == $postType && $post->post_status === $id) {
              return array($state['label']);
          } else {
              if (array_key_exists($id, $states)) {
                  unset($states[$id]);
              }
          }
      }

      return $states;
    }
}
