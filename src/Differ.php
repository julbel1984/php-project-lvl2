<?php

namespace Differ\Differ;

use Funct\Strings;

function genDiff($firstFilePath, $secondFilePath)
{
    $fileFirst = file_get_contents($firstFilePath, FILE_USE_INCLUDE_PATH);
    $fileSecond = file_get_contents($secondFilePath, FILE_USE_INCLUDE_PATH);
    
    $firstObject = json_decode($fileFirst, true);
    $secondObject = json_decode($fileSecond, true);

    $keys = array_keys(array_merge($firstObject, $secondObject));

    $diff = array_reduce(
        $keys,
        function ($acc, $key) use ($firstObject, $secondObject) {
            if (!array_key_exists($key, $firstObject)) {
                $acc["+ " . $key] = $secondObject[$key];
            } elseif (!array_key_exists($key, $secondObject)) {
                $acc["- " . $key] = $firstObject[$key];
            } elseif ($firstObject[$key] !== $secondObject[$key]) {
                $acc["+ " . $key] = $firstObject[$key];
                $acc["- " . $key] = $secondObject[$key];
            } elseif ($firstObject[$key] === $secondObject[$key]) {
                $acc["  " . $key] = $firstObject[$key];
            }

            return $acc;
        },
        []
    );

    $result = "{\n";
    foreach ($diff as $key => $value) {
        $result .= ' ' . $key . ': ' . json_encode($value) . "\n";
    }
    $result .= "}";

    return $result;
}
