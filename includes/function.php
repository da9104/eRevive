<?php
function Signup(array $data) 
{
    $Data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //Registration Data Filtering....
    $first_name = stripcslashes(strip_tags($Data['first_name']));
    $last_name = stripcslashes(strip_tags($Data['last_name']));
    $email = stripcslashes(strip_tags($Data['email']));
    $password = htmlspecialchars($Data['password']);
    //Just In Case....
    $Errors = [];

    if (preg_match('/[^A-Za-z0-9_]/', $first_name)) {
        $Errors['first_name'] = "Sorry, Please enter a valid first name";
    }

    if (preg_match('/[^A-Za-z0-9_]/', $last_name)) {
        $Errors['last_name'] = "Sorry, Please enter a valid last name";
    }

    //Check if the email exists...
    $emailExists = checkUsername($email);
    if ($emailExists['status']) {
        $Errors['email'] = "Sorry, This email already exist.";
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
            'email' => $email,
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

function checkUsername(string $email) : array
{
    $dbHandler = DbHandler();
    $statement = $dbHandler->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
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

/**
 * @param Array $data
 * @return Array 
 * @desc Creates a new user and returns a boolean indicating the status of the              operation...
 */
function Register(array $data)
{
    $dbHandler = DbHandler();
    $statement = $dbHandler->prepare("INSERT INTO `users` (first_name, last_name, email, password, status, created_at, updated_at) VALUES (:first_name, :last_name, :email, :password, :status, :created_at, :updated_at)");
    
    //#Defaults....
    $timestamps = date('Y-m-d H:i:s');
    $status = 1;
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    //Values Bindings....
    $statement->bindValue(':first_name', $data['first_name'], PDO::PARAM_STR);
    $statement->bindValue(':last_name', $data['last_name'], PDO::PARAM_STR);
    $statement->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $statement->bindValue(':status', $status, PDO::PARAM_INT);
    $statement->bindValue(':created_at', $timestamps, PDO::PARAM_STR);
    $statement->bindValue(':updated_at', $timestamps, PDO::PARAM_STR);
    
    $result = $statement->execute();
    if ($result) {
        return true;
    } else {
        return false;
    }
}


  function Login(array $data)
  {
    $Data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $Errors = [];
    $Email = stripcslashes(strip_tags($Data['email']));
    $Password = htmlspecialchars($Data['password']);

    //check if the email address exists in the database...
    $Email_check = checkEmail($Email);
    if (!$Email_check['status']) {
      $Errors['error'] = "Invalid credentials passed. Please, check the Email or Password and try again.";
      return $Errors;
    } else {
      //we check that the password matches the hash
      if (password_verify($Password, $Email_check['data']['password'])) {
        $_SESSION['current_session'] = [
          'status' => 1,
          'user' => $Email_check['data'],
          'date_time' => date('Y-m-d H:i:s'),
        ];
        header("Location: admin.php");
      }

      if (!password_verify($Password, $Email_check['data']['password'])) {
        $Errors['error'] = "Invalid credentials passed. Please, check the Email or Password and try again.";
        return $Errors;
      }
    }
  }

  function checkEmail(string $email) : array
  {
    $dbHandler = DbHandler();
    $statement = $dbHandler->prepare("SELECT `first_name`, `last_name`, `email`, `password` FROM `users` WHERE `email` = :email");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
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

function getUsers($conn)
{
    // prepare and execute query
    $query = $conn->prepare('SELECT * From users');
    $query->execute();
 
    // return the users
    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getPosts($conn, ?int $id = null)
{
    // base parameters
    $parameters = [];
    // base query string
    $queryString = 'select * from posts';

    if (! is_null($id)) {
        // add to query string with where
        $queryString .= ' where id = :id';
        // set parameters to match the where
        $parameters['id'] = $id;
    }

    // prepare and execute query
    $query = $conn->prepare($queryString);
    $query->execute($parameters);

    // return the posts
    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getPostwithId($conn, ?int $id = null)
{
    // prepare and execute query
    $query = $conn->prepare('SELECT * From posts where id = :id');
    $query->execute(['id' => $id]);

    // return the post
    return $query->fetch(PDO::FETCH_OBJ);
}

function createPost($conn, array $postData)
{
    // base query string
    $queryString = 'INSERT Into posts (`author_id`, `title`, `brand`, `price`, `con`, `body`) values (:author_id, :title, :brand, :price, :con, :body)';

    // prepare and execute query
    $query = $conn->prepare($queryString);
    $query->execute($postData);
}

function updatePost($conn, array $postData)
{
    // base query string
    $queryString = 'UPDATE posts SET `author_id` = :author_id, WHERE `id` = :id, `title` = :title, `brand` = :brand, `price` = :price, `con` = :con, `body` = :body';

    // prepare and execute query
    $query = $conn->prepare($queryString);
    $query->execute($postData);
}


function getUserWithId($conn, int $id)
{
    // prepare and execute query
    $query = $conn->prepare('SELECT * from users where id = :id');
    $query->execute(['id' => $id]);

    // return the user
    return $query->fetch(PDO::FETCH_OBJ);
}
