<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task6
{
    public function dayCount($day, $startDate, $endDate, $counter, &$dates): string
    {
        try {
            if (strtotime($startDate) > strtotime($endDate)) {
                return 'Count of '.$day.'s<br>'.$counter.'<br>'.$dates;
            } else {

                if (date('l', strtotime($startDate)) == $day) {
                    $dates .= $startDate.'<br>';
                    $counter++;
                }

                return $this->dayCount(
                    $day,
                    date_create($startDate)->modify('first day of next month')->format('d.m.Y'),
                    $endDate,
                    $counter,
                    $dates
                );
            }
        } catch (Exception $ex) {
            throw new InvalidArgumentException();
        }
    }

    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): string
    {
        if (checkdate($month, '01', $year) && checkdate($lastMonth, '01', $lastYear)) {
            $date = '01.'.$month.'.'.$year;
            $lastDate = '01.'.$lastMonth.'.'.$lastYear;

            return $this->dayCount(
                $day,
                date_create($date)->format('d.m.Y'),
                date_create($lastDate)->format('d.m.Y'),
                0,
                $appropriate_dates
            );
        } else {
            throw new InvalidArgumentException('Invalid arguments received. Check inputs.');
        }
    }
}

//$t = new Task6();
//echo $t->main(1980, 1981, 2, 3);
