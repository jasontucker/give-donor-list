<?php
/**
  * Version: 1.0
  * Author: Jason Tucker
  * Author URI: http://www.jasontucker.us/
  * License: GPLv2
  *
  **/

add_shortcode( 'give_donor_list', 'recent_givedonorlist' );

/**
 * Output recent GIVE donors in a list
 * @param array $atts 
 * @return list of names comma seperated
 */
function recent_givedonorlist( $atts ) {

    $args = shortcode_atts( 
        array(
            'number'   =>   '100',
            'id'       =>   '1'
        ), $atts
    );
    $number = (int) $args['number'];
    $id = (int) $args['id'];


    $output = '';
    $names  = '';
    $donors = '';

    //First check that Give exist
        $donors = Give()->customers->get_customers( $number, $id );
        foreach ( $donors as $donor ) {
            if (sizeof($names) > 1){
                $output .= $names.$donor->name.", ";
            }else{
                $output .= $names.$donor->name;
            }
        }
    return $output;
}