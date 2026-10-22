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

    function findBestStudent($students) {
        $bestStudent = $students[0];
        foreach ($students as $student) {
            if ($student["score"] > $bestStudent["score"]) {
                $bestStudent = $student;
            }
        }
        return $bestStudent;
    }
    $bestStudent = findBestStudent($students); 
    echo $bestStudent["name"] . " - " . $bestStudent["score"];

    function findWorstStudent($students) {
        $worstStudent = $students[0];
        foreach ($students as $student) {
            if ($student["score"] < $worstStudent["score"]) {
                $worstStudent = $student;
            }
        }
        return $worstStudent;
    }

    $worstStudent = findWorstStudent($students);
    echo "<br>" . $worstStudent["name"] . " - " . $worstStudent["score"];

    function countPassedStudents($students) {
        $count = 0;
        foreach ($students as $student) {
            if ($student["score"] >= 5) {
                $count++;
            }
        }
        return $count;
    }
    $passedCount = countPassedStudents($students);
    echo "<br>Số lượng sinh viên đạt: " . $passedCount;

    function findStudentByName($students, $name) {
        foreach ($students as $student) {
            if ($student["name"] === $name) {
                return $student;
            }
        }
    }
    $studentX = findStudentByName($students, "Tran Thi Binh");
    echo "<br>". $studentX["name"];
?>