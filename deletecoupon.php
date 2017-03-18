<html>
<head>
    <title>Daniel Gontar's web project portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity=
          "sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd"
          crossorigin="anonymous">
    <script>
        function del(id)
        {
            if (confirm("Delete coupon " + id + "?") == true) {
                var request;
                if (navigator.appName == "Microsoft Internet Explorer") {
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }
                else {
                    request = new XMLHttpRequest();
                }
                request.abort();
                request.open("GET", "deletecouponfunction.php?id=" + id, true);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        alert(request.responseText);
                    }
                };
                request.send(null);
            }
            redirect1();
        }
        function redirect1()
        {
            window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project/deletecoupon.php");
        }
    </script>
</head>
<body>
<?php

function __autoload($classname)
{
    include $classname . ".php";
}
try
{
    $ob = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object
    $result = $ob->getCoupons(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Coupon Id</th>
            <th>Coupon Category Id</th>
            <th>Business Id</th>
            <th>Coupon Name</th>
            <th>Coupon Description</th>
            <th>Coupon Image</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        while (list($id, $category_id, $business_id, $name, $description, $image_file_name) = $result->fetch_row()) {
        ?>
        <tr class="success">
            <td> <?php echo $id ?></td>
            <td> <?php echo $category_id ?></td>
            <td> <?php echo $business_id ?></td>
            <td> <?php echo $name ?></td>
            <td> <?php echo $description ?></td>
            <td><div class="col-sm-6">
                    <img src="<?php echo "images/" . $image_file_name ?>" class="img-fluid" alt="Responsive image">
                </div>
            </td>
            <td><button id="backBtn" class="btn btn-primary" onclick="del(<?php echo $id?>)">Delete</button></td>
        </tr>
        <?php }?>
    </table>
    <?php
    $ob->closeConnection();
}
catch (DbConnectionException $e)
{
    echo "<p>" . $e->getmessage();
}
echo '<button id="backBtn" class="btn btn-primary" onclick="back()">Back</button><script>function back(){window.location.replace("http://www.danielgontar.com/web_portfolio/coupons_project/mainMenu.php")}</script></body></html>';
?>
</body>
</html>
