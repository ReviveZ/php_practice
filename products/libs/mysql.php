<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/27 22:25
 */

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PWD","123456");
define("DB_DBNAME","ProCon29");

//连接数据库
function connect()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD) or die("数据库连接失败Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    $link->select_db(DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}
//插入数据
function insert($link,$table,$array){
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    if(mysqli_query($link ,$sql))
        return true;
    else
        return false;
}

//更新数据
function update($link ,$table,$array,$where){
    $str = null;
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";

    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysqli_query($link ,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
function updateOne($link,$sql){
    $result=mysqli_query($link ,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
//删除
function delete($link ,$sql){

    if(mysqli_query($link,$sql))
        return true;
    else
        return false;
}


// 得到指定一条记录

function fetchOne($link ,$sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link ,$sql);
    @$row=mysqli_fetch_assoc($result);
    return $row;
}



// 得到结果集中所有记录 ...
function fetchAll($link ,$sql){
    $result=mysqli_query($link ,$sql);

    while (@$row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return @$rows;
}

// 得到结果集中的记录条数
function getResultNum($link ,$sql){
    $result=mysqli_query($link ,$sql);
    return mysqli_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId($link){
    return mysqli_insert_id($link);
}

