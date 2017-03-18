<html>
<head>
    <title>Daniel Gontar's web project portfolio</title>
    <link rel="stylesheet" href="http://localhost/web_portfolio/design.css">
</head>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 8/4/2015
 * Time: 8:05 PM
 */
function __autoload($classname)
{
    include $classname . ".php";
}
try
{
    $ob = new CouponsPlatformDAO("localhost", "gontar_700", "pboimyYi1", "gontar_couponsdeliveryplatform"); // creating couponsplatformDAO new object
    $result = $ob->getCoupons(); ?>
    <table border ="1"><?php
    while (list($id, $category_id, $business_id, $name, $description, $image_file_name) = $result->fetch_row()) {
        ?>
        <tr>
        <td> <?php echo $id ?></td>
        <td> <?php echo $category_id ?></td>
        <td> <?php echo $business_id ?></td>
        <td> <?php echo $name ?></td>
        <td> <?php echo $description ?></td>
        <td><img src="<?php echo "images/" . $image_file_name ?>"</td></tr><?php
    }?>
    </table>
    <div align="center" style="font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif"><a href="mainMenu.php">Return to main menu</a></div></h1>
    <?php
    $ob->closeConnection();
}
catch (DbConnectionException $e)
{
    echo "<p>" . $e->getmessage();
}
?>