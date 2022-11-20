<?php
session_start();

if(!isset($_SESSION['fullname'])) {
    header ('location: index.php');
}
?>

<!DOCTYPE html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <style>
    .logo {
    width: 2px;
}

h1, h4 {
    font-family: 'outfit' sans-serif;
    font-weight: 700;
}

p {
    font-weight: 400;
}

a {
    text-decoration: none;
    color: #646464;
}

ul {
    list-style: none;
}

ul li {
    display: inline-block;
    padding-left: 2rem;
}

.wrapper {
    display: flex;
    justify-content: space-between;
    width: 82%;
    margin: 0 auto;
}

.space {
    margin: 18px 0;
}

nav {
    background-color: #edf0f1;
}
  </style>
  <body>
    <nav>
        <div class="wrapper">
            <h4 class="space">UoS</h4>
            <ul class="space">
                <li><?php echo $_SESSION['fullname']; ?></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="hl display-4">Login System</h1>
            <p>This site is developed my me i.e. Sagar Khadka as a assignment for cyber security. It is developed using PHP and we can only access this page after login. From here we can change password and logout of the account.</p>
            <hr class="my-4">
            <p>To Logout Press the button.</p>
            <a href="./logout.php" role="button" class="btn btn-primary btn-lg">Logout</a>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>