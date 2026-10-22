<?php
$name = "Hung Anh";
$score = "7.5";
if ($score >= 8) {
    echo "Xếp loại: Giỏi <br>";
}
if ($score >= 6.5  && $score < 8) {
    echo "Xếp loại: Khá <br>";
}
if ($score >= 5 && $score < 6.5) {
    echo "Xếp loại: Trung bình <br>";
}
if ($score < 5) {
    echo "Xếp loại: Yếu <br>";
}
if ($score < 0 || $score > 10) {
    echo "Điểm không hợp lệ <br>";
}

?>