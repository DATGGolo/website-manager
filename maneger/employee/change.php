<!doctype html>
<?php
session_start();
include '../../php/FindOrder.php';
@logInSure();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>更新管理員</title>
        <!-- 連結思源中文及css -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link href="../../images/user.jpg" rel="icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!------------------------->
    </head>

    <body>
    	<?php
         if (isset($_POST["Reg"])) {
            $db = DB();
            $sql = "SELECT * FROM \"管理員\" where \"管理員編號\" ='" . $_POST["id"]."'";
            $result = $db->query($sql);
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                if (isset($row->管理員編號)) {
                    $_SESSION["empnum"] = $row->管理員編號;
                    $_SESSION["name"] = $row->管理員姓名;
                    $_SESSION["emp_acc"] = $row->帳號;
                    $_SESSION["emp_pas"] = $row->密碼;

                    header("Location:change2.php");
                }
            }
            echo '<script>  swal({
                title: "無此管理員！",
                text: "請檢查是否輸入錯誤資料！",
                icon: "error",
                button: false,
                timer: 2000,
                }); </script>';
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
                    <a href="#" style="color:#000; ">客戶</a>          
                    <ul style="z-index: 2; ">          
                        <li><a href="../customer/all.php">客戶總覽</a></li>
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
                <h2>更新管理員</h2>
                <hr/>

                <form method="post" action="">

                    <div class="6u 12u$(small)"> <p>管理員編號：</p>
                        <input type="text" name="id" id="big" value="" placeholder="Number" required>
                        <script>
                            var url = location.href;
                            //之後去分割字串把分割後的字串放進陣列中
                            var ary1 = url.split('?');
                            //此時ary1裡的內容為：
                            //ary1[0] = 'index.aspx'，ary2[1] = 'id=U001&name=GQSM'

                            //下一步把後方傳遞的每組資料各自分割
                            var ary2 = ary1[1].split('&');
                            //此時ary2裡的內容為：
                            //ary2[0] = 'id=U001'，ary2[1] = 'name=GQSM'

                            //最後如果我們要找id的資料就直接取ary[0]下手，name的話就是ary[1]
                            var ary3 = ary2[0].split('=');
                            //此時ary3裡的內容為：
                            //ary3[0] = 'id'，ary3[1] = 'U001'

                            //取得id值
                            var id = ary3[1];
                            var aee = 10;
                            document.getElementById("big").value = id;
                        </script>
                    </div>


                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="查詢"></li>

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
