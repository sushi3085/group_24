<?php
session_start();
// check if user is logged in, else redirect to login page
// if ( !isset($_SESSION['user_id']) ) {
//     header("Location: login.php");
//     exit();
// }

include "db_conn.php";
// read user information from database
// $user_id = $_SESSION['user_id'];
$result = sqlQry("SELECT * FROM `member` WHERE `mId` = '$_SESSION[mId]'");
while($row = mysqli_fetch_assoc($result)){
    $userName = $row['name'];
    $userEmail = $row['e-mail'];
    $userBirthday = $row['birth'];
    $userPassword = $row['pswd'];
}
?>

<?php
// check if user is saving the change, if so, update database
// and update the user information in this page
if ( isset($_POST['userName']) ) {
    $originName = $_POST['originName'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['email'];
    $userBirthday = $_POST['birthday'];
    // TODO: implement password change
    $sql = "UPDATE `member` SET `name` = '$userName', `e-mail` = '$userEmail', `birth` = '$userBirthday' WHERE `name` = '$originName'";
    sqlQry($sql);
}
?>

<?php
include "header.php";
include "color_ramp.php";
?>
<head>
    <link rel="stylesheet" href="css/member.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/member_page.js"></script>
</head>

<body>
    <form method="POST" action="member_page.php">
        <div class="col-lg-8 col-md-10 col-sm-12 center roundBorder padding">
            <!-- make a member information block -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 vcenter hcenter">
                    <img src="images/user/user-thumb.jpg" class="img-fluid roundBorder">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 textCenter">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2>會員資料</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>姓名</label><label id="userName-error" class="error"></label><br>
                            <input type="text" value="<?php echo $userName?>" name="originName" hidden>
                            <input type="text" value="<?php echo $userName?>" size="5" name="userName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>電子郵件</label><label id="email-error" class="error"></label><br>
                            <input type="email" value="<?php echo $userEmail?>" size="30" name="email" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>生日</label><label id="birthday-error" class="error"></label><br>
                            <input type="date" value="<?php echo $userBirthday?>" name="birthday">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>密碼</label><label id="password-error" class="error"></label><br>
                            <input type="password" value="<?php echo $userPassword?>" name="password" minlength="8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>確認密碼</label><label id="passwordConf-error" class="error"></label><br>
                            <input type="password" value="<?php echo $userPassword?>" name="passwordConf" minlength="8">
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
                    <input type="reset" class="btn btn-danger btn-block" value="取消修改" onclick="cancelEdit()">
                </div>
            </div>
        </div>
    </form>
</body>


<?php
include "footer.php";
?>