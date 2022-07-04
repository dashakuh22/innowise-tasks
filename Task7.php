<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task7
{
    public function main(array $arr, int $position): array
    {
        try {
            $arr_upd = [];
            print_r($arr);
            unset($arr[$position - 1]);

            foreach ($arr as $el) {
                $arr_upd[] = $el;
            }

            return $arr_upd;
        } catch (Exception $ex) {
            throw new InvalidArgumentException('Invalid arguments received. Check inputs. Must be array and int.');
        }
    }
}
