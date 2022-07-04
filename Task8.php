<?php

namespace src;

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
        $json_decoded = json_decode($json);
        if (is_object($json_decoded) && json_last_error() === JSON_ERROR_NONE) {
            $result = '';
            $this->print_recursive($json_decoded, $result);

            return $result;
        } else {
            throw new InvalidArgumentException('Invalid arguments provided. Check inputs. Must be a json string.');
        }
    }
}

/*$str = '{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": {
"Last name": "Brown",
"First name": "Little"
}
}
}
';*/
/*$str = '44';
$t = new Task8();
echo $t->main($str);*/
