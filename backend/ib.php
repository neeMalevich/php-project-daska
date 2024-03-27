<?php

//echo '<pre>';
//echo print_r($length);
//echo print_r($grid);
//echo '<pre>';

function routeEncryption($plaintext)
{
    $plaintext = str_replace(' ', '', $plaintext); // Удаляем пробелы из текста

    $length = mb_strlen($plaintext, 'utf-8');
    $numCols = ceil($length / 6); // Округление вверх
    $numRows = ceil($length / $numCols);

    $grid = [];
    $index = 0;
    for ($col = 0; $col < $numCols; $col++) {
        $grid[$col] = [];
        for ($row = 0; $row < $numRows; $row++) {
            if ($index < $length) {
                $grid[$col][$row] = mb_substr($plaintext, $index, 1, 'utf-8');
                $index++;
            } else {
                $grid[$col][$row] = '';
            }
        }
    }

    echo '<pre>';
    echo print_r($numCols);
    echo print_r($numRows);
    echo print_r($grid);
    echo '<pre>';

    $word = '';
    $isReadingDownwards = true;

    for ($col = 0; $col < $numCols; $col++) {
        if ($isReadingDownwards) {
            for ($row = 0; $row < $numRows; $row++) {
                if ($grid[$row][$col] !== '') {
                    $word .= $grid[$row][$col];
                }
            }
        } else {
            for ($row = $numRows - 1; $row >= 0; $row--) {
                if ($grid[$row][$col] !== '') {
                    $word .= $grid[$row][$col];
                }
            }
        }

        $isReadingDownwards = !$isReadingDownwards;
    }

    return $word;

}

$plaintext = 'мультфильм классный';

$ciphertext = routeEncryption($plaintext);
echo 'Зашифрованный текст: ' . $ciphertext;