<?php
session_start();
include "db_conn.php";
?>

<?php
// check if the user is commenting
if(isset($_POST['content'])){
    // if user not yet login, redirect to login page
    if(!isset($_SESSION['mId'])){
        echo "<script>alert('請先登入會員'); location.href = 'login.php';</script>";
        exit();
    }
    $mId = $_SESSION['mId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $isAnonymous = isset($_POST['isAnonymous'])? 1: 0;
    $content = $_POST['content'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO `comment` (`mId`, `content`, `title`, `category`, `anonymous`, `date`) VALUES
                                  ('$mId', '$content', '$title', '$category', '$isAnonymous', '$date')";
    sqlQry($sql);
}
?>

<?php
// get the userName for later use
if(isset($_SESSION['mId'])){
    $result = sqlQry("SELECT * FROM `member` WHERE `mId` = '$_SESSION[mId]'");
    $userName = mysqli_fetch_assoc($result)['name'];
}else{
    $userName = "您尚未登入";
    echo "<script>alert('偵測到您尚未登入，\\n若要評論，請先登入會員！\\n謝謝！');</script>";
}
?>

<?php
include "color_ramp.php";
include "header.php";
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/community.js"></script>
    <title>A牌社群</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center">歡迎來到<span style="color:var(---yellow)">A牌</span>社群</h1>
                <h3 class="text-center">請選擇您想要參與討論的商品類別</h3>
            </div>
        </div>
        <form method="GET">
            <div class="row mt-5 justify-content-between">
                <input type='submit' class='col-md-2 text-center btn btn-primary mr-1' value='貓貓相關' name='cate'>
                <input type='submit' class='col-md-2 text-center btn btn-primary mr-1' value='狗狗相關' name='cate'>
                <input type='submit' class='col-md-2 text-center btn btn-primary mr-1' value='戶外用品區' name='cate'>
                <input type='submit' class='col-md-2 text-center btn btn-primary mr-1' value='衛生用品' name='cate'>
                <input type='submit' class='col-md-2 text-center btn btn-primary mr-1' value='暫時想不到' name='cate'>
            </div>
        </form>
        <hr>
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <h3 class="text-center">發表評論吧</h3>
            </div>
        </div>
        <form action="community.php" method="POST" id="commentForm">
            <div class="row col-md-12 p-3 border border-success border-dashed">
                <div class="col-md-12">
                    <label id="title-error" class="error"></label><br>
                    標題：<input type="text" size=40 name="title" placeholder="請輸入標題(必填)">
                    選擇類別：
                    <select name="category">
                        <option value="暫時想不到">暫時想不到</option>
                        <option value="貓貓相關">貓貓相關</option>
                        <option value="狗狗相關">狗狗相關</option>
                        <option value="戶外用品區">戶外用品區</option>
                        <option value="衛生用品">衛生用品</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    您的名字：
                    <input type="text" size=10 value="<?php echo $userName;?>" id="name" disabled>
                    <input type="checkbox" name="isAnonymous" onclick="toggleNameDisplay();" id="anonymous"><label for="anonymous">我想匿名投稿</label>
                </div>
                <div class="col-md-12 mt-3">
                    <label id="content-error" class="error"></label>
                    <textarea class="w-100" name="content" placeholder="請輸入內容(必填)"></textarea>
                </div>
                <div class="col-md-12 text-center mt-3">
                    <input type="submit" class="btn btn-primary" value="送出">
                </div>
            </div>
        </form>
        <!-- make a card displaying comments -->
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <h3 class="text-center"><?php if(isset($_GET["cate"])) echo $_GET["cate"]."　";?>最新討論</h3>
            </div>
        </div>



        <!-- content body -->
        
        <?php
        if(isset($_GET['cate'])){// user is browsing comments
            $category = $_GET['cate'];
            $result = sqlQry("SELECT * FROM `comment` WHERE `category` = '$category' ORDER BY `date` DESC");
            while($row = mysqli_fetch_assoc($result)){
                $mId = $row['mId'];
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];
                $anonymous = $row['anonymous'];
                if($anonymous == 1) $name = "匿名";
                else $name = mysqli_fetch_assoc(sqlQry("SELECT * FROM `member` WHERE `mId` = '$mId'"))['name'];
                echo "
                <div class='row col-md-12 p-3 border border-success border-dashed mb-3'>
                    <div class='col-md-12 mt-3'>
                        <b>標題：</b><span>$title</span>
                    </div>
                    <div class='col-md-12 mt-3'>
                        <b>發布者：</b><span>$name</span>
                        <b>發布時間：</b><span>$date</span>
                    </div>
                    <div class='col-md-12 mt-3'>
                        <b>內容：</b><span>".nl2br($content)."</span>
                    </div>
                </div>
                ";
            }
        }else if(isset($_POST['content'])){// user has sent a comment
            echo "
            <script>alert('您的評論已送出');</script>
            <h1 class='text-center'>您的評論已送出</h1>
            ";
        }
        ?>
    </div>
</body>

<?php
include "footer.php";
?>