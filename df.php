<?php
$stream="a";
$loc_key="b";
$remote_key="C";
/*отправка */
$send_packet=$stream^$loc_key;.
// ->
//echo $packet;
/*возврат */
$recv_packet=$send_packet^$remote_key;
echo $send_packet^$recv_packet; // перехватив 2ю транзакцию,.
//получаем удалённый ключь
echo "\n";
// <-
//echo $packet;
/*снятие ключа 1*/
$packet=$recv_packet^$loc_key;
echo $packet^$recv_packet;
// перехватив обратную транзакцию,.
//получаем первый ключь
echo "\n";
// ->
//echo $packet;
/*снятие ключа 2*/
$packet=$packet^$remote_key;
echo $packet;
?>


















 1Помощь     2Сохранить  3Блок       4Замена     5Копия       6Перем~тить 7Поиск      8Удалить    9МенюMC     10Выход
