<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['blog_post_types']	= array('blog'=>'blog_post','article'=>'article','news'=>'');


$config['decimal_point'] = '.';
$config['thousand_separator'] = ',';


#setting this config value to non empty will override the packge price currency.
#so if you have paypal enabled then remeber to use a currency which is supported by paypal. Otherwise your paypal payment will not work
#use this settings only if you want to enable bank payment and disable paypal payment
$config['package_currency'] = '';

#example
#$config['package_currency'] = 'USD';


#active languages 
$config['active_languages'] = array('ru'=>'Русский');

#use ssl
$config['use_ssl'] = 'no';


#if you use google map as banner then loading all posts can slowdown your site
#so define how many recent posts you want to show there
$config['banner_map_post_limit'] = 200;

