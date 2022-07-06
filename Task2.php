<?php

namespace src;

use DateTime;
use Exception;
use InvalidArgumentException;

class Task2
{
    public function checkInput(string $input): bool
    {
        $date_parts = explode('.', $input);
        if (preg_match('/\d{2}.\d{2}.\d{4}/', $input)) {
            if (sizeof($date_parts) == 3) {
                foreach ($date_parts as $value) {
                    if (!intval($value)) {
                        return false;
                    }
                }
                return checkdate($date_parts[1], $date_parts[0], $date_parts[2]);
            }
        }
        return false;
    }

    public function updateDate(string $dateString): DateTime
    {
        try {
            $suppliedDate = new DateTime($dateString);
        } catch (Exception) {
            throw new InvalidArgumentException();
        }
        $currentYear = (int)(new DateTime())->format('Y');

        return (new DateTime())->setDate(
            $currentYear,
            (int)$suppliedDate->format('m'),
            (int)$suppliedDate->format('d')
        );
    }

    public function main(string $date): string
    {
        if (func_num_args() != 1) {
            throw new InvalidArgumentException('Too many arguments');
        }

        if (!$this->checkInput($date)) {
            throw new InvalidArgumentException('Bad input');
        }

        if (strtotime($date) < strtotime('now')) {
            $date = $this->updateDate($date)->format('d.m.Y');
        }

        $inp = DateTime::createFromFormat('d.m.Y', $date);
        $cur = DateTime::createFromFormat('d.m.Y', date_create()->format('d.m.Y'));

        if ($cur > $inp) {
            $date = $inp->modify('+1 year')->format('d.m.Y');
            $inp = DateTime::createFromFormat('d.m.Y', $date);
        }

        return $cur->diff($inp)->format('%a');
    }
}

//
//$t = new Task2();
//echo '<pre>';
//echo $t->main('07.07.2024');
//echo '<br>';
//echo '<br>';
//echo '</pre>';
