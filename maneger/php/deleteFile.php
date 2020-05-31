<?php
    session_start();
    include '../../../php/DataBase.php';
    $db = DB();
    $sql ="DELETE \n".
    "FROM\n".
    "	\"管理員\"\n".
    "WHERE\n".
    "	管理員編號 =". $_SESSION["dele_id"];

    $db->query($sql);
    $_SESSION["dele_sure"] = true;
    header('Location: ../delete.php');