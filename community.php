<?php
session_start();
include "header.php";
include "color_ramp.php";
?>



<body>
    <div class="container">
        給 LUN 的話(雖然SESSION目前也只用在登入)：目前SESSION有用到這些Key：<br>
        <ul>
            <li>$_SESSION['mId']</li>
        </ul>
        對！只有一個(笑死)。因為也只有用在登入。所以如果你有想到其他地方要用，自由添加然後在群組告知一下就好了，怕會衝突到 Key name。<br>
        <div class="row">
            <div class="col-md-12">
                <h1>Community</h1>
                <p>Here you can find all the information about the community.</p>
            </div>
        </div>
    </div>
</body>

<?php
include "footer.php";
?>