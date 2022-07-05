<?php

namespace src;

use DateTime;
use Exception;
use InvalidArgumentException;

class Task2
{
    public function checkInput(array $input): bool
    {
        if (sizeof($input) == 3) {
            foreach ($input as $value) {
                if (!intval($value)) {
                    return false;
                }
            }

            return checkdate($input[1], $input[0], $input[2]);
        }

        return false;
    }

    public function updateDate($dateString): DateTime
    {
        try {
            $suppliedDate = new DateTime($dateString);
        } catch (Exception $e) {
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

        $date_parts = explode('.', $date);

        if (!$this->checkInput($date_parts)) {
            throw new InvalidArgumentException('Bad input');
        }

        $date = $this->updateDate($date)->format('d.m.Y');
        $inp = DateTime::createFromFormat('d.m.Y', $date);

        $cur = DateTime::createFromFormat('d.m.Y', date_create()->format('d.m.Y'));

        if ($cur > $inp) {
            $date = $inp->modify('+1 year')->format('d.m.Y');
            $inp = DateTime::createFromFormat('d.m.Y', $date);
        }

        return $cur->diff($inp)->format('%a');
    }
}


/*$t = new Task2();
echo '<pre>';
echo $t->main('14.10.2021', '14');
echo '</pre>';*/
