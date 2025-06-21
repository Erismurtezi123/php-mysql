<?php
session_start();
include_once('config.php');

$user_id = $_SESSION['id'];
$movie_id = $_SESSION['movie_id'];

$nr_tickets = $_POST['nr_tickets'];
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO bookings(users_id, movie_id, nr_tickets, date, time,) VALUES (:users_id, :movie_id, :nr_tickets, :date, :time)";

$insertBooking = $conn->prepare($sql);

$insertBooki->bindParam(':users_id',  $users_id);
$insertBooki->bindParam(':movie_id',  $movie_id);
$insertBooki->bindParam(':nr_tickets',  $nr_tickets);
$insertBooki->bindParam(':date',  $date);
$insertBooki->bindParam(':time',  $time);

$insertBooking->execute();

header("Location: home.php")
?>