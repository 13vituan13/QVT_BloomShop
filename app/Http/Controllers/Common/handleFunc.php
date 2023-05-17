<?php
function mergeSort($array)
{   
    //check array with at least 1 element or more
    if (count($array) <= 1) {
        return $array;
    }
    //split array into 2 parts return position mid array
    $middle = (int) count($array) / 2;

    //get array LEFT from position 0 -> middle - 1
    $left = array_slice($array, 0, $middle);

    //get array RIGHT from position middle -> last
    $right = array_slice($array, $middle);

    //sort array LEFT by Recursion
    $left = mergeSort($left);

    //sort array RIGHT by Recursion
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right)
{
    $result = [];

    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    while (count($left) > 0) {
        $result[] = array_shift($left);
    }

    while (count($right) > 0) {
        $result[] = array_shift($right);
    }

    return $result;
}

function binarySearch($arr, $x) {
    $left = 0;
    $right = count($arr) - 1;
    while ($left <= $right) {
        //floor() returns the nearest small integer less than it
        $mid = floor(($left + $right) / 2);
        if ($arr[$mid] == $x) {
            return $mid;
        }
        if ($arr[$mid] < $x) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;
}



