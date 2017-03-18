<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity=
          "sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd"
          crossorigin="anonymous">
</head>
<?php
session_start();
function __autoload($classname)
{
    include $classname . ".php";
}
$userNameForm = $_POST['username'];
$passwordForm = $_POST['password'];
$obCouponPlatform = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object
$userNameAdmin = $obCouponPlatform->getAdminUserName()->fetch_row()[0];
$passwordAdmin = $obCouponPlatform->getAdminPassword()->fetch_row()[0];
try
{
    if ($userNameForm!==$userNameAdmin or !password_verify($passwordForm,$passwordAdmin))
    {
        throw new DbConnectionException ("Admin username or admin password is incorrect. <br>");
    }
    else
    {
        $_SESSION['username'] = $userNameForm;
        header('Location: mainMenu.php');
    }
}
catch (DbConnectionException $e)
{
    echo "<h1 style=\"text-align: center\">" . $e->getmessage()."</h1>";
    echo '<html><head>
    <!-- Required meta tags always come first -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=
            \"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css\"
          integrity=
                  \"sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd\"
          crossorigin=\"anonymous\">
    </head><body><button id="backBtn" class="btn btn-primary" onclick="back()">Back</button><script>function back(){window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project")}</script></body></html>';
}
$obCouponPlatform->closeConnection();
?>

</html>
