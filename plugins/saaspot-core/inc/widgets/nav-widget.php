<?php
/*
 * Navigation Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class saaspot_navigation_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'saspot-navigation-widget',
      VTHEME_NAME_P . __( ': Navigation', 'saaspot' ),
      array(
        'classname'   => 'saspot-navigation-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays navigations list.', 'saaspot' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'nav_list'   => '',
      'nav_child'    => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'saaspot' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Menu List
    $nav_list_value = esc_attr( $instance['nav_list'] );
    $nav_list_field = array(
      'id'    => $this->get_field_name('nav_list'),
      'name'  => $this->get_field_name('nav_list'),
      'type' => 'select',
      'options' => 'menus',
      'title' => __( 'Select Menu List :', 'saaspot' ),
    );
    echo cs_add_element( $nav_list_field, $nav_list_value );

    // Display Menu Children
    $nav_child_value = esc_attr( $instance['nav_child'] );
    $nav_child_field = array(
      'id'    => $this->get_field_name('nav_child'),
      'name'  => $this->get_field_name('nav_child'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'saaspot' ),
      'off_text'  => __( 'No', 'saaspot' ),
      'title' => __( 'Display Menu Children :', 'saaspot' ),
      'help' => __( 'This only shows first level of child menus.', 'saaspot' ),
    );
    echo cs_add_element( $nav_child_field, $nav_child_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['nav_list']   = strip_tags( stripslashes( $new_instance['nav_list'] ) );
    $instance['nav_child']  = strip_tags( stripslashes( $new_instance['nav_child'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title      = apply_filters( 'widget_title', $instance['title'] );
    $nav_list   = $instance['nav_list'];
    $nav_child  = $instance['nav_child'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    $nav_child_class = ( $nav_child === '1' ) ? ' nav-enabled-child' : ' nav-notenabled-child';
    echo '<div class="'. $nav_child_class .'">';
    $nav_child = ( $nav_child === '1' ) ? '2' : '1';
    $nav_menu_args = array(
      'fallback_cb' => '',
      'menu'        => $nav_list,
      'depth'       => $nav_child,
      'items_wrap'  => '<ul id="%1$s" class="%2$s saspot-sidenav">%3$s</ul>',
    );
    wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_list, $args, $instance ) );
    echo '</div>';

    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function saaspot_navigation_widget_function() {
  register_widget( "saaspot_navigation_widget" );
}
add_action( 'widgets_init', 'saaspot_navigation_widget_function' );