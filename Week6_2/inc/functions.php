<?php

    //Start session first
    //Check if user is logged in, if not please prompt them to login
    session_start();

    function secure(){
        if(!isset($_SESSION['id'])){
            header('Location: login.php');
        }
    }

    function set_message($message, $classname){
        $_SESSION['message'] = $message;
        $_SESSION['classname'] = $classname;
    }

    function get_message(){
        if(isset($_SESSION['message'])){
          echo 
          '<div class="alert alert-' . $_SESSION['classname'] . '">' . 
             $_SESSION['message'];
          '</div>';
          unset($_SESSION['message']);
          unset($_SESSION['classname']);
        }
      }
?>