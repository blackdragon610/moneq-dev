<?php
    $years = [];
    $limit = date('Y') + 100;

    for ($i = date("Y"); $i <= $limit; $i++){
        $years[$i] = $i;
    }

    return $years;
?>
