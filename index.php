<?php

//Required files
require_once 'vendor/autoload.php';
require_once 'model/db-functions.php';

//Start session AFTER autoload
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

<<<<<<< HEAD
//Debugging
=======
////Debugging
//require_once '/home/yvainilo/public_html/debug.php';
>>>>>>> 554ad7279314909919b59ba7c8aa6ea795bc98fa

//Connect to the database
$dbh = connect();

//Define a default route
<<<<<<< HEAD
$f3->route('GET|POST /', function($f3) {
=======
$f3->route('GET /', function ($f3) {
>>>>>>> 554ad7279314909919b59ba7c8aa6ea795bc98fa

    $students = getStudents();
    $f3->set('students', $students);

    //load a template
    $template = new Template();
    echo $template->render('views/all-students.html');
});

//Define a route to view a student summary
<<<<<<< HEAD
$f3->route('GET|POST /summary', function() {
=======
$f3->route('GET /summary/@sid',
>>>>>>> 554ad7279314909919b59ba7c8aa6ea795bc98fa

    function ($f3, $params) {

        $sid = $params['sid'];

        //load a template
        $template = new Template();
        echo $template->render('views/view-student.html');
    });

//Define a route to add a student
$f3->route('GET|POST /add', function ($f3) {

    //print_r($_POST);
    /*
     * Array (  [sid] => 5678
     *          [last] => Shin
     *          [first] => Jen
     *          [birthdate] => 2000-08-08
     *          [gpa] => 4.0
     *          [advisor] => 1
     *          [submit] => Submit )
     */

    if (isset($_POST['submit'])) {

        //Get the form data
        $sid = $_POST['sid'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $birthdate = $_POST['birthdate'];
        $gpa = $_POST['gpa'];
        $advisor = $_POST['advisor'];

        //Validate the data

        //Add the student
        $success = addStudent($sid, $last, $first, $birthdate,
            $gpa, $advisor);
        if ($success) {
            $student = new Student($sid, $last, $first, $birthdate,
                $gpa, $advisor);
            $_SESSION['student'] = $student;

            $f3->reroute('/summary');
        }
    }

    //load a template
    $template = new Template();
    echo $template->render('views/add-student.html');
});

$f3->route('GET|POST /roster', function() {

    //load a template
    $template = new Template();
    echo $template->render('views/roster.html');
});

//Run fat free
$f3->run();
