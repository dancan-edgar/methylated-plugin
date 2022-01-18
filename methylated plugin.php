<?php
/**
 * @package MethylatedPlugin
 */
/*
 Plugin Name: Methylated Plugin
 PLugin URL: https://github.com/dancan-edgar/methylated-plugin.git
Description: This is my first Wordpress plugin
Version: 1.0.0
Author: Ampeire Edgar
Author URI: https://github.com/dancan-edgar
License: GPLv2 or later
Text Domain: methylated-plugin
 */

/*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

//if( ! defined( 'ABSPATH')){
//    die;
//}

defined('ABSPATH') or die('Hey, Run for your life silly human. Am coming for you');

if( ! function_exists('add_action')){
    echo "Hey, you can't access this file you silly human";
    die;
}

class MethylatedPlugin
{

    // Constructor
    public function __construct()
    {
        add_action('init',array($this,'custom_post_type'));
    }

    // methods
    function activate(){
        // Generate a CPT
        $this->custom_post_type();
        // Flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate(){
        // Flush rewrite rules
        flush_rewrite_rules();
    }
    function custom_post_type(){
        register_post_type('book',['public' => true,'label' => 'Books']);
    }



}


if (class_exists('MethylatedPlugin')){

    $methylatedPlugin = new MethylatedPlugin();
}

// TRIGGERS ( Wordress Plugins )


// Hooks

// activation

register_activation_hook( __FILE__,array($methylatedPlugin,'activate'));
// deactivation

register_deactivation_hook(__FILE__,array($methylatedPlugin,'deactivate'));
// uninstall;

