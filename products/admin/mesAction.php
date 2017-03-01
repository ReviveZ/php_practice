<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2016/1/4 1:07
 */
function editMes($link,$id,$where){

    if(empty($_POST['m_status'])){
        alertMes("请选择状态","../manage/answer-message.php?id={$id}");
    }else {
        $sql = "select * from message29 where m_id={$id}";
        @$arr = fetchOne($link, $sql);
            $arr['m_status'] = $_POST['m_status'];

        if (!empty($_POST['m_reply1'])) {
            $arr['m_reply1'] = $_POST['m_reply1'];
        }


$arr['m_op'] = $_SESSION['id'];
        $arr['m_update'] = date('Y-m-d G:i:s');
        @$sql1 = "update message29 set m_status = '{$arr['m_status']}',m_reply1='{$arr['m_reply1']}',m_op= '{$arr['m_op']}',m_update = '{$arr['m_update']}'";
        if (updateOne($link, $sql1)) {
            alertMes("回复成功！", $where);
        } else {
            alertMes("回复失败", $where);
        }
    }
}

function delMes($link,$id,$where){
    $sql="DELETE from message29 where m_id={$id}";
    if(delete($link,$sql)){
        alertMes('删除成功',$where);
    }else{
        alertMes('删除失败',$where);
    }
}

function editCom($link,$id,$where){

    if(empty($_POST['c_status'])){
        alertMes("请选择状态","../manage/answer_comment.php?id={$id}");
    }else {
        $sql = "select * from comment29 where c_id={$id}";
        @$arr = fetchOne($link, $sql);
        $arr['c_status'] = $_POST['c_status'];

        if (!empty($_POST['c_reply1'])) {
            $arr['c_reply1'] = $_POST['c_reply1'];
        }
        $arr['c_update'] = date('Y-m-d G:i:s');
//        @$sql1 = "update message29 set m_status = '{$arr['m_status']}',m_reply1='{$arr['m_reply1']}',m_update = '{$arr['m_update']}'";
        if (update($link,'comment29',$arr,"c_id='".$id."'")) {
            alertMes("回复成功！", $where);
        } else {
            alertMes("回复失败", $where);
        }
    }
}


function editNotice($link,$id,$where){


        $sql = "select * from notice29 where n_name={$id}";
        @$arr = fetchOne($link, $sql);
        $arr['n_state'] = '关闭';
        if (update($link,'notice29',$arr,"n_name='".$id."'")) {
            alertMes("关闭成功！", $where);
        } else {
            alertMes("关闭失败", $where);
        }

}
function addNotice($link){
    if(empty($_POST['n_name'])) {
        alertMes("添加失败，请填入必选项", "../manage/info_notice.php");
    } else {
        $arr = $_POST;
        $arr['n_name'] = $_POST['n_name'];
        $arr['n_op'] = $_SESSION['id'];
        $arr['n_state'] = '开启';
        $arr['n_create'] = date('Y-m-d G:i:s');
        $arr['n_content'] = $_POST['n_content'];
        $res = insert($link, "notice29", $arr);
        if ($res) {
            alertMes("添加成功！", "../manage/info_notice.php");
        } else {
            alertMes("添加失败！", "../manage/info_notice.php");
        }
    }

}

