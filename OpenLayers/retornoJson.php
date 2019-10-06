<?php

$cord1 = $_POST['cord1'];
$cord2 = $_POST['cord2'];
echo json_encode(['cord1' => $cord1, 'cord2' => $cord2]);