<?php
include "db_conn.php";
include "color_ramp.php";
include "header.php";
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/admin.js"></script>
</head>

<body>
    <!-- A division with three navigation area, named '會員管理','商品管理','訂單管理' -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- 會員管理 -->
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">會員管理</a>
                    <!-- 商品管理 -->
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="false">商品管理</a>
                    <!-- 訂單管理 -->
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">訂單管理</a>
                </div>
            </div>
            <div class="col-md-10 mt-3">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- 會員管理 -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <!-- 會員管理 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">會員管理</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable" class="display text-center">
                                        <thead>
                                            <tr>
                                                <th>會員編號</th>
                                                <th>會員名稱</th>
                                                <th>會員帳號</th>
                                                <th>會員密碼</th>
                                                <th>會員電話</th>
                                                <th>會員地址</th>
                                                <th>會員生日</th>
                                                <th>會員狀態</th>
                                                <th>會員編輯</th>
                                                <th>會員刪除</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $result = sqlQry("SELECT * FROM `member`");
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "
                                            <td>".$row['mId']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['e-mail']."</td>
                                            <td></td>
                                            <td>".$row['phone']."</td>
                                            <td></td>
                                            <td>".$row['birth']."</td>
                                            <td></td>
                                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal'>編輯</button></td>
                                            <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal'>刪除</button></td>
                                            ";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- 會員管理 -->
                    </div>
                    <!-- 商品管理 -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <!-- 商品管理 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">商品管理</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable2" class="display text-center">
                                        <thead>
                                            <tr>
                                                <th>商品編號</th>
                                                <th>商品名稱</th>
                                                <th>商品價格</th>
                                                <th>商品類別</th>
                                                <th>商品圖片</th>
                                                <th>商品狀態</th>
                                                <th>商品編輯</th>
                                                <th>商品刪除</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $result = sqlQry("SELECT * FROM `member`");
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "
                                            <td>".$row['mId']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['e-mail']."</td>
                                            <td></td>
                                            <td>".$row['phone']."</td>
                                            <td></td>
                                            <td>".$row['birth']."</td>
                                            <td></td>
                                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal'>編輯</button></td>
                                            <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal'>刪除</button></td>
                                            ";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- 商品管理 -->
                    </div>
                    <!-- 訂單管理 -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <!-- 訂單管理 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">訂單管理</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable3" class="display text-center">
                                        <thead>
                                            <tr>
                                                <th>訂單編號</th>
                                                <th>會員編號</th>
                                                <th>訂單日期</th>
                                                <th>訂單狀態</th>
                                                <th>訂單編輯</th>
                                                <th>訂單刪除</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- 訂單管理 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include "footer.php";
?>