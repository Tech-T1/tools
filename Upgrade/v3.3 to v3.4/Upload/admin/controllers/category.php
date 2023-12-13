<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2022 ProThemes.Biz
 *
 */

$pageTitle = 'Categories';
$subTitle = 'Manage Categories';
$fullLayout = 1; $footerAdd = true; $footerAddArr = array();

if(isset($_SESSION['msgCallBack'])){ $msg = $_SESSION['msgCallBack']; unset($_SESSION['msgCallBack']); }

if($pointOut === 'ajax'){
    if($args[0] === 'getData'){

        $table = 'category';
        $primaryKey = 'id';

        $columns = array(
            array( 'db' => 'sort', 'dt' => 0 ),
            array( 'db' => 'name', 'dt' => 1 ),
            array( 'db' => 'enabled',  'dt' => 2 ),
            array( 'db' => 'id',  'dt' => 3)
        );

        $columns2 = array(
            array( 'db' => 'sort', 'dt' => 0 ),
            array( 'db' => 'name', 'dt' => 1 ),
            array( 'db' => 'enabled',  'dt' => 2 ),
            array( 'db' => 'actions',  'dt' => 3)
        );
        
		//Fix for PDO connection with custom port number
		$dbHostArr = explode(':',$dbHost);
		if(isset($dbHostArr[1]))
		    $dbHost = $dbHostArr[0].';port='.$dbHostArr[1];

        $sql_details = array('user' => $dbUser, 'pass' => $dbPass, 'db'   => $dbName, 'host' => $dbHost);

        echo json_encode(
            SEOCATE::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $columns2, $con )
        );
        die();
    }
}

//Status Change
if($pointOut === 'status'){
    $status = false;
    if($args[0] === 'disable')
        $status = false;
    else
        $status = true;
    $id = $args[1];
    
    $query = "UPDATE category SET enabled='$status' WHERE id='$id'";
    mysqli_query($con, $query);
    $_SESSION['msgCallBack'] = successMsgAdmin('Status updated successfully');
    redirectTo(adminLink($controller,true));
}

//Delete category
if($pointOut === 'delete'){
    $deleteId = $args[0];
    $query = "DELETE FROM category WHERE id='$deleteId'";
    $result = mysqli_query($con, $query);

    if (mysqli_errno($con))
        $_SESSION['msgCallBack'] = errorMsgAdmin('Unable to delete the category!');
    else
        $_SESSION['msgCallBack'] = successMsgAdmin('Category deleted successfully');

    redirectTo(adminLink($controller,true));
}

//Pages
if($pointOut === 'page'){
    $editPage = false;
    $cat = array('enabled' => true, 'name' => '', 'des' => '');

    if(isset($_POST['cat'])){
        $cat = array_map_recursive(function ($item) use ($con) {
            return escapeTrim($con, $item);
        }, $_POST['cat']);

        if($cat['sort'] == '')
            $cat['sort'] = 1;

        $cat['tools'] = arrToDbStr($con, $cat['tools']);
    }

    //Adding new pages
    if($args[0] === 'add') {
        $subTitle = 'Create a New Category';

        if(isset($_POST['cat'])){

            if(insertToDbPrepared($con, 'category', $cat))
                $_SESSION['msgCallBack'] = errorMsgAdmin('Unable to create category!');
            else
                $_SESSION['msgCallBack'] = successMsgAdmin('New category created successfully');

            redirectTo(adminLink($controller, true));
        }

    }
    if($args[0] === 'edit') {
        $editPage = true;
        $editID = intval($args[1]);

        if(isset($_POST['cat'])){

            if(updateToDbPrepared($con, 'category', $cat, array('id' => $editID)))
                $msg =  errorMsgAdmin('Unable to update category!');
            else
                $msg = successMsgAdmin('Category updated successfully');
        }

        $cat = mysqliPreparedQuery($con, 'SELECT name,des,enabled,sort FROM category WHERE id=?', 'i', array($editID));
    }

    $tools = $ctools = $cat['tools'] = array();
    $result = mysqli_query($con, 'SELECT id,tools FROM category');
    while ($row = mysqli_fetch_array($result)) {
        if($editPage) {
            if(intval($row['id']) !== $editID)
                $ctools = array_merge($ctools, dbStrToArr($row['tools']));
            else
                $cat['tools'] = dbStrToArr($row['tools']);
        }else{
            $ctools = array_merge($ctools, dbStrToArr($row['tools']));
        }
    }
    $ctools = array_unique($ctools);
    $result = mysqli_query($con, 'SELECT id,uid,tool_name FROM seo_tools');
    while ($row = mysqli_fetch_array($result)){
        $tools[$row['uid']] = shortCodeFilter($row['tool_name']);
    }
}

//Category Option Status Change
if($pointOut === 'category-option'){
    $cstatus = 1;

    if($args[0] === 'disable')
        $cstatus = 0;

    mysqli_query($con, "UPDATE category_option SET category=$cstatus WHERE id=1");
    $_SESSION['msgCallBack'] = successMsgAdmin('Category option updated successfully');
    redirectTo(adminLink($controller,true));
}

$cRes = mysqli_query($con, 'SELECT category FROM category_option WHERE id=1');
$cSet = mysqli_fetch_assoc($cRes);
$category = filBoolean($cSet['category']);