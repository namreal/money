<?php
    require_once('./_private/bundle.php');

    if (isset($_POST['report'])) 
	{
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $note = isset($_POST['note']) ? $_POST['note'] : '';

        if($email == "" && $phone == "" && $note == ""){
			echo'<script language="javascript">alert("Nhập đầy đủ thông tin!!!");window.location="help.php";</script>';
		}

        $sql = "INSERT INTO `cmt` (`email`, `phone`, `note`)
        VALUES ('$email','$phone', '$note')";
        $exec=$DB->query($sql);
        if($exec){
            echo'<script language="javascript">alert("Gửi đi thành công!!!!");window.location="help.php";</script>';
        }
        if(!$exec){
            echo'<script language="javascript">alert("Gửi đi thất bại!!!!");window.location="help.php";</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Thông tin giao dịch</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- W3SCHOOL -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <style>
    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 2;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        margin-top: 50px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 70%;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .box {
        margin-top: 15px;
        padding-left: 25px;
        font-size: 20px;
    }

    .box1 {
        margin-top: 20px;
        font-size: 17.5px;
    }

    .p {
        font-size: 25px;
    }

    .span {
        color: #44d9e6;
    }

    .span1 {
        padding-left: 25px;
    }

    textarea {
        width: 85%;
        height: 50px;
        padding: 10px 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 15px;
        margin-top: 15px;
        font-size: 16px;
        resize: none;
    }

    .flex {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-end;
        align-items: stretch;
        align-content: stretch;
    }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/love-for-money (1).png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active">
                            <a href="index.php">
                                <i class="fas fa-table"></i>Khoản thu</a>
                        </li>
                        <li class="active">
                            <a href="index1.php">
                                <i class="fa fa-table"></i>Khoản chi</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Thống kê</a>
                        </li>
                        <li>
                            <a href="help.php">
                                <i class="glyphicon glyphicon-question-sign"></i>Giúp đỡ</a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="glyphicon glyphicon-log-out"></i>Đăng xuất</a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/love-for-money (1).png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="index.php">
                                <i class="fas fa-table"></i>Khoản thu</a>
                        </li>
                        <li class="active">
                            <a href="index1.php">
                                <i class="fas fa-table"></i>Khoản chi</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Thống kê</a>
                        </li>
                        <li>
                            <a href="help.php">
                                <i class="glyphicon glyphicon-question-sign"></i>Giúp đỡ</a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="glyphicon glyphicon-log-out"></i>Đăng xuất</a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- THE MODAL -->
        <form action="help.php" method="POST">
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="box">
                        <span class="span">Địa chỉ email: </span><br>
                        <textarea name="email">Email...</textarea><br>
                        <span class="span">Số điện thoại: </span><br>
                        <textarea name="phone">SĐT...</textarea><br>
                        <span class="span">Yêu cầu: </span><br>
                        <textarea name="note">Nội dung...</textarea><br>
                        <div class="flex">
                            <button class="button" name="report"><i class="fa fa-send-o"
                                    style="padding-right: 10px"></i> Gửi đi</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <!-- END THE MODAL -->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <span style="font-size: 50px; color: #575151">ĐỘI NGŨ HỖ TRỢ</span><br>
                                    <span style="font-size: 25px; color: #575151">Liên hệ chúng tôi nếu bạn không tìm
                                        thấy thông tin bạn cần!!!</span><br>
                                    <button class="button" id="myBtn"><i class="fa fa-send-o"
                                            style="padding-right: 10px"></i> Gửi đi</button>
                                </center>
                                <div class="box1">
                                    <p class="p">Tại sao phải quản lý chi tiêu???</p>
                                    <span class="span1">Việc quản lí tài chính cá nhân đóng vai trò quan trọng trong
                                        việc tạo ra cuộc sống thoải mái, an toàn và hạn chế những rủi ro không đáng có
                                        từ khía cạnh tiền bạc trong cuộc sống hằng ngày. Nếu bạn có thể kiểm soát tốt từ
                                        thu nhập đến chi tiêu và các nguồn kênh đầu tư, tiết kiệm… thì bạn có thể nhanh
                                        chóng đạt được mức tự do tài chính như mong muốn và có được cuộc sống thảnh
                                        thơi.</span><br>
                                    <p class="p">“Tận dụng” công nghệ để hỗ trợ quản lý chi tiêu!!!</p>
                                    <span class="span1">Hiện nay, trên thị trường có nhiều ứng dụng hỗ trợ bạn quản lý
                                        chi tiêu hiệu quả. Đây là những ứng dụng được các chuyên gia, tổ chức tài chính
                                        phát triển nhằm hỗ trợ khách hàng quản lý và giao dịch tài chính hiệu quả. Tuy
                                        nhiên, bạn sẽ phải trả một khoản phí ban đầu, hoặc hàng tháng để sử dụng các ứng
                                        dụng này.<br>Đơn giản hơn, bạn có thể sử dụng các kênh miễn phí được cung cấp
                                        bởi các ngân hàng. Hiện tại, OCB OMNI đang là kênh quản lý và giao dịch tài
                                        chính online được nhiều người tin dùng vì có nhiều tiện ích thông minh như: giỏ
                                        giao dịch – giúp thực hiện cùng lúc nhiều giao dịch chuyển tiền chỉ với 1 OTP,
                                        công cụ tính lãi suất, giao dịch định kỳ, giao dịch tương lai, mở sổ tiết kiệm
                                        online. Bên cạnh đó là loạt dịch vụ miễn phí: miễn phí mở tài khoản, miễn phí
                                        thường niên, miễn phí chuyển tiền nội bộ và chuyển tiền liên ngân hàng, miễn phí
                                        sms hay quản lý tài khoản…<br>Như vậy, khi sử dụng OCB OMNI bạn đã có thể tiết
                                        kiệm được một số tiền đáng kể với các giao dịch ngân hàng. Quan trọng nhất, dòng
                                        tiền của bạn sẽ được kiểm soát hiệu quả, tránh “thất thoát” hay không kiểm soát
                                        được tài chính của mình.</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Design and Development by <a href="https://vivoo.vn/">Vivoo Global</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->