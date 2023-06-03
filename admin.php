<?php
include "db_conn.php";
include "color_ramp.php";
include "header.php";
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/admin.js"></script>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- A division with three navigation area, named '會員管理','商品管理','訂單管理' -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- 會員管理 -->
                    <a class="nav-link active" id="memberSectionBtn" data-toggle="pill" href="#v-pills-home"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">會員管理</a>
                    <!-- 商品管理 -->
                    <a class="nav-link" id="goodsSectionBtn" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="false">商品管理</a>
                    <!-- 訂單管理 -->
                    <a class="nav-link" id="orderSectionBtn" data-toggle="pill" href="#v-pills-messages"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">訂單管理</a>
                </div>
            </div>
            <div class="col-md-10 mt-3">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- 會員管理 -->
                    <div class="tab-pane fade show active" id="memberManageSection" role="tabpanel"
                        aria-labelledby="memberSectionBtn">
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
                                    <table id="myTable" class="display text-center mb-3" border=1>
                                        <thead>
                                            <tr>
                                                <th>會員編號</th>
                                                <th>會員名稱</th>
                                                <th>會員帳號</th>
                                                <th>會員密碼</th>
                                                <th>會員電話</th>
                                                <th>會員地址</th>
                                                <th>會員生日</th>
                                                <th colspan="2">操作</th>
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
                                            <td class='text-truncate'></td>
                                            <td>".$row['birth']."</td>
                                            <td><button type='button' class='btn btn-primary' onclick='showModal(this)'>編輯</button></td>
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
                    <div class="tab-pane fade" id="goodsManageSection" role="tabpanel"
                        aria-labelledby="goodsSectionBtn">
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
                                    <table id="myTable2" class="display text-center mb-3" border=1>
                                        <thead>
                                            <tr>
                                                <th>商品編號</th>
                                                <th>商品名稱</th>
                                                <th>商品價格</th>
                                                <th>商品類別</th>
                                                <th>商品圖片</th>
                                                <th>商品狀態</th>
                                                <th colspan="2">操作</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        // TODO: finish this
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
                                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal' onclick='showModal(this)'>編輯</button></td>
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
                    <div class="tab-pane fade" id="orderManageSection" role="tabpanel"
                        aria-labelledby="orderSectionBtn">
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
                                    <table id="myTable3" class="display text-center mb-3" border=1>
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

<dialog close class="text-center">
    <!-- use Ajax to post edit information to "adminEditHandle.php" -->
    <form id="memberForm">
        修改會員資料：<br>
        <input type="number" value="" hidden disabled>
        <label>會員名稱：</label><input type="text" value="" id="memberName"  name="name"><br>
        <label>會員帳號：</label><input type="mail" value="" id="memberEmail" name="email"><br>
        <label>會員電話：</label><input type="text" value="" id="memberPhone" name="phone"><br>
        <label>會員地址：</label><input type="text" value="" id="memberAddress" name="address"><br>
        <label>會員生日：</label><input type="date" value="" id="memberBirthday" name="birthday"><br>
        <input type="button" class="btn btn-success" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出編輯">
    </form>

    <form id="goodsForm">
        修改產品資料：<br>
        <label>會員ID</label>
        <input type="button" class="btn btn-success" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出編輯">
    </form>
    
    <form id="orderForm">
        <label>會員ID</label>
        <input type="button" class="btn btn-success" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出編輯">
    </form>
</dialog>
</body>

<?php
include "footer.php";
?>