<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task8
{
    public function print_recursive($arr, &$res)
    {
        foreach ($arr as $key => $val) {
            if (gettype($val) == 'string') {
                $res .= "$key: $val <br>";
            } else {
                $this->print_recursive($val, $res);
            }
        }

        return $res;
    }

    public function main(string $json): string
    {
        try {
            $json_decoded = json_decode($json);
            $result = '';
            $this->print_recursive($json_decoded, $result);

            return $result;
        } catch (Exception $ex) {
            throw new InvalidArgumentException('Invalid arguments provided. Check inputs. Must be a json string.');
        }
    }
}
