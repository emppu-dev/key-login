<?php
require_once "config.php";

session_start();

$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["key"])) {
        $enteredKey = $_POST["key"];

        if (hash_equals($storedKey, $enteredKey)) {

            $_SESSION["logged_in"] = true;

            session_regenerate_id(true);

            header("Location: home.php");
            exit();
        } else {
            $errorMsg = "Invalid key!";
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css?ver=1">
</head>
<body>
    <form class="form" method="POST">
        <p class="form-title">Login</p>
        <div class="input-container">
            <input name="key" placeholder="Enter secret key" type="password">
            <span>
                <svg width="46" height="46" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </span>
        </div>
        <button class="submit" type="submit">Login</button>
        <p class="error"><?php echo $errorMsg; ?></p>
    </form>
</body>
</html>
