<?php

namespace src;

use InvalidArgumentException;

class Task8
{
    public function print_recursive($arr, array &$res): array
    {
        foreach ($arr as $key => $val) {
            if (gettype($val) != 'object' && gettype($val) != 'array') {
                $res[] = "$key: $val";
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
            $result = [];
            $this->print_recursive($json_decoded, $result);

            return implode("\r\n", $result);
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

/*$t = new Task8();
$str = '{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}
';
var_dump($t->main($str));*/
