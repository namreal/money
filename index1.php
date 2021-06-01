<?php
    require_once('./_private/bundle.php');

    if (isset($_POST['revenue'])) 
	{
		$date = isset($_POST['date']) ? $_POST['date'] : '';
		$money = isset($_POST['money']) ? $_POST['money'] : '';
		$note = isset($_POST['note']) ? $_POST['note'] : '';

		//Code xử lý, insert dữ liệu vào table
		
        $date2 = date("d-m-Y", strtotime($date));
        
		if($date == "" && $money == "" && $note == ""){
			echo'<script language="javascript">alert("Nhập đầy đủ thông tin");window.location="index1.php";</script>';
		}
		$sql = "INSERT INTO `chi` (`date`, `money`, `note`)
                VALUES ('$date','$money', '$note')";
	  	$exec=$DB->query($sql);
        if($exec){
            echo'<script language="javascript">alert("Thêm thành công!!!!");window.location="index1.php";</script>';
        }
        if(!$exec){
            echo'<script language="javascript">alert("Thêm thất bại !!!!");window.location="index1.php";</script>';
        }
  	}

    
    $sql_rec = 'SELECT count(id) as total FROM chi';
    $retval_rec = $DB->query($sql_rec);
    $row_rec = mysqli_fetch_array($retval_rec, MYSQLI_ASSOC);
    $total_rec = $row_rec['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_rec / $limit);
    if($current_page > $total_page){
        $current_page = $total_page;
    }
     else if($current_page < 0 ){
        $current_page = 1;
    }
    $start = ($current_page -1)*$limit;
    $sql_chi = "SELECT * FROM chi LIMIT $start, $limit";

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
    <title>Thông tin các khoản chi</title>

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- W3SCHOOL -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 3;
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

    .flexbox {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-around;
        align-items: stretch;
        align-content: stretch;
    }

    .input {
        border: 1px solid #dee1ec;
        padding: 10px;
        border-radius: 20px 10px;
    }

    textarea {
        width: 85%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 20px 10px;
        margin-top: 10px;
        font-size: 16px;
        resize: none;
    }

    .btn {
        background-color: green;
        font-size: 20px;
        padding: 15px 20px;
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        text-align: center;
        color: #e2f3f5;
    }

    .flex {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-end;
        align-items: stretch;
        align-content: stretch;
    }

    .div {
        margin-left: 85px;
        margin-top: 25px;
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
                            <img src="images/icon/love-for-money (1).png" alt="Money Lover" />
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
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/love-for-money (1).png" alt="Money Lover" />
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
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

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
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- THE MODAL -->
            <form action="index1.php" method="POST">
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="flexbox">
                            <div display="flex">
                                <div style="flex: 1;">
                                    <label>Ngày tháng: </label>
                                    <input class="input" type="date" name="date" />
                                </div>
                            </div>
                            <div display="flex">
                                <label>Số tiền: </label>
                                <input class="input" type="number" name="money" />
                            </div>
                        </div>
                        <label class="div">Ghi chú: </label>
                        <center>
                            <textarea name="note"></textarea>
                        </center>
                        <div class="flex">
                            <button class="btn" name="revenue" type="submit"><i class="fa fa-plus"></i> Thêm</button>
                        </div>
                    </div>

                </div>
            </form>

            <!-- END THE MODAL -->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">khoản chi</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="myBtn">
                                            <i class="zmdi zmdi-plus"></i>thêm khoản chi</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>ngày / tháng</th>
                                                <th>số tiền</th>
                                                <th>ghi chú</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $retval = $DB->query( $sql_chi );
                                                while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) : ?>
                                            <tr class="tr-shadow">
                                                <td><?php $date = new DateTime($row['date']);
                                                            echo $date->format('d-m-Y');?></td>
                                                <td><?php echo $row['money']; ?> VNĐ</td>
                                                <td><?php echo $row['note']; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="edit_chi.php?id=<?php echo $row['id']; ?>"><button
                                                                class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Edit" id="editBtn">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button></a>
                                                        <a href="dltchi.php?id=<?php echo $row['id']; ?>"><button
                                                                class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php endwhile; ?>
                                    </table>
                                    <div
                                        style="text-decoration: none; font-size: 20px; padding-top: 25px; text-align: center">
                                        <?php
                                            if($current_page > 1 && $total_page > 1){
                                                echo'<a href="index1.php?page='.($current_page-1).'"> << <a> | ';
                                            }
                                            for($i=1 ; $i<$total_page ; $i++){
                                                if($i==$current_page){
                                                    echo'<span>'.$i.'</span> |';
                                                }else{
                                                    echo'<a href="index1.php?page='.$i.'">'.$i.'</a> | ';
                                                }
                                            }
                                            if($current_page < $total_page && $total_page > 1){
                                                echo'<a href="index1.php?page='.($current_page+1).'"> >> </a> ';
                                            }
                                        ?>
                                        <div>
                                        </div>
                                        <!-- END DATA TABLE -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Design and Development by <a href="https://vivoo.vn/">Vivoo Global</a>.
                                            </p>
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
                modal.style.display = "none"
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