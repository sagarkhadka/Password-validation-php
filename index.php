<?php
session_start();

include 'db_con.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Email Search
    $email_search = "select * from register where email = '$email'";
    $query = mysqli_query($con, $email_search);

    // checks if email is registered or not
    $email_count = mysqli_num_rows($query);

    if($email_count) {
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['fpassword'];

        $_SESSION['fullname'] = $email_pass['fullname'];

        $match = password_verify($password, $db_pass);

        if($match) {
            echo 'login';
            header('location:home.php');
        }
        else {
            echo '<div style="font-size: 18px; color: red">Incorrect Email or Password</div>';
        }
    }
    else {
        echo '<div style="font-size: 18px; color: red">email not found</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- google reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="form_layout">
        <form id="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form_container" method="POST">
        <h1>Login</h1>
            <div class="field">
                <input type="text" name="email" autocomplete="off" required>
                <label for="email" class="label-name">
                    <span class="content-name">Email</span>
                </label>
            </div>
                
            <div class="field">
                <input type="password" name="password"  autocomplete="off" required>
                <label for="password" class="label-name">
                    <span class="content-name">Password</span>
                </label>
            </div>
            
            <!-- Google reCaptcha -->
            <div class="g-recaptcha" data-sitekey="6LcOJ6QgAAAAAOIuIKA4fDfUDVTse3fICI1B-YEG" data-callback="enableBtn"></div>

            <div class="btn">
                <button name="submit" type="submit" class="button" id="submit" disabled="disabled">
                    <span class="btn_text">Login</span>
                </button>
                
                <script type="text/javascript">
                    // JS to enable button only if captcha is solved
                    function enableBtn() {
                        document.getElementById("submit").disabled = false;
                    }
                </script>
            </div>


            <div class="link">
                <p>Need to <span><a href="./signup.php">Signup</a></span>? </p>
            </div>
        </form>
    </div>
</body>
</html>