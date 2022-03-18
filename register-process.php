<?php
function Signup(array $data) 
    {
        $Data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //Registration Data Filtering....
        $first_name = stripcslashes(strip_tags($Data['fname']));
        $last_name = stripcslashes(strip_tags($Data['lname']));
        $username = stripcslashes(strip_tags($Data['username']));
        $password = htmlspecialchars($Data['password']);
        //Just In Case....
        $Errors = [];

        if (preg_match('/[^A-Za-z0-9_]/', $first_name)) {
            $Errors['fname'] = "Sorry, Please enter a valid first name";
        }

        if (preg_match('/[^A-Za-z0-9_]/', $last_name)) {
            $Errors['lname'] = "Sorry, Please enter a valid last name";
        }

        //Check if the email exists...
        $emailExists = checkEmail($username);
        if ($emailExists['status']) {
            $Errors['username'] = "Sorry, This email already exist.";
        }

        if (strlen($password) < 7) {
            $Errors['password'] = "Sorry, Use a stronger password";
        }

        if (count($Errors) > 0) {           
            $Errors['error'] = "Please, correct the Errors in your form in order to continue.";
            return $Errors;
        } else {
            //Create the new user...
            $Data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'password' => $password
            ];
            $registration = Register($Data);
            
            if ($registration) {
                //Before the redirect this would be a good time to send a mail or something in order to verify the user...
                array_pop($Data);
                $_SESSION['current_session'] = [
                    'status' => 1,
                    'user' => $Data,
                    'date_time' => date('Y-m-d H:i:s'),
                ];
                header("Location: admin.php");
            } else {
                //#You could probably notify the dev team within this line but this is just a demo still....
                $Errors['error'] = "Sorry an unexpected error and your account could not be created. Please try again later.";
                return $Errors;
            }
        }
    }


    function checkEmail(string $username) : array
    {
        $dbHandler = DbHandler();
        $statement = $dbHandler->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $statement->bindValue(':email', $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            $response['status'] = false;
            $response['data'] = [];
            return $response;
        }

        $response['status'] = true;
        $response['data'] = $result;
        return $response;
    }

    function Register(array $data)
    {
        $dbHandler = DbHandler();
        $statement = $dbHandler->prepare("INSERT INTO `users` (fname, lname, username, password) VALUES (:fname, :lname, :email, :password)");
        
        //#Defaults....
        $timestamps = date('Y-m-d H:i:s');
        $status = 1;
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        //Values Bindings....
        $statement->bindValue(':fname', $data['fname'], PDO::PARAM_STR);
        $statement->bindValue(':lname', $data['lname'], PDO::PARAM_STR);
        $statement->bindValue(':username', $data['username'], PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        
        $result = $statement->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
?>