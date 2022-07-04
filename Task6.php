<?php

namespace src;

use InvalidArgumentException;

class Task6
{
    public string $START = '01.01.1980';
    public string $END = '31.12.1999';

    public function checkRange($date): bool
    {
        $date = strtotime($date);
        return $date >= strtotime($this->START) && $date <= strtotime($this->END);
    }

    public function dayCount($day, $startDate, $endDate, $counter): int
    {
        if (strtotime($startDate) > strtotime($endDate)) {
            return $counter;
        } else {
            if (date('l', strtotime($startDate)) == $day) {
                $counter++;
            }

            return $this->dayCount(
                $day,
                date_create($startDate)->modify('first day of next month')->format('d.m.Y'),
                $endDate,
                $counter
            );
        }
    }

    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        $date = '01.' . $month . '.' . $year;
        $lastDate = '01.' . $lastMonth . '.' . $lastYear;

        if (checkdate($month, '01', $year) && checkdate($lastMonth, '01', $lastYear)
            && $this->checkRange($date) && $this->checkRange($lastDate)) {
            return $this->dayCount(
                $day,
                date_create($date)->format('d.m.Y'),
                date_create($lastDate)->format('d.m.Y'),
                0
            );
        } else {
            throw new InvalidArgumentException('Invalid arguments received. Check inputs.');
        }
    }
}

//$t = new Task6();
//echo $t->main(1980, 1981, 2, 3);
