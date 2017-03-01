<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 12:01
 */
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/libs".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.ROOT."/admin".PATH_SEPARATOR.ROOT."/login".PATH_SEPARATOR.get_include_path());
require_once 'libs/mysql.php';
require_once 'image.php';
require_once 'common.php';
require_once 'strings.php';
require_once 'adminAction.php';
require_once 'page.php';
require_once "proAction.php";
require_once 'mesAction.php';
//require_once 'addadminaction.php';
//require_once 'pro.inc.php';
//require_once 'album.inc.php';
//require_once 'upload.func.php';
//require_once 'user.inc.php';
$link = connect();

