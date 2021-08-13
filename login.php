<?php 

include("./includes/header.php");
require("./dbconnect.php");

session_start();

if(!empty(@$_SESSION['name'] && @$_SESSION['managerId'])){
    header("Location: dashboard");
}


if(isset($_POST['btn-login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    $errors = ['username'=>'', 'password'=>''];

    $login_error = "";

    if(empty($username)){
        $errors['username'] = "This field is required";
    }
    if(empty($password)){
        $errors['password'] = "This field is required";
    }


    if(!array_filter($errors)){

        $stmt = $pdo->prepare("SELECT * FROM managers WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if(!$stmt->rowCount() > 0){
            $login_error = "No account is associated with the username provided";
        }else{

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!password_verify($password, $user['password'])){
                $login_error = "Username and password do not match";
            }else{
                $_SESSION['name'] = $user['name'];
                $_SESSION['managerId'] = $user['managerId'];

                header("Location: dashboard");
            }
        }
    }
    
}




?>


    
<div class="container-login">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="header">
            <h1>Login</h1>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="" class="form-control" value="<?php echo htmlspecialchars(@$username) ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>

        <button type="submit" class="btn" name="btn-login">Login</button>

        <div><?php echo @$login_error ?></div>

    </form>
</div>

<?php include("./includes/footer.php") ?>
