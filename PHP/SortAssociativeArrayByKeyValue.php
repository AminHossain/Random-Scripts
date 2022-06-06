<?php

/**
 * This function helps you to sort an associative array by it's kay and value
 * 
 * @param {array} $array
 * @param {*} $onKey
 * @param {*} $order // The order you wants to sort the array
 * 
 * @return {array} // The new sorted array by given Key
 */

function sortArrayByKeyValue($array, $onKey, $order = SORT_DESC) {
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $onKey) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            array_push($new_array, $array[$k]);
        }
    }

    return $new_array;
}