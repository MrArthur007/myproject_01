<?php 
    if(isset($_SESSION['page_id']) == session_id()) {
    class LoginRegis extends DB {
        public function Login($username ,$password) {

                    try {
                        
                        $login_stmt = $this->connected()->prepare("SELECT * FROM admin_user WHERE username = :uname AND password = :pass");
                        $login_stmt->bindParam(":uname" ,$username);
                        $login_stmt->bindParam(":pass" ,$password);
                        $login_stmt->execute();

                        while ($row = $login_stmt->fetch(PDO::FETCH_ASSOC)) {
                            $db_userID = $row['user_id'];
                            $db_user = $row['username'];
                            $db_pass = $row['password'];

                        }

                        if($username == isset($db_user) AND $password == isset($db_pass)) {
                            $_SESSION['user_id'] = $db_userID;
                            $_SESSION['login'] = $username;
                            $_SESSION['login_success'] =  "<script>alert('เข้าสู่ระบบ...');</script>" .
                            sleep(3) . header("location: Admin/index_admin.php");

                        } else {

                            return $_SESSION['error'] = "ไอดี หรือ พาสเวริด์ผิด !!";
                            header("location: /myproject_01/login_admin.php");

                        }

                    } catch (PDOException $e) {
                        echo "Something Wrong!!" . $e->getMessage();
                    }
            
        }

    }


    } else {
        echo "Access Denide";
    }
?>
