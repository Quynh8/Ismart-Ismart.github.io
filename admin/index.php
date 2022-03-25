<?php

/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */

$app_path = dirname(__FILE__);//APPATH:Đường dẫn ứng dụng,dirname:lấy folder chứa file
define('APPPATH', $app_path);
/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';//core_folder:chứa bộ lõi
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';//mvc
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);


/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';//chứa những hàm làm việc chung
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);


/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';//thư viện chứa như database,pagging
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);


/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';//chứa layout dùng chung như header,footer,sidebar
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';//cấu hình hệ thống
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';

/**Lưu ý: DIRECTORY_SEPARATOR như là dấu '/' */
