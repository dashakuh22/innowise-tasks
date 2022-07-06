<?php

namespace src;

use InvalidArgumentException;

class Task6
{
    public array $WEEK_DAYS = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    public function dayCount(string $day, string $startDate, string $endDate, int $counter): int
    {
        if (strtotime($startDate) >= strtotime($endDate)) {
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
            && in_array($day, $this->WEEK_DAYS) && strtotime($date) < strtotime($lastDate)) {
            return $this->dayCount(
                $day,
                date_create($date)->format('d.m.Y'),
                date_create($lastDate)->format('d.m.Y'),
                0
            );
        } else {
            throw new InvalidArgumentException('Bad input.');
        }
    }
}

/*$t = new Task6();
echo $t->main(1980, 2021, 5, 10);*/
