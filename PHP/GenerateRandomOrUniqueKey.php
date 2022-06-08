<?php

/**
 * Some ways to generate random key or token in PHP
 */

$string = "^abscdefghij9klmnopqrst3uvwxyz#ABCDEFGHIJ_KLMNOP*QRST&UVWXYZ!1234567890!@#$%^&*()_-+";

function generateUniqueKey() {
    global $string;

    $token = substr(str_shuffle($string), 0, 10);
    return $token;
}

function generateMD5Key() {
    global $string;

    $token = md5(time().substr(str_shuffle($string), 0, 10));
    return $token;
}

function generateSHA1Key() {
    global $string;

    $token = sha1(microtime(true).substr(str_shuffle($string), 0, 10));
    return $token;
}

function generateHashKey() {
    global $string;

    $token = hash("sha256", uniqid().substr(str_shuffle($string), 0, 10));
    return $token;
}

function generateRandomByteKey() {
    $token = bin2hex(random_bytes(mt_rand(1,25)));
    return $token;
}

// echo generateRandomByteKey();