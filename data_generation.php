<?php

$file = fopen("./david_data_school.csv", "w");
fputcsv($file, ["pays", "age", "note", "redoublant"], ";");

$lines = range(0, 30_000);
array_walk(
    $lines,
    function () use ($file) {
        $note = random_int(0, 20);
        fputcsv(
            $file,
            [
                "pays" => random_int(1, 2) === 1 ? "France" : "Portugal",
                "age" => random_int(12, 16),
                "note" => $note === 0 ? "N/A" : $note,
                "redoublant" => random_int(0, 1) ? "true" : "false"
            ],
            ";"
        );
    }
);

fclose($file);