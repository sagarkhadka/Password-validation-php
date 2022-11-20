<?php

session_start();

$showAlert = false;
$showError = false;
$exists = false;
include 'db_con.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = mysqli_real_escape_string($con, $_POST["fullName"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $mobile = mysqli_real_escape_string($con, $_POST["mobile"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirmpassword = mysqli_real_escape_string($con, $_POST["confirmpassword"]);

    # Password Hashing
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $cpass = password_hash($confirmpassword, PASSWORD_DEFAULT);

    # Checks if the Email is already
    # associated with another email or not
    $sql = "select * from register where email = '$email'";
    $result = mysqli_query($con, $sql);

    $num = mysqli_num_rows($result);
    
    if ($num > 0) {
        echo '<div style=" font-size: 18px; color: red;">Email Already Exist</div>';
    }
    else {
        if($password === $confirmpassword) {
            # inserts data to the database
            $sql = "INSERT INTO `register` (`fullname`, `email`, `pnumber`, `fpassword`, `cpassword`) VALUES ('$fullName', '$email', '$mobile', '$pass', '$cpass')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                $showAlert = true;
            }
            
        }
        else {
            echo '<div style=" font-size: 18px; color: red;">Password did not match</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <!-- Google reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    if ($showAlert) {
            echo '<div style=" font-size: 18px; color: green;">Sucessfully Created User</div>';
            // header('location:index.php');
        }

        if ($showError) {
            echo '$showError';
        }

        if ($exists) {
            echo '$exists';
        }
    ?>

    <div class="form_layout">
        <form id="form" class="form_container" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Register</h1>
            <div class="field">
                <input type="text" name="fullName" class="enterName" autocomplete="off" required>
                <label for="fullName" class="label-name">
                    <span class="content-name">Full Name</span>
                </label>
            </div>
                
            <div class="field">
                <input type="text" name="email" class="enterEmail" autocomplete="off" required>
                <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                </label>
            </div>

            <div class="field">
                <input type="text" name="mobile" minlength="10" maxlength="10" autocomplete="off" required>
                <label for="mobile" class="label-name">
                    <span class="content-name">Mobile</span>
                </label>
            </div>
                
            <div class="field">
                <input type="password" id="password" class="password" onkeyup="trigger()" name="password" autocomplete="off" required>
                
                <label for="password" class="label-name">
                    <span class="content-name">Password</span>
                </label>
            </div>
            
            <div class="indicator">
                <span class="weak"></span>
                <span class="medium"></span>
                <span class="strong"></span>
            </div>
            
            <ul style="width: 88%; justify-content: right; margin: auto;">
                <li>Must contain small letter and capital letters</li>
                <li>Must contain numbers and characters</li>
                <li>Should be atleast 8 character</li>
            </ul>
            
            
            <div class="field">
                <input type="password" class="password" name="confirmpassword" autocomplete="off" required>
                <label for="confirmpassword" class="label-name">
                    <span class="content-name">Confirm Password</span>
                </label>
            </div>
            
           
            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LcOJ6QgAAAAAOIuIKA4fDfUDVTse3fICI1B-YEG" data-callback="enableBtn"></div>
            </div>

            <div class="btn">
                <button type="submit" class="button" id="submit" disabled="disabled">
                    <span class="btn_text">signup</span>
                </button>
                <script type="text/javascript">
                    // JS to enable button only if captcha is solved
                    function enableBtn() {
                        document.getElementById("submit").disabled = false;
                    }
                </script>
            </div>
                                
            <div class="link">
                <p>Already have an account <span><a href="./index.php" rel="noopener noreferrer">Login</a></span>? </p>
            </div>
        </form>
    </div>
    <script src="./JS/app.js"></script>
</body>
</html>