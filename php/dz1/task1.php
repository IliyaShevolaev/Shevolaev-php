<?php

function getInitial(string $string)
{
    return mb_strtoupper(mb_substr($string, 0, 1)) . '.';
}

function getSurname(string $string)
{
    return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1, strlen($string));
}

$name = 'илья';
$surname = 'шеволаев';
$fatherName = 'вячеславович';

echo 'Фамилия и иницаилы: ' . getSurname($surname) . ' ' . getInitial($name) . getInitial($fatherName);
