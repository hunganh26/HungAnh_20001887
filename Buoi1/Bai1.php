<?php
$students = [
    [
        "name" => "Nguyen Van An",
        "age" => 20,
        "score" => 8.5
    ],
    [
        "name" => "Tran Thi Binh",
        "age" => 21,
        "score" => 6.5
    ],
    [
        "name" => "Le Van Cuong",
        "age" => 19,
        "score" => 4.5
    ],
    [
        "name" => "Pham Thi Dung",
        "age" => 20,
        "score" => 7.5
    ]
];

// Biến lưu tổng điểm
$totalScore = 0;
$count = 0;

echo "===== DANH SÁCH SINH VIÊN =====<br>";

// Duyệt danh sách bằng foreach
foreach ($students as $i => $student) {
    echo "Sinh viên thứ " . ($i + 1) . ":<br>";
    echo "  - Họ tên: " . $student["name"] . "<br>";
    echo "  - Tuổi: " . $student["age"] . "<br>";
    echo "  - Điểm: " . $student["score"] . "<br>";
    echo "--------------------------------<br>";

    // Cộng dồn điểm
    $totalScore += $student["score"];
    $count++;
}

// Tính điểm trung bình
$averageScore = $totalScore / $count;

echo "<br>===== KẾT QUẢ =====<br>";
echo "Tổng điểm: " . $totalScore . "<br>";
echo "Số lượng sinh viên: " . $count . "<br>";
echo "Điểm trung bình: " . round($averageScore, 2) . "<br>";
?>