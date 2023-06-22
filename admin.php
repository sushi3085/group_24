<?php
session_start();
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1){
    header("Location: login.php");
    exit();
}
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
                    <div class="tab-pane fade show active" id="memberManageSection" role="tabpanel" aria-labelledby="memberSectionBtn">
                        <!-- 會員管理 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">會員管理</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-auto">
                                    <!-- make a form to hold informations for adding member -->
                                    <form id="memberAddForm">
                                        <table class="display text-center mb-3">
                                            <tr>
                                                <td>會員名稱</td>
                                                <td><input type="text" name="name" id="name"></td>
                                                <td>會員帳號</td>
                                                <td><input type="mail" name="e-mail" id="e-mail"></td>
                                                <td>會員密碼</td>
                                                <td><input type="text" name="password" id="password"></td>
                                                <td>會員生日</td>
                                                <td><input type="date" name="birth" id="birth"></td>
                                                <td colspan="2"><input class="btn btn-success" type="button" value="新增會員" onclick="addUser(this)"></td>
                                            <tr>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <table id="myTable" class="display text-center mb-3 mx-auto" border=1>
                                        <thead>
                                            <tr>
                                                <th>會員編號</th>
                                                <th>會員名稱</th>
                                                <th>會員帳號</th>
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
                                            <td>".$row['birth']."</td>
                                            <td><button type='button' class='btn btn-primary' onclick='showModal(this)'>編輯</button></td>
                                            <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick='deleteUser(this)'>刪除</button></td>
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
                    <div class="tab-pane fade" id="goodsManageSection" role="tabpanel" aria-labelledby="goodsSectionBtn">
                        <!-- 商品管理 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">商品管理</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="mx-auto">
                                    <!-- make a form to hold informations for adding member -->
                                    <form id="goodsAddForm">
                                        <table class="display text-center mb-3">
                                            <tr>
                                                <td>商品名稱</td>
                                                <td><input type="text" name="name" id="name"></td>
                                                <td>商品價格</td>
                                                <td><input type="text" name="price" id="price"></td>
                                                <td>商品類別</td>
                                                <td><input type="text" name="category" id="category"></td>
                                                <td>商品圖片</td>
                                                <td><input type="file" name="img" id="img"></td>
                                                <td>商品描述</td>
                                                <td><input type="text" name="description" id="description"></td>
                                                <td colspan="2"><input class="btn btn-success" type="button" value="新增商品" onclick="addGoods(this)"></td>
                                            <tr>
                                        </table>
                                    </form>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable2" class="display text-center mb-3 mx-auto" border=1>
                                        <thead>
                                            <tr>
                                                <th>商品編號</th>
                                                <th>商品名稱</th>
                                                <th>商品價格</th>
                                                <th>商品類別</th>
                                                <th>商品圖片</th>
                                                <th>商品描述</th>
                                                <th colspan="2">操作</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        // TODO: finish this
                                        $result = sqlQry("SELECT * FROM `product`");
                                        while($row = mysqli_fetch_assoc($result)){
                                            $imgPath = $row['imgPath'];
                                            echo "<tr>";
                                            echo "
                                            <td>".$row['pNo']."</td>
                                            <td>".$row['pName']."</td>
                                            <td>".$row['unitPrice']."</td>
                                            <td>".$row['category']."</td>
                                            <td><img src='$imgPath' style='width:100px;'></td>
                                            <td class='text-truncate' style='max-width:300px'>".$row["description"]."</td>
                                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal' onclick='showModal(this)'>編輯</button></td>
                                            <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick='deleteGoods'>刪除</button></td>
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
                                    <table id="myTable3" class="display text-center mb-3 mx-auto" border=1>
                                        <thead>
                                            <tr>
                                                <th>訂單編號</th>
                                                <th>下訂會員</th>
                                                <th>下訂日期</th>
                                                <th>收貨的人</th>
                                                <th>地址</th>
                                                <th colspan="2">訂單操作</th>
                                            </tr>
                                            <?php
                                            $result = sqlQry("SELECT * FROM `order`");
                                            while($row = mysqli_fetch_assoc($result)){
                                                $orderId = $row['orderId'];
                                                $mId = $row['mId'];
                                                echo $mId;
                                                $memberName = mysqli_fetch_assoc(sqlQry("SELECT * FROM `member` WHERE `mId` = '$mId'"))['name'];
                                                $orderTime = $row['orderTime'];
                                                $receiver = $row['receiver'];
                                                $address = $row['address'];
                                                echo "<tr>";
                                                echo "
                                                <td>$orderId</td>
                                                <td>$memberName</td>
                                                <td>$orderTime</td>
                                                <td>$receiver</td>
                                                <td>$address</td>
                                                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal' onclick='showModal(this)'>編輯</button></td>
                                                <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick='deleteOrder(this)'>刪除</button></td>
                                                ";
                                                echo "</tr>";
                                            }
                                            ?>
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

<dialog close class="text-center" style="height: 80%;">
    <!-- use Ajax to post edit information to "adminEditHandle.php" -->
    <form id="memberForm" class="modalForm">
        修改會員資料：<br>
        <input type="number" value="" hidden disabled>
        <label>會員名稱：</label><input type="text" value="" id="memberName"  name="name"><br>
        <label>會員帳號：</label><input type="mail" value="" id="memberEmail" name="email"><br>
        <label>會員生日：</label><input type="date" value="" id="memberBirthday" name="birthday"><br>
        <input type="button" class="btn btn-success" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出編輯">
    </form>

    <form id="goodsForm" class="modalForm">
        修改商品資料：<br>
        <input type="text" value="" hidden disabled>
        <label>商品名稱：</label><input type="text" value="" id="goodsName" name="name"><br>
        <label>商品價格：</label><input type="number" value="" id="goodsPrice" name="price"><br>
        <label>商品類別：</label><input type="text" value="" id="goodsCategory" name="category"><br>
        <label>商品圖片：</label><input type="file" value="" id="goodsImg" name="img"><br>
        <div class="mb-5" style="display:flex; align:center; justify-content: center">
            <label>商品描述：</label><textarea col="20" value="" id="goodsDescription" name="description"></textarea><br>
        </div>
        <input type="button" class="btn btn-success" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出編輯">
    </form>
    
    <form id="orderForm" class="modalForm">
        修改訂單資料：<br>
        <label>訂單編號：</label><input type="text" value="" id="orderId" disabled><br>
        <label>下訂會員：</label><input type="text" value="" id="orderMember" disabled><br>
        <!-- <label>產品名稱：</label><input type="text" value="" id="orderGood"><br> 這裡要改成下拉式選單 -->
        <label>下訂時間：</label><input type="text"><br>
        <label>收貨者：</label><input type="text"><br>
        <label>收貨地址：</label><input type="text"><br>
        <label>訂單中產品：</label><br>
        <!-- create a table displaying goods name, amount -->
        <table id="orderGoods" class="display text-center mb-3 mx-auto" border=1>
            <thead>
                <tr>
                    <th>產品名稱</th>
                    <th>產品數量</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <!-- tobe insert using js -->
            </tbody>
        </table>
        <!-- <label>訂單狀態：</label><input type="text" value="" id="orderState"><br> 這裡要改成下拉式選單 -->
        <label>訂單狀態：</label>
        <select id="orderState" class="mb-5">
            <option value="已出貨">已出貨</option>
            <option value="未出貨">未出貨</option>
        </select>
        <br>

        <input type="button" class="btn btn-success mt-10" onclick="submitEdit()" value="送出編輯">
        <input type="button" class="btn btn-danger mt-10" onclick="closeModal()" value="退出編輯">
    </form>
</dialog>
</body>

<?php
include "footer.php";
?>