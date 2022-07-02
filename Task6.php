<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task6
{
    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): string
    {
        try {
            return '';
        } catch (Exception $ex) {
            throw new InvalidArgumentException('Invalid arguments received. Check inputs. Must be array and int.');
        }
    }
}
