<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
include_once '../../php/DataBase.php';
@logInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>新增使用者</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!------------------------->
    </head>

    <body>
        <?php
        $accntErr = $nameErr = $storeErr = $languageErr = "";
        $member_account = $member_nickname = $member_store = $member_language = "";
        $sure = true;

        if (isset($_POST["Reg"])) {
            $member_account = $_POST["member_account"];
            $member_nickname = $_POST["member_nickname"];
            $member_store = $_POST["member_store"];
            $member_language = $_POST["member_laguage"];

            if (empty($_POST["member_account"])) {

                $accntErr = "帳號是必填的!";
                $sure = false;
            }

            if (empty($_POST["member_nickname"])) {

                $nameErr = "暱稱是必填的!";
                $sure = false;
            }

            if (empty($_POST["member_laguage"])) {
                $languageErr = "儲存語言是必填的!";
                $sure = false;
            }

            if ($sure) {

                $db = DB();
                $sql = "INSERT INTO \"會員資料\" ( \"匿稱\", \"帳號儲存方式\", \"儲存語言\")VALUES( '" . $_POST["member_account"] . "', '" . $_POST["member_nickname"] . "', '" . $_POST["member_store"] . "', "
                        . "'" . $_POST["member_laguage"] . "' );";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到會員總覽 或是 會員新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';

                    echo '        <script>
            swal({
                title: "新增成功！",
                text: "回到會員總覽 或是 會員新增?",
                icon: "success",
                buttons: {
                    1: {
                        text: "會員總覽",
                        value: "會員總覽",
                    },
                    2: {
                        text: "會員新增",
                        value: "會員新增",
                    },
                },

            }).then(function (value) {
                switch (value) {
                    case"會員總覽":
                        window.location.href = "all.php";
                        break;
                    case"會員新增":
                        window.location.href = "add.php";
                        break;
                        

                }
            })
        </script>  ';


//                header("Location:all.php");
            } else {
                $mes = $accntErr . $nameErr . $storeErr . $languageErr;
                echo '<script>  swal({
                text: "' . $mes . '",
                icon: "error",
                button: false,
                timer: 3000,
            }); </script>';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <!-- Header -->
        <header id="header" class="alt">
            <div class="logo"><a href="../../index/index.html">TaipeiMRT <span>RESORT</span></a></div>
            <a href="#menu">Menu</a>
        </header>

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="../../news/news.html">最新消息</a></li>
                <li><a href="../../room/room.php">行程服務</a></li>
                <li><a href="../../room/roomSpace.php">查詢行程</a></li>
                <li><a href="../../about/about.html">關於我們</a></li>
                <li><a href="../../information/information.php">聯絡資訊</a></li>

                <li style="margin-top: 200%"><a href="../maneger/maneger.php">管理者介面</a></li>
                <li style="margin-top: 0%"><a href="../php/logOut.php">登出</a></li>    
            </ul>
        </nav>

        <section id="One" class="wrapper style3">
            <div class="inner" style="z-index: 1">
                <header class="align-center">
                    <h2>Maneger Page</h2>
                </header>
            </div>
        </section>

        <!--**************************-->
        <div class ="nav">
            <ul id="navigation" style="z-index: 2; background:#F1EEC2;">        
                <li><a href="../userIndex.php" style="color:#000; ">主頁</a></li>            

                <li class="sub">         
                    <a href="#" style="color:#000; ">會員</a>          
                    <ul style="z-index: 2; ">          
                        <li><a href="../customer/all.php">會員總覽</a></li>
                        <li><a href="../customer/add.php">新增</a></li>                 
                        <li><a href="../customer/delete.php">刪除</a></li>
                        <li><a href="../customer/change.php">更新</a></li>                       
                    </ul>
                </li>              

                <li class="sub">         
                    <a href="#" style="color:#000; ">管理員</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../employee/all.php">管理員總覽</a></li>
                        <li><a href="../employee/add.php">新增</a></li>
                        <li><a href="../employee/delete.php">刪除</a></li>
                        <li><a href="../employee/change.php">更新</a></li>                   
                    </ul>
                </li>     

                <li class="sub">         
                    <a href="#" style="color:#000; ">行程</a>          
                    <ul style="z-index: 2">          
                        <li><a href="../order/all.php">行程總覽</a></li>
                        <li><a href="../order/delete.php">刪除</a></li>
                        <li><a href="../order/change.php">更新</a></li>                   
                    </ul>
                </li>   

                          

            </ul>
        </div>




        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
                <h2>新增會員</h2>
                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>會員帳號：</p>
                        <input type="text" name="member_account" id="member_account" value="<?php echo $member_account; ?>" placeholder="member_account" required>
                    </div>

                    <br/>
                    <div class="6u 12u$(small)"> <p>暱稱</p>
                        <input type="text" name="member_nickname"" id="member_nickname" value="<?php echo $member_nickname; ?>" placeholder="member_nickname" required>
                    </div>

                    <br/>
                    <div class="6u 12u$(small)"> <p>帳號儲存方式</p>
                        <input type="text" name="member_store"" id="member_store" value="<?php echo $member_store; ?>" placeholder="member_store" required>
                    </div>
                    <br/>

                    <br/>
                    <div class="6u 12u$(small)"> <p>儲存語言</p>
                        <input type="text" name="member_language"" id="member_language" value="<?php echo $member_language; ?>" placeholder="member_language" required>
                    </div>
                    <br/>

                    <div class="4u$ 12u$(small)">
                        <input type="radio" id="priority-normal" name="gender" value="女" >
                        <label for="priority-normal">女</label>
                    </div>



                    <div class ="Err" style="color:red;">
                        <?php
                        echo "<p>" . $accntErr . "</p>";
                        echo "<p>" . $nameErr . "</p>";
                        echo "<p>" . $storeErr . "</p>";
                        echo "<p>" . $languageErr . "</p>";
                        ?>
                    </div>

                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="ADD"></li>

                            </div>
                        </ul>
                    </div>

                </form>


            </div>       

            <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP     
        </div>  
        <!--**************************-->    
    </body>

</html>
