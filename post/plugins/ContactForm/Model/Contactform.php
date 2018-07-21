<?php
/**
 * ContactForm for CakePHP 2.x
 *
 * Copyright 2012-2013 by Patrick Hafner (http://patrickhafner.de)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 */

App::uses('AppModel', 'Model');

/**
 * Contact Model
 *
 * @property Contact $Contact
 */
class Contactform extends AppModel {

    public $validationDomain = 'contactform';

    public $_schema = array(
        'Name' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => '50'),
        'Mail' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => '80'),
        'Phone' => array('type' => 'int', 'null' => false, 'default' => '', 'length' => '11'),
        'Subject' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => '80'),
        'Message' => array('type' => 'text', 'null' => false, 'default' => ''),
        'Spamprotection' => array('type' => 'string', 'null' => false, 'default' => ''),
    );

    public $useTable = false;
    
    public $validate = array(
        'Name' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'required' => true,
                'message' => 'Please insert your name'
            )
        ),
        'Mail' => array(
            'email' => array(
                'rule' => array('email'),
                'required' => true,
                'message' => 'Please insert your email address'
            )
        ),
        'Phone' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'required' => true,
                'message' => 'Please enter your phone number'
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please insert correct phone number'
            ),
            'between' => array(
                'rule' => array('lengthBetween', 10, 11),
                'message' => 'Phone number should between 10 to 11 digit'
            )
        ),
        'Subject' => array(
            'notblank' => array(
                'rule' => array('notblank'),
                'required' => true,
                'message' => 'Please enter your subject'
            )
        ),
        'Message' => array(
            'notblank' => array(
                'rule' => 'notblank',
                'required' => true,
                'message' => 'Please enter your message'
            ),
            'between' => array(
                'rule' => array('checkSpamProtection'),
                'message' => 'Please check reCaptcha below'
            )
        ),
        
    );

    
    public function checkSpamProtection() {
        if( isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] ){
            var_dump($_POST);
            $secret = "6LcaSmUUAAAAAIg0a3BhnJNKga_qPHBLfQRY4Q7G";
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
            var_dump($rsp);
            $arr = json_decode($rsp,TRUE);
            if($arr['success']){
                return true;
            }else{
                return false;
            }
            
        }
    }

}