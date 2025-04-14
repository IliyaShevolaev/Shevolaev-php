<?php

const toNextDay = 86400;

$mktimeStartValue = mktime(
    0,
    0,
    0,
    1,
    1,
    2021,
);

$nearSaturday = $mktimeStartValue + (6 - date('N', $mktimeStartValue)) * toNextDay;

while (date('y', $nearSaturday) == date('y', $mktimeStartValue)) {
    if (date('d', $nearSaturday) <= 20) {
        echo '<br>';
        echo date('d.m.Y', $nearSaturday);
    }

    $nearSaturday += toNextDay * 7;
}