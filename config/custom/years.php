<?php
    $years = [];

    for ($i = 1930; $i <= date("Y"); $i++){
        $years[$i] = $i;
    }

    return $years;
?>
