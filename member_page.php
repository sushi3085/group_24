<?php
// check if user is logged in, else redirect to login page
// if ( !isset($_SESSION['user_id']) ) {
//     header("Location: login.php");
//     exit();
// }

include "db_conn.php";
// read user information from database
// $user_id = $_SESSION['user_id'];
$result = sqlQry("SELECT * FROM `member` WHERE `mId` = 'A00001'");
while($row = mysqli_fetch_assoc($result)){
    $userName = $row['name'];
    $userEmail = $row['e-mail'];
    // $userBirthday = $row['birthday'];
    $userBirthday = "1999-12-12";
}
?>

<?php
include "header.php";
include "color_ramp.php";
?>
<head>
    <link rel="stylesheet" href="css/member.css">
</head>

<body>
    <form method="POST" action="member_page.php">
        <div class="col-lg-8 col-md-10 col-sm-12 center roundBorder padding">
            <!-- make a member information block -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/user/user-thumb.jpg" class="img-fluid roundBorder">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2>會員資料</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>姓名</label><br>
                            <input type="text" value="<?php echo $userName?>" size="5">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>電子郵件</label><br>
                            <input type="text" value="<?php echo $userEmail?>" size="30">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>生日</label><br>
                            <input type="date" value="<?php echo $userBirthday?>">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <!-- Button -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="submit" class="btn btn-success btn-block" value="修改資料">
                </div>
                <p></p>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="reset" class="btn btn-danger btn-block" value="取消修改">
                </div>
            </div>
        </div>
    </form>
</body>


<?php
include "footer.php";
?>