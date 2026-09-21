<?php

define('MAIN_INCLUDED', 1);

$_arguments = $_POST;
if (empty($_arguments) && !empty($_GET)) {
    $_arguments = $_GET;
}

$routeMap = array(
    'add_classroom' => 'model/add_classroom.php',
    'add_grade' => 'model/add_grade.php',
    'add_subject' => 'model/add_subject.php',
    'add_teacher' => 'model/add_teacher.php',
    'update_teacher' => 'model/update_teacher.php',
    'add_subject_routing' => 'model/add_subject_routing.php',
    'add_timetable' => 'model/add_timetable.php',
    'update_timetable' => 'model/update_timetable.php',
    'add_student' => 'model/add_student.php',
    'update_student' => 'model/update_student.php',
    'add_student_payment' => 'model/add_student_payment.php',
    'add_exam' => 'model/add_exam.php',
    'add_emarks_range_grade' => 'model/add_emarks_range_grade.php',
    'add_exam_timetable' => 'model/add_exam_timetable.php',
    'update_exam_timetable' => 'model/update_exam_timetable.php',
    'add_student_exam_mark' => 'model/add_student_exam_mark.php',
    'add_student_exam_mark1' => 'model/add_student_exam_mark1.php',
    'update_student_exam_mark' => 'model/update_student_exam_mark.php',
    'update_student_exam_mark2' => 'model/update_student_exam_mark2.php',
    'add_teacher_salary' => 'model/add_teacher_salary.php',
    'add_attendance' => 'model/add_attendance.php',
    'user_login' => 'model/user_login.php',
    'add_petty_cash' => 'model/add_petty_cash.php',
    'add_events' => 'model/add_events.php',
    'update_events' => 'model/update_events.php',
    'update_admin_profile' => 'model/update_admin_profile.php',
    'update_teacher_profile' => 'model/update_teacher_profile.php',
    'update_student_profile' => 'model/update_student_profile.php',
    'update_parents_profile' => 'model/update_parents_profile.php',
    'add_group_message' => 'model/add_group_message.php',
);

$doAction = isset($_arguments['do']) ? trim((string) $_arguments['do']) : '';

if ($doAction === '' || !isset($routeMap[$doAction])) {
    header('Location: view/login.php');
    exit;
}

$page = $routeMap[$doAction];
$target = __DIR__ . DIRECTORY_SEPARATOR . $page;

if (!is_file($target)) {
    header('Location: view/login.php');
    exit;
}

require $target;


