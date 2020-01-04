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

    return render($diff);
}

function render($diff)
{
    $contentToString = json_encode($diff, JSON_PRETTY_PRINT);
    $contentToArray = explode("\n", $contentToString);
     
    $formattedContent = array_map(
        function ($item) {
            $formattedString = Strings\strip($item, '"', ",");
                        return ((trim($formattedString)[0] === "+")
                            || (trim($formattedString)[0] === "-"))
            ? rtrim($formattedString, " ") : $formattedString;
        }, 
        $contentToArray
    );

    return implode("\n", $formattedContent);    
}
