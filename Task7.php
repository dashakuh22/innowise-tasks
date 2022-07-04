<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task7
{
    public function main(array $arr, int $position)
    {
        try {
            $arr_upd = [];
            unset($arr[$position]);

            foreach ($arr as $el) {
                $arr_upd[] = $el;
            }
            echo '<pre>';
            print_r($arr_upd);
            echo '</pre>';
        } catch (Exception $ex) {
            throw new InvalidArgumentException('Invalid arguments received. Check inputs. Must be array and int.');
        }
    }
}

//$t = new Task7();
//$t->main( [1, 2, 3, 4, 5], 3);
