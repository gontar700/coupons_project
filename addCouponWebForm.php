<?php
/**
 * Created by PhpStorm.
 * User: danielgontar
 * Date: 7/25/2015
 * Time: 5:11 PM

<div style="width:200px;height:300px;background:gray;text-align:center;font-family:arial;font-size:20px;font-weight:bold;">Daniel is the king  */
/**
 *Checking whether this web form page was called by previous user web form or not, if not it will be a administrator
 * Webform , if yes it will be a simple page that either gives feedback that data is ok or points out the faults */
if (empty($_POST)) // administrator reachrd this page
{
    ?>
       <h2><i><b><div align="center"><div style="width:300px;height:30px;background:#deb887;text-align:center;font-family:guttman;font-size:20px;font-weight:bold;horiz-align:center">Add new coupon Web Form</div></div></b></i></h2><hr></div>
    <form action = "addcoupon.php" method = "post" enctype="multipart/form-data">
    <table border ='0'>
            <tr><td>Coupon Id:</td><td> <input type="text" name="coupon_id"></td></tr>
            <tr><td>Coupon Category:</td><td> <select name="coupon_category">
                                <option value="1">Food/Bavreges</option>
                                <option value="2">Cars</option>
                                <option value="3">Tennis gear</option>
            <tr><td>Business id:</td><td><input type="text" name="business_id"></td></tr>
            <tr><td>Coupon Name:</td><td><input type="text" name="coupon_name"></td></tr>
            <tr><td>Coupon Description:</td><td><input type="text" name="coupon_desc"></td></tr>
            <tr><td>Business Name: </td><td> <select name="business_name">
                                <option value="Mcdonalds">Mcdonalds</option>
                                <option value="Pepsi">Pepsi</option>
                                <option value="CokaCola">CokaCola</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Honda">Honda</option>
                                <option value="Babolat">Babolat</option>
                                <option value="Head">Head</option>
                                <option value="Wilson">Wilson</option>
                                            </select></td>
    <tr><td><INPUT  TYPE="hidden" NAME = "MAX_FILE_SIZE" value = "1000000000000000000"/><INPUT TYPE="file" NAME = "file_data"/> </td><td> <INPUT TYPE= "submit" value="send file" name="submit"/></td></tr>
    </form>
    </table>
    <hr>
    <div align="center" style="font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif"><a href="mainMenu.php">Return to main menu</a></div></h1>
        <?php
}
else // user reached this page
{

}
?>