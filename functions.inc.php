<?php

function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con, $str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($con, $str);
    }
}

function check_login($con){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query= "select * from users where id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("location:home.php");
    die();
}

/*
function get_product($type='',$limit=''){
    $sql= "select * from product";
    if($type == 'latest'){
        $sql.=" order by id desc";
    }
    if($limit != ''){
        $sql.=" limit $limit";
    }
    $res = mysqli_query($con,$sql);
    $data =array();
    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;

}
*/

?>