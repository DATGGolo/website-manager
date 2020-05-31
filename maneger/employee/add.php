<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
include_once '../../php/DataBase.php';
LogInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>新增管理員</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!------------------------->
    </head>

    <body>
    	<?php
        $nameErr = $idErr = $accErr = $passwordErr = "";
        $name = $empid = $acc = $password = "";
        $sure = true;

        if (isset($_POST["Reg"])) {
            
            $empid = $_POST["empid"];
			$name = $_POST["name"];
            $acc = $_POST["acc"];
            $password = $_POST["password"];

            if (empty($_POST["name"])) {

                $nameErr = "姓名是必填的!";
                $sure = false;
            }

            if (empty($_POST["account"])) {

                $accErr = "帳號是必填的!";
                $sure = false;
            }

            if (empty($_POST["password"])) {

                $passwordErr = "密碼是必填的!";
                $sure = false;
            }
            if ($sure) {

                $db = DB();
                $sql = "INSERT INTO \"管理員\" ( \"管理員編號\", \"管理員姓名\",\"帳號\","
                        . " \"密碼\" )VALUES( '" . $_POST["empid"] . "', '" . $_POST["name"] . "',"
                        . "'" . $_POST["acc"] . "', '" . $_POST["password"] . "' );";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到管理員總覽 或是 管理員新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';

                    echo '        <script>
            swal({
                title: "新增成功！",
                text: "回到管理員總覽 或是 管理員新增?",
                icon: "success",
                buttons: {
                    1: {
                        text: "管理員總覽",
                        value: "管理員總覽",
                    },
                    2: {
                        text: "管理員新增",
                        value: "管理員新增",
                    },
                },

            }).then(function (value) {
                switch (value) {
                    case"管理員總覽":
                        window.location.href = "all.php";
                        break;
                    case"管理員新增":
                        window.location.href = "add.php";
                        break;
                        

                }
            })
        </script>  ';


//                header("Location:all.php");
            } else {
                $mes = $empidErr . $nameErr . $accErr . $passwordErr;
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
            <div class="logo"><a href="../../index/index.html">TaipeiMRT<span>RESORT</span></a></div>
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
                <h2>新增管理員</h2>
                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>管理員編號：</p>
                        <input type="text" name="empid" id="empid" value="<?php echo $empid; ?>" placeholder="Ex:E123" required>
                    </div>

                    <br/>
                    <div class="6u 12u$(small)"> <p>姓名：</p>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name" required>
                    </div>

                    <br/>
            
                    <div class="6u 12u$(small)"> <p>帳號：</p>
                        <input type="text" name="acc" id="acc" value="<?php echo $acc; ?>" placeholder="Name" required>
                    </div>

                    <br/>
                    <div class="6u 12u$(small)"> <p>密碼：</p>
                        <input type="text" name="password" id="password" value="<?php echo $password; ?>" placeholder="Name" required>
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
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 
        </div>  
        <!--**************************-->    
    </body>

</html>
