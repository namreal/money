<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Thay đổi thông tin các khoản chi</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <style>
    body {
        background-image: url('https://marsurl.com/images/2021/05/21/image1f2d419c58f87e19.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .bg-img {
        background-color: gray;
        position: fixed;
        z-index: 2;
        opacity: 0.5;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .div {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 70%;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    }

    #padding {
        padding-bottom: 25px;
    }

    .close {
        color: #aaaaaa;
        float: left;
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

    .div1 {
        margin-left: 85px;
        margin-top: 25px;
    }

    span {
        font-family: 'Roboto';
        font-size: 15px;
    }

    label {
        font-family: 'Roboto';
        font-size: 20px;
    }
    </style>


</head>

<body>
    <div class="bg-img"></div>
    <form method="POST">
        <?php
            require_once('./_private/bundle.php');
            $id=$_GET['id'];
            $query=$DB->query("select * from chi where id='$id'");
            $row=mysqli_fetch_assoc($query);
        ?>
        <div class="div">
            <div id="padding"><a href="index1.php"><span class="close">&times;</span></a></div>
            <div>
                <div class="flexbox">
                    <div display="flex">
                        <div style="flex: 1;">
                            <label>Ngày tháng: </label>
                            <input class="input" type="date" value="<?php echo $row['date']; ?>" name="date" />
                        </div>
                    </div>
                    <div display="flex">
                        <label>Số tiền: </label>
                        <input class="input" type="number" value="<?php echo $row['money']; ?>" name="money" />
                    </div>
                </div>
                <label class="div1">Ghi chú: </label>
                <center>
                    <textarea name="note" value="<?php echo $row['note']; ?>"></textarea>
                </center>
                <div class="flex">
                    <button class="btn" name="update_chi" type="submit"><i class="fa fa-plus"></i> Cập nhật</button>
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['update_chi'])){
                $id=$_GET['id'];
                $date =$_POST['date'];
                $money=$_POST['money'];
                $note=$_POST['note'];
                        
                $sql = "UPDATE chi SET `date`='$date', `money`='$money', `note`='$note' WHERE id='$id'";
        
                if ($DB->query($sql) === TRUE) {
                    echo "Sửa thành công!!!";
                    header('Location: index1.php');
                } else {
                    echo "Lỗi!!!";
                }
            }
        ?>
    </form>
</body>

</html>