<?php


function countPages($dataLength, $limit = 10) {
    return $dataLength % $limit == 0 ? $dataLength / $limit : (int)($dataLength / $limit) + 1;
}
function paginate($data, $pageNumber = 1, $limit = 10) {
    $startIndex = ($pageNumber - 1) * $limit;
    $endIndex = $startIndex + $limit;
    
    return array_slice($data, $startIndex, $limit);
}
