<?php

class Student
{
    // Thuộc tính
    private string $name;
    private int $age;
    private float $score;

    // Constructor
    public function __construct(string $name, int $age, float $score)
    {
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    }

    // Getter để truy cập thuộc tính private từ bên ngoài
    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    // Trả về xếp loại
    public function getRank(): string
    {
        if ($this->score >= 8.0) {
            return "Giỏi";
        } elseif ($this->score >= 6.5) {
            return "Khá";
        } elseif ($this->score >= 5.0) {
            return "Trung bình";
        }
        return "Yếu";
    }

    // Kiểm tra đạt (điểm >= 5.0)
    public function isPassed(): bool
    {
        return $this->score >= 5.0;
    }

    // Hiển thị thông tin
    public function display(): void
    {
        echo "  - Họ tên: " . $this->name . "<br>";
        echo "  - Tuổi: " . $this->age . "<br>";
        echo "  - Điểm: " . $this->score . "<br>";
        echo "  - Xếp loại: " . $this->getRank() . "<br>";
        echo "  - Kết quả: " . ($this->isPassed() ? "Đạt" : "Không đạt") . "<br>";
        echo "--------------------------------<br>";
    }
}

// ===== Các hàm xử lý danh sách =====

function displayAll(array $students): void
{
    foreach ($students as $i => $student) {
        echo "Sinh viên thứ " . ($i + 1) . ":<br>";
        $student->display();
    }
}

function findTopStudent(array $students): ?Student
{
    if (count($students) === 0) {
        return null;
    }

    $top = $students[0];
    foreach ($students as $student) {
        if ($student->getScore() > $top->getScore()) {
            $top = $student;
        }
    }
    return $top;
}

function countPassed(array $students): int
{
    $count = 0;
    foreach ($students as $student) {
        if ($student->isPassed()) {
            $count++;
        }
    }
    return $count;
}

function calculateAverageScore(array $students): float
{
    if (count($students) === 0) {
        return 0;
    }

    $total = 0;
    foreach ($students as $student) {
        $total += $student->getScore();
    }
    return $total / count($students);
}

// ===== Chương trình chính =====

$student1 = new Student("Nguyen Van An", 20, 8.5);
$student2 = new Student("Tran Thi Binh", 21, 6.5);
$student3 = new Student("Le Van Cuong", 19, 4.5);
$student4 = new Student("Pham Thi Dung", 20, 7.5);

$students = [$student1, $student2, $student3, $student4];

echo "===== DANH SÁCH SINH VIÊN =====<br>";
displayAll($students);

$top = findTopStudent($students);
echo "Sinh viên điểm cao nhất: " . $top->getName() . " (" . $top->getScore() . ")<br>";

echo "Số sinh viên đạt: " . countPassed($students) . "<br>";

echo "Điểm trung bình lớp: " . calculateAverageScore($students) . "<br>";