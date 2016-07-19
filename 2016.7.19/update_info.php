<?php
/**
 * Created by PhpStorm.
 * User: shenlin
 * Date: 2016/6/20
 * Time: 15:19
 */

//以下两行好像是默认路径的设置
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init_d.php');

//引入老李自定义的调试调试文件
include_once (PUBLIC_PATH.'includes/cls_debug.php');

//获取新的test_info
$page_info = $_POST['page_info'];
//weixindebug($page_info,'$page_info',0,'','','','admin/update_info.php:13',13);

update_database($page_info);

weixindebug($page_info,'$page_info',0,'','','','admin/update_info.php:13',13);


function update_database($page_info){
    $db = $GLOBALS['db'];
    $sql= "delete from `ecs_supplier_page_lib_items`";
    $db->query($sql);

    foreach ($page_info as $item) {
        $sql = "insert into  `ecs_supplier_page_lib_items`
        (`sysid`,`supplier_id`,`page_id`,`row`,`lib_id`,`lib_title`,`lib_text`,`img_url1`,`img_url2`,`img_url3`,`img_url4`,`item_url1`,`item_url2`,`item_url3`,`item_url4`,`lib_num`,`lib_num_max`,`visibility`)
        values('".$item['sysid']."',".$item['supplier_id'].",".$item['page_id'].",".$item['row'].",".$item['lib_id'].",'".$item['lib_title']."','".$item['lib_text']."',".
            "'".$item['img_url1']."','". $item['img_url2']."','".$item['img_url3']."','".$item['img_url4']."','". $item['item_url1']."','".$item['item_url2']."','".$item['item_url3']."','".$item['item_url4']."',". $item['lib_num'].",".$item['lib_num_max'].",".$item['visibility'].")";
        

        $db->query($sql);
echo $sql;
    }
}


