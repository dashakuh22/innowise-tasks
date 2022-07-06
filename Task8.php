<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task8
{
    public function print_recursive($arr, string &$res): string
    {
        if (is_string($arr) || is_integer($arr)) {
            return $res = $arr;
        }
        foreach ($arr as $key => $val) {
            if (gettype($val) != 'object' && gettype($val) != 'array') {
                $res .= "$key: $val <br>";
            } else {
                $this->print_recursive($val, $res);
            }
        }

        return $res;
    }

    public function main(string $json): string
    {
        $json_decoded = json_decode($json);

        if (is_object($json_decoded) && json_last_error() === JSON_ERROR_NONE) {
            $result = '';
            $this->print_recursive($json_decoded, $result);

            return $result;
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}
/*
$t = new Task8();
$str = '{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}
';
echo $t->main($str);*/
