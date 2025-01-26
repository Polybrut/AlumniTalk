<?php

$sql = "SELECT * FROM AlumniTalkProfile";
$query = mysqli_query($conn,$sql);

$rows = mysqli_num_rows($query);

$result = "Numbers of Alumni Talk events held : $rows";

?>