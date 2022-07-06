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
        try {
            $json_decoded = json_decode($json);
        } catch (Exception $exception) {
            throw new InvalidArgumentException('Not json format');
        }

        if (json_last_error() === JSON_ERROR_NONE) {
            $result = '';
            $this->print_recursive($json_decoded, $result);

            return $result;
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

//$str = '[{"user_id":13,"username":"stack"},{"user_id":14,"username":"over"}]';
//$str = '{"a": { "a.1":"Значение a1","a.2":"Значение a2"},"2":"Значение 2","3":"Значение 3","4":"Значение 4","5":"Значение 5"}';
//$str = '{background-color:yellow;color:#000;padding:10px;width:650px;}';
//$str = '[0,1,3]';
//$str = '0123';
/*$t = new Task8();
$str = '{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
    "Publisher": {
        "FI": {
            "Who": {
                "Pseudonym": "Little Brown"
                }
            }
        }
    }
}
';
echo $t->main($str);*/
