<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Umesh
 */
class User extends AppModel  {
    public $name = 'User';
    public $displayField = 'name';
    
    public $validate = array(
        'first_name' => array(
            'Please enter your name' => array(
                'rule'=>'notEmpty',
                'message'=>'Please enter your first name.'
            )
        ),
        
        'last_name' => array(
            'Please enter your name' => array(
                'rule'=>'notEmpty',
                'message'=>'Please enter your last name.'
            )
        ),
        
        'username'=>array(
            'The usename must be between 5 and 20 characters.'=>array(
                'rule'=>array('between',5,20),
                'message'=>'The usename must be between 6 and 20 characters.'
            ),
            'That username has already been taken.'=>array(
                'rule'=>'isUnique',
                'message'=>'That username has already been taken.'
            )
        ),
        'email'=>array(
            'Valid email'=>array(
                'rule'=>array('email'),
                'message'=>'Please enter a valid email address'
            )
        ),
        'phone_number'=> array(
            'Please enter your phone number.'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please enter your phone number.'
            )
        ),
        'password'=>array(
            'Not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please enter your password'
            ),
            'Match passwords'=>array(
                'rule'=>'matchPasswords',
                'message'=>'Your passwords do not match'
            )
        ),
        'password_confirmation'=>array(
            'Not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please confirm your password'
            )
        ),
        'role' => array(
        'rule' => array('inList',array('admin', 'vendor')), 
        'message' => 'Please supply a valid IP address.'
    )
    );

    public function matchPasswords($data) {
        if($data['password'] == $this->data['User']['password_confirmation']) {
            return true;
        }
        $this->invalidate('password_confirmation', 'Your passwords do not match');
        return false;
    }
    
    public function beforeSave($options = array()) {
        if(isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);     
        }
        return true;
    
     }
    
}
?>