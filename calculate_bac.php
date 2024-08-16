<?php

//fetching data from form
$drinks = $_POST['drinks'];
$weight = $_POST['weight'];
$time_elapsed = $_POST['time_elapsed'];

//calculating total alcohol consumption
$alcohol_content_per_drink = $_POST['alcohol_content'];
$total_alcohol_consumed = $drinks * $alcohol_content_per_drink;

//setting gender_constant value for two genders
if ($_POST['gender'] == "male") {
    $gender_constant = 0.73;
} else {
    $gender_constant = 0.66;
}
// recalculating weight if unit is kg
if ($_POST['unit'] == "kg") {
    $weight *= 2.20;
}


//calculating BAC
$BAC = ($total_alcohol_consumed * 5.14) / ($weight * $gender_constant) - 0.015 * $time_elapsed;

//redirectig to main page along with a variable
header("Location:/?data=$BAC");

?>