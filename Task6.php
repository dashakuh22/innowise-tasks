<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task6
{
    public string $START = '01.01.1980';
    public string $END = '31.12.1999';

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
        $date = '01.'.$month.'.'.$year;
        $lastDate = '01.'.$lastMonth.'.'.$lastYear;

        $date_time = strtotime($date);
        $lastdate_time = strtotime($lastDate);
        $this->START = strtotime($this->START);
        $this->END = strtotime($this->END);

        if (checkdate($month, '01', $year) && checkdate($lastMonth, '01', $lastYear) &&
             $date_time > $this->START && $date_time < $this->END &&
             $lastdate_time > $this->START && $lastdate_time < $this->END) {
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
