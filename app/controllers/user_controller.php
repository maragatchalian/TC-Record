<?php

class UserController extends AppController
{
    const REGISTER = 'register';
    const REGISTER_END = 'register_end';

public function register() 
    {
        $params = array(
            'username' => Param::get('username'),
            'first_name' => Param::get('first_name'),
            'last_name' => Param::get('last_name'),
            'email' => Param::get('email'),
            'password' => Param::get('password'),
            'confirm_password' => Param::get('confirm_password'),
            'user_type' => Param::get('user_type')
        );

        $user = new User($params);
        $page = Param::get(PAGE_NEXT, self::REGISTER);
        
        switch ($page) {    
            case self::REGISTER:
                break;
            
            case self::REGISTER_END:
                try {
                    $user->register();
                } catch (ValidationException $e) {
                    $page = self::REGISTER;
                }
                break;

            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }
}