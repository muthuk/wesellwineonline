<?php
/*
Plugin Name: TackThis! Retail Widget
Plugin URI: http://www.tackthis.com
Description: This plugin enables you to change your Wordpress into a full-fledge online shop using the highly popular TackThis! Retail Widget.
Version: 0.7 BETA
Author: Vincent Lau
Author URI: http://www.paywhere.com
*/

/*
TackThis! Retail Widget (Wordpress Plugin)
Copyright (C) 2011-2012 Vincent Lau
Contact me at vincent@paywhere.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

define('SHOP_CANNOT_USE_CART', 'Your shop is not configured to use this cart.');
define('ITEMS_IN_CART', 'items in Cart');
define('VIEW_CART', 'view cart');

//tell wordpress to register the tackthis shortcode in beta mode
add_shortcode("tackbeta", "tackbeta_handler");

function tackbeta_handler() {
  //run function that actually does the work of the plugin
  $tackbeta_output = tack_function('beta');
  //send back text to replace shortcode in post
  return $tackbeta_output;
}

//tell wordpress to register the tackthis shortcode
add_shortcode("tack", "tack_handler");

function tack_handler() {
  //run function that actually does the work of the plugin
  $tack_output = tack_function();
  //send back text to replace shortcode in post
  return $tack_output;
}

//front generator of the tackthis shortcode
function tack_function($mode='www') {
  $param = '';
  if($_GET['cart'] || $_GET['cart']>0) $param = 'cart='.$_GET['cart'];
  else if($_GET['pid'] || $_GET['pid']>0) $param = 'pid='.$_GET['pid'];
  else if($_GET['cid'] || $_GET['cid']>0) $param = 'cid='.$_GET['cid'];
  if($param) $params = $param.'&';

  //process plugin
  $tack_output = '<script src="http://'.$mode.'.tackthis.com/widget-validate.php?'.$params;

  //send back text to calling function
  return $tack_output;
}

//tell wordpress to register the tackthis shortcode
add_shortcode("this", "this_handler");

function this_handler() {
  //run function that actually does the work of the plugin
  $this_output = this_function();
  //send back text to replace shortcode in post
  return $this_output;
}

//back generator of the tackthis shortcode
function this_function() {
  //process plugin
  $this_output = '" type="text/javascript"></script>';

  //send back text to calling function
  return $this_output;
}


/* Creates a shopping cart widget for use in Wordpress, JS by Arulkumar */
class tackThisCartWidget extends WP_Widget
{
  
  function tackThisCartWidget()
  {
    $widget_ops = array('classname' => 'tackThisCartWidget', 'description' => 'Displays the items and price in your shopping cart.' );
    $this->WP_Widget('tackThisCartWidget', 'TackThis Cart', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'shopId' => '', 'pageId' => '', 'cartButton' => '', 'cartLabel' => '', 'cartClass' => '' ) );
    $shopId = $instance['shopId'];
	$pageId = $instance['pageId'];
	$cartButton = $instance['cartButton'];
	$cartButtonLabel = $instance['cartButtonLabel'];
	$cartButtonLabel = attribute_escape($cartButtonLabel);
	if(!$cartButtonLabel) $cartButtonLabel = VIEW_CART;
	$cartLabel = $instance['cartLabel'];
	$cartLabel = attribute_escape($cartLabel);
	if(!$cartLabel) $cartLabel = ITEMS_IN_CART;
?>
  <p><label for="<?php echo $this->get_field_id('shopId'); ?>">Shop ID: <input class="widefat" id="<?php echo $this->get_field_id('shopId'); ?>" name="<?php echo $this->get_field_name('shopId'); ?>" type="text" value="<?php echo attribute_escape($shopId); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('pageId'); ?>">Page ID: <input class="widefat" id="<?php echo $this->get_field_id('pageId'); ?>" name="<?php echo $this->get_field_name('pageId'); ?>" type="text" value="<?php echo attribute_escape($pageId); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('cartButton'); ?>">Custom Cart Button Image: <input class="widefat" id="<?php echo $this->get_field_id('cartButton'); ?>" name="<?php echo $this->get_field_name('cartButton'); ?>" type="text" value="<?php echo attribute_escape($cartButton); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('cartButtonLabel'); ?>">Custom Cart Button Label: <input class="widefat" id="<?php echo $this->get_field_id('cartButtonLabel'); ?>" name="<?php echo $this->get_field_name('cartButtonLabel'); ?>" type="text" value="<?php echo $cartButtonLabel; ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('cartLabel'); ?>">Custom Cart Label: <input class="widefat" id="<?php echo $this->get_field_id('cartLabel'); ?>" name="<?php echo $this->get_field_name('cartLabel'); ?>" type="text" value="<?php echo $cartLabel; ?>" /></label></p>
<?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['shopId'] = $new_instance['shopId'];
	$instance['pageId'] = $new_instance['pageId'];
	$instance['cartButton'] = $new_instance['cartButton'];
	$instance['cartButtonLabel'] = $new_instance['cartButtonLabel'];
	$instance['cartLabel'] = $new_instance['cartLabel'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
 	$widgetId = $instance['shopId'];
	$pageId = $instance['pageId'];
	$cartButton = $instance['cartButton'];
	$cartButtonLabel = $instance['cartButtonLabel'];
	if(!$cartButtonLabel) $cartButtonLabel = VIEW_CART;
	$cartLabel = $instance['cartLabel'];
	if(!$cartLabel) $cartLabel = ITEMS_IN_CART;
 
	global $post;
	$thePostID = $post->ID;
 
    echo $before_widget;
 
    if (empty($widgetId) || $widgetId<=0)
      echo SHOP_CANNOT_USE_CART;
	else {
	  $cartTheme = urlencode(get_bloginfo( 'stylesheet_url' ));
?>
        <div id="cart-shop">
			<iframe src="//www.tackthis.com/widget/shop/generate-cart-info.php?cartTheme=<?php echo $cartTheme; ?>&cartLabel=<?php echo $cartLabel; ?>" frameborder="0" scrolling="no" width="120" height="50"></iframe>
			<div class="clear"></div>
            <div class="cart-view"><a href="?page_id=<?php echo $pageId; ?>&cart=1">
<?php
	if(!$cartButton) echo $cartButtonLabel;
	else echo '<img src="'.$cartButton.'" alt="'.$cartButtonLabel.'" width="54" height="15" style="cursor:pointer" />';
?>
            </a></div>
		</div><!--/cart-shop-->
<?php
	}
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("tackThisCartWidget");') );
?>