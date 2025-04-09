<?php

class First_block{

    public static function register(){
      echo 'test';
     echo get_class();
      //  add_action( 'admin_menu', array( get_class(), 'add_admin_menu' ));
    } 
    

}