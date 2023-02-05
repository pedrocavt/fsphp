<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define('DATE_BR', "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1995-11-10");
$dateStatic = DateTime::createFromFormat("d/m/Y", "10/03/2025");

var_dump([
    $dateNow,
    $dateBirth,
    $dateStatic
]);

var_dump([
    $dateNow->format(DATE_BR),
    $dateBirth->format("d")
]);

$newDateTimezone = new DateTimeZone("Pacific/Apia");
$newDateTime = new DateTime("now", $newDateTimezone);

var_dump([
    $newDateTimezone,
    $newDateTime
]);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");
var_dump($dateInterval);

$dateTime = new DateTime("now");
// $dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

var_dump($dateTime);

$birth = new DateTime("2023-11-10");
$dateNow = new DateTime("now");

$diff = $dateNow->diff($birth);

var_dump($birth, $diff);    

if ($diff->invert) {
    echo "Já se passaram $diff->days do seu aniversário";
} else {
    echo "Faltam $diff->days para o seu aniversário";
}

$dateResources = new DateTime("now");

var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR),

]);

$dateTrip = new DateTime("2023-02-16 19:00:00");
$dateNow = new DateTime("now");

$diffDaysToTrip = $dateTrip->diff($dateNow);

var_dump([
    $dateTrip->format(DATE_BR),
    $diffDaysToTrip
]);

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);


$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2024-02-05");

$period = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR),
]);

var_dump([
    $period, get_class_methods($period),
    $period->getRecurrences()
]);

foreach($period as $recorrences) {
    echo "proximo vencimento será dia " . $recorrences->format(DATE_BR) . "<br>";
}