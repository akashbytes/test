<?php

class Auth
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "users";

    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $category_id;

    public $error =false;
    public $success =false;
    public $msg ='';


    public function __construct($db)
    {
        $this->db_conn = $db;
    }

     // for edit user form when filling up
    function Login($username,$passwordAttempt)
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username";

        $stmt = $this->db_conn->prepare($sql);
        $stmt->bindValue(':username', $username);
    
        //Execute.
        $stmt->execute();
        
        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user === false){
                $this->error=true;
                $this->msg='Incorrect username / password combination!';
        } else{

            if(md5($passwordAttempt)==$user['password']){
                 
                 session_start();   
                //Provide the user with a login session.
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = time();
                
                ?>
                <script type="text/javascript">
                    window.location.href="dashboard.php"; 
                </script>
                <?php
                
            } else{
                $this->error=true;
                $this->msg='Incorrect username / password combination!';
            }
        }

    }

   

}







