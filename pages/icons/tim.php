<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_POST['s_mb'])) {
    $query = "SELECT * FROM class WHERE class_name LIKE '%{$_POST['s_mb']}%';";
    $query =  mysqli_query($conn, $query);
    $member = [];
    while ($row  = mysqli_fetch_assoc($query)) {
        $member[] = $row;
    }
    echo json_encode($member);
}

if (isset($_POST['addTime'])) {
    echo  date('h:i:s', strtotime("+60 minutes", strtotime($_POST['tg_bd']))); //cong them 60p vao gio bat dau dinh dang theo gio phut giay
}
if (isset($_POST['addDate'])) {
    echo date('Y-m-d', strtotime($_POST['ngay_bd'] . ' + 30 days')); //cong them 30 ngay vao gio bat dau dinh dang theo nam thang ngay
}

if (isset($_POST['checkDay'])) {
    $query = "SELECT * FROM class WHERE  trainer_id  = '{$_POST['trainer_id']}' AND start_time = '{$_POST['tg_bd']}' AND date_of_week LIKE '%{$_POST['ngay']}%';";
    $query =  mysqli_query($conn, $query);
    if ($query->num_rows > 0) {
        echo 'trùng thời gian dạy';
    }
}