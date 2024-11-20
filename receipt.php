<?php
include('database_connection.php'); // เชื่อมต่อกับฐานข้อมูล

// รับ job_id จาก URL
$job_id = $_GET['job_id'];

// ดึงข้อมูลจากตารางนี้ตาม job_id
$query = "SELECT * FROM your_table_name WHERE job_id = '$job_id'";
$result = mysqli_query($conn, $query);
$job = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จการซ่อม</title>
    <link rel="stylesheet" href="styles.css"> <!-- ลิงก์ไปยังไฟล์ CSS สำหรับจัดรูปแบบ -->
</head>
<body>
    <h2>ใบเสร็จการซ่อม</h2>
    <p>เลขที่งานซ่อม: <?php echo $job['job_id']; ?></p>
    <p>ชื่อผู้แจ้งซ่อม: <?php echo $job['name']; ?></p>
    <p>อุปกรณ์ที่ซ่อม: <?php echo $job['inventory_id']; ?></p>
    <p>รายละเอียดงาน: <?php echo $job['job_description']; ?></p>
    <p>วันที่รับซ่อม: <?php echo $job['create_date']; ?></p>
    <p>วันที่นัดหมาย: <?php echo $job['appointment_date']; ?></p>
    <p>ค่าบริการ: <?php echo number_format($job['appraiser'], 2); ?> บาท</p>

    <!-- ปุ่มสำหรับพิมพ์ใบเสร็จ -->
    <button onclick="window.print()">พิมพ์ใบเสร็จ</button>
</body>
</html>
