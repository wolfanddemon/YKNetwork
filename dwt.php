<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 15:09
 */
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init_d.php');

$action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'type';

//get dwt_type and dwt_id (Dreamweaver Template) from url
//they mean the same thing, which means we can optimise the program by eliminating the dwt_type
$dwt_type = $_REQUEST['dwt_type'];
$dwt_id = $_REQUEST['dwt_id'];

//determinate which type of template is demanded
if ($dwt_type == 'index') {
    $smarty->assign('shop_info', json_encode(get_shop_info($dwt_id)));
    $smarty->assign('navbar', json_encode(get_navbar($dwt_id)));
    $smarty->assign('banner', json_encode(get_banner($dwt_id)));
    $smarty->display('edit/index.html');

} elseif ($dwt_type == 'cart') {
    $smarty->display('edit/cart.html');
} elseif ($dwt_type == 'goods') {
    $smarty->display('edit/goods.html');
} elseif ($dwt_type == 'promotion') {
    $smarty->display('edit/promotion.html');
} elseif ($dwt_type == 'user') {
    $smarty->display('edit/user.html');
}

//type_id is component_type_id
function get_dwt_info($dwt_id, $type_id)
{
    //$GLOBALS['db'] 是指的数据库连接类
    $db = $GLOBALS['db'];

    //select * from (database name) (table name) where
    $sql = 'select lbi_id,lbi_type,type_id,lbi_num from' . $GLOBALS['ecs']->table("admin_dwt") .
        'WHERE dwt_id=' . $dwt_id . ' and type_id=' . $type_id . "  and sysid='" . $GLOBALS["sysid"] . "'";

    //here we get the (lbi_id) (lbi_type) (type_id) (lbi_num) type_id means component_id
    //the result type is an associate array
    $result = $db->getRow($sql);

    //array() 函数用于创建数组，以保存数据
    $dwt_info = array();

    //
    $current_lbi = get_current_lbi($dwt_id, $result['type_id'], $result['lbi_id']);

    //dwt_info is an associate array which has 8 attributes
    $dwt_info['dwt_id'] = $dwt_id;
    $dwt_info['type_id'] = $result['type_id'];
    $dwt_info['item_num'] = $current_lbi['item_num'];
    $dwt_info['max_num'] = $current_lbi['max_num'];
    $dwt_info['lbi_num'] = $result['lbi_num'];
    $dwt_info['current_lbi_id'] = $result['lbi_id'];
    $dwt_info['current_lbi_title'] = $current_lbi['lbi_title'];
    $dwt_info['lbis'] = get_lbis($dwt_id, $result['type_id']);
    return $dwt_info;
}

function get_header($dwt_id)
{
    return get_dwt_info($dwt_id, 1);
}

function get_shop_info($dwt_id)
{
    return get_dwt_info($dwt_id, 2);
}

function get_banner($dwt_id)
{
    return get_dwt_info($dwt_id, 3);
}

function get_navbar($dwt_id)
{
    return get_dwt_info($dwt_id, 4);
}

function get_recommend($dwt_id)
{
    return get_dwt_info($dwt_id, 5);
}

function get_footer($dwt_id)
{
    return get_dwt_info($dwt_id, 6);
}


function get_current_lbi($dwt_id, $type_id, $lbi_id)
{
    $db = $GLOBALS['db'];
    $sql = 'select lbi_title,item_num,max_num
        from ' . $GLOBALS['ecs']->table("admin_dwt_lbi") . '
        where dwt_id=' . $dwt_id . ' and type_id=' . $type_id . ' and lbi_id=' . $lbi_id . ' and sysid="' . $GLOBALS["sysid"] . '"';
    return $db->getRow($sql);
}

function get_lbis($dwt_id, $type_id)
{
    $db = $GLOBALS['db'];
    $sql = 'select lbi_id,lbi_title,lbi_name,item_num,max_num
        from ' . $GLOBALS['ecs']->table('admin_dwt_lbi') . '
        where dwt_id=' . $dwt_id . ' and type_id=' . $type_id . ' and sysid="' . $GLOBALS["sysid"] . '"';
    $result = $db->getAll($sql);
    $lbis = array();
    foreach ($result as $lbi) {
        $lbis[$lbi['lbi_name']] = $lbi;
        $lbis[$lbi['lbi_name']]['items'] = get_items($dwt_id, $type_id, $lbi['lbi_id'], $lbi['item_num']);
    }
    return $lbis;
}

function get_items($dwt_id, $type_id, $lbi_id, $item_num)
{
    $db = $GLOBALS['db'];
    $sql = 'select item_id,item_title,item_img
        from ' . $GLOBALS['ecs']->table('admin_dwt_lbi_items') . '
        where dwt_id=' . $dwt_id . ' and type_id=' . $type_id . ' and lbi_id=' . $lbi_id . ' and sysid="' . $GLOBALS["sysid"] . '"
        limit ' . $item_num;
    $result = $db->getAll($sql);
    $items = array();
    foreach ($result as $item) {
        $items[$item['item_id']]['item_title'] = $item['item_title'];
        $items[$item['item_id']]['item_id'] = $item['item_id'];
        $items[$item['item_id']]['item_img'] = $item['item_img'];
    }
    return $items;
}

