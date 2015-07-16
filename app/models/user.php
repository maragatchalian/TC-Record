<?php

class User extends AppModel
{
    const MIN_USERNAME_LENGTH = 2;
    const MIN_FIRST_NAME_LENGTH = 2;
    const MIN_LAST_NAME_LENGTH = 2;
    const MIN_EMAIL_LENGTH = '';
    const MIN_PASSWORD_LENGTH = 8;
    const MIN_USER_TYPE_LENGTH = 1;

    const MAX_USERNAME_LENGTH = 20;
    const MAX_FIRST_NAME_LENGTH = 30;
    const MAX_LAST_NAME_LENGTH = 30;
    const MAX_EMAIL_LENGTH = 50;
    const MAX_PASSWORD_LENGTH = 20;
    const MAX_USER_TYPE_LENGTH = 20;
  
    public $validation = array(
        'username' => array(
            'length' => array(
                'validate_between', self::MIN_USERNAME_LENGTH, self::MAX_USERNAME_LENGTH
            ),
            'valid' => array(
                'is_valid_username'
            ),
            'exist' => array(
                'is_username_exist'
            ),
        ),

        'first_name' => array(
            'length' => array(
                'validate_between', self::MIN_FIRST_NAME_LENGTH, self::MAX_FIRST_NAME_LENGTH
            ),
            'valid' => array(
                'is_valid_name'
            ),
        ),
        
        'last_name' => array(
            'length' => array(
                'validate_between', self::MIN_LAST_NAME_LENGTH, self::MAX_LAST_NAME_LENGTH
            ),
            'valid' => array(
                'is_valid_name'
            ),
        ),

        'email' => array(
            'length' => array(
                'validate_between', self::MIN_EMAIL_LENGTH, self::MAX_EMAIL_LENGTH
            ),

            'exist' => array(
                'is_email_exist',
            )
        ),

        'password' => array(
            'length' => array(
                'validate_between', self::MIN_PASSWORD_LENGTH, self::MAX_PASSWORD_LENGTH
            )
        ),
        'confirm_password' => array(
            'match' => array(
                'is_password_match'
            )
        ),
        'user_type' => array(
            'length' => array(
                'validate_between', self::MIN_USER_TYPE_LENGTH, self::MAX_USER_TYPE_LENGTH
            ),
        )        
    );

    public function is_password_match()
    {
        return $this->password == $this->confirm_password;
    }

    public function is_username_exist()
    {
        $db = DB::conn();
        $username_exist = $db->row("SELECT username FROM user WHERE username = ?", array($this->username));
        
        return (!$username_exist);
    }

    public function is_email_exist()
    {
        $db = DB::conn();
        $email_exist = $db->row("SELECT email FROM user where email = ?", array($this->email));
        
        return (!$email_exist);
    }

    public function register()
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }

        try {
            $db = DB::conn(); 
            $registered = date("Y-m-d H:i:s");
            $db->begin();
            
            $params = array( 
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'password' => md5($this->password),
                'email' => strtolower($this->email),
                'user_type' => $this->user_type,
                'registered' => $registered
            );
            
            $db->insert('user', $params); 
            $db->commit();
        
        } catch(Exception $e) {
            $db->rollback();
            throw $e;
        }
    }

    public function login()
    {
        $db = DB::conn();
        $params = array(
            'username' => $this->username,
            'password' => md5($this->password)
        );

        $user = $db->row("SELECT id, username FROM user WHERE BINARY username = :username AND BINARY password = :password", $params);

        if(!$user) {
            throw new RecordNotFoundException('No Record Found');
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }

    public static function get($user_id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM user WHERE id = ?", array($user_id));
        
        return $row;
    } 
}