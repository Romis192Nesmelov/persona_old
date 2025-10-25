<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pluralform
{
    public function __construct()
    {

    }

    /** Склонение существительных с числительными
     * @param int $n число
     * @param string $form1 Единственная форма: 1 секунда
     * @param string $form2 Двойственная форма: 2 секунды
     * @param string $form5 Множественная форма: 5 секунд
     * @return string Правильная форма
     */
    public function getPluralForm($n, $form1, $form2, $form5)
    {
        $n = abs($n) % 100;
        $n1 = $n % 10;
        if ($n > 10 && $n < 20) return $form5;
        if ($n1 > 1 && $n1 < 5) return $form2;
        if ($n1 == 1) return $form1;
        return $form5;
    }
}