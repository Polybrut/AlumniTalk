<?php

$sql = "SELECT SUM(Tier) AS Certificate_Granted FROM students";
$query = mysqli_query($conn,$sql);
$report = mysqli_fetch_assoc($query);
$granted = $report['Certificate_Granted'];

$result = "total number of certificates grated : $granted";

?>