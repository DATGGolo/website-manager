<?php

include 'DataBase.php';

function FindbyId($id) {
    $db = DB();
    $sql = "SELECT A\n" .
            "	.會員編號,\n" .
            "	A.\"會員帳號\",\n" .
            "	A.\"行程編號\",\n" .
            "	a1.\"行程名稱\",\n" .
            "	a1.\"行程日期\",\n" .
            "FROM\n" .
            "	\"會員資料\" A,\n" .
            "	\"行程資料\" a1 \n" .
            "WHERE\n" .
            "	A.\"行程編號\" = '" . $id . "' \n" .
            "	AND A.\"會員編號\" = a1.\"會員編號\" \n" .
            "ORDER BY\n" .
            "	a1.\"會員編號\";";
    $result = $db->query($sql);
    $out = false;
    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
//PDO::FETCH_OBJ 指定取出資料的型態
//        echo '<tr>';
//        echo '<td>' . $row->會員編號 . "</td><td>" . $row->會員帳號 . "</td>";
//        echo '</tr>';
        $schedule = $row->行程編號;
        echo '
        <hr/>
        <p>	編號：' . $row->會員編號. '</p>
        <p>     帳號：' . $row->會員帳號 . '</p>
        <p>     行程編號：' . $row->行程編號 . '</p>
        <p>     行程名稱：' . $row->行程名稱 . '</p>
        <P>     行程日期:' . $row->行程日期 . '</p>';
        $out = true;
    }
    if (!$out) {
        echo '<div class ="Err" style="color:red;">
        查不到資料！  請檢查輸入資料是否正確！</div>';
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }
}

function FindbyName($name) {
    $db = DB();
    $sql = "SELECT A\n" .
           "	.會員編號,\n" .
            "	A.\"會員帳號\",\n" .
            "	A.\"行程編號\",\n" .
            "	a1.\"行程名稱\",\n" .
            "	a1.\"行程日期\",\n" .
            "FROM\n" .
            "	\"會員資料\" A,\n" .
            "	\"行程資料\" a1 \n" .
            "WHERE\n" .
            "	A.\"行程編號\" = '" . $id . "' \n" .
            "	AND A.\"會員編號\" = a1.\"會員編號\" \n" .
            "ORDER BY\n" .
            "	a1.\"會員編號\";";
    $result = $db->query($sql);
    $out = false;
    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
//PDO::FETCH_OBJ 指定取出資料的型態
//        echo '<tr>';
//		  echo '<td>' . $row->會員編號 . "</td><td>" . $row->會員帳號 . "</td>";
//        echo '</tr>';

        echo '
        <hr/>
        <p>	編號：' . $row->會員編號. '</p>
        <p>     帳號：' . $row->會員帳號 . '</p>
        <p>     行程編號：' . $row->行程編號 . '</p>
        <p>     行程名稱：' . $row->行程名稱 . '</p>
        <P>     行程日期:' . $row->行程日期 . '</p>';
        $out = true;
    }
    if (!$out) {
        echo '<div class ="Err" style="color:red;">
        查不到資料！  請檢查輸入資料是否正確！</div>';
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }
}

function FindOrder($id, $name) {
    $db = DB();
    $sql = "SELECT A\n" .
            "	.會員編號,\n" .
            "	A.\"會員帳號\",\n" .
            "	A.\"行程編號\",\n" .
            "	a1.\"行程名稱\",\n" .
            "	a1.\"行程日期\",\n" .
            "FROM\n" .
            "	\"會員資料\" A,\n" .
            "	\"行程資料\" a1 \n" .
            "WHERE\n" .
            "	A.\"行程編號\" = '" . $id . "' \n" .
            "	AND A.\"會員編號\" = a1.\"會員編號\" \n" .
            "ORDER BY\n" .
            "	a1.\"會員編號\";";
    $result = $db->query($sql);
    $out = false;
    
    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
//PDO::FETCH_OBJ 指定取出資料的型態
//        echo '<tr>';
//        echo '<td>' . $row->顧客編號 . "</td><td>" . $row->顧客名稱 . "</td>";
//        echo '</tr>';
        $schedule = $row->房型編號;
        echo '
        <hr/>
        <p>	編號：' . $row->會員編號. '</p>
        <p>     帳號：' . $row->會員帳號 . '</p>
        <p>     行程編號：' . $row->行程編號 . '</p>
        <p>     行程名稱：' . $row->行程名稱 . '</p>
        <P>     行程日期:' . $row->行程日期 . '</p>';
        $out = true;
    }
    if (!$out) {
        echo '<div class ="Err" style="color:red;">
        查不到資料！  請檢查輸入資料是否正確！</div>';
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }
    $db = NULL;
}

function FindUser ($acc , $password){
    $db = DB();
    $sql = "SELECT * FROM \"Manager\" WHERE \"account\"='".$acc."' and \"password\"='".$password."'";
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if($row>1){
        $_SESSION["acc"] = $acc;
        $_SESSION["password"] = $password;
        
        
        header('Location: ../maneger/userIndex.php');
    }else{
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }

}


	function logInSure(){
    if($_SESSION["account"] == ""){
        // echo '<script>  swal({
        //     text: "未登入或登入逾時！  兩秒後跳轉至登入畫面!",
        //     icon: "error",
        //     button: false,
        //     timer: 2000,
        // }); </script>';
        
        header('Location: ../maneger.php');
        $_SESSION["unLog"] = true;
        // echo '<meta http-equiv="refresh" content="2;url=../maneger.php" />';
    }



}
