<?php

class UserController extends AppController
{
    const LOGIN_PAGE = 'login';
    const LOGIN_END_PAGE = 'login_end';
    const REGISTER = 'register';
    const REGISTER_END = 'register_end';

    public function index()
    {
        //TODO: ADMIN PROFILE
    }
    
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

    public function login() 
    {
        if (is_logged_in()) {
            redirect(url('user/login_end'));
        }

        $params = array(
            'username' => trim(Param::get('username')),
            'password' => Param::get('password')
        );

        $user = new User($params);
        $page = Param::get(PAGE_NEXT, self::LOGIN_PAGE);
       
        switch ($page) {
            case self::LOGIN_PAGE:
                break;
            case self::LOGIN_END_PAGE:
                try {
                    $user->login();
                } catch (ValidationException $e) {
                    $page = self::LOGIN_PAGE;
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page); 
    }
        
    public function logout() 
    {
        session_destroy();
        redirect(url('user/login'));
    }
}