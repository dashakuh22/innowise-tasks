<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task8
{
    function print_recursive($arr) {
        if($arr) {
            foreach ($arr as $key => $val) {
                if (is_array($key)) {
                    print_recursive($key);
                } else {
                    echo("$key: $val <br>");
                }
            }
        }
        return;
    }

    public function main(string $json): string
    {
        try {
            $res = json_decode($json);
            echo '<pre>';
            $this->print_recursive($res);
            echo '</pre>';
            return $res;
        } catch (Exception $ex) {
            throw new InvalidArgumentException("Invalid arguments provided. Check inputs. Must be a json string.");
        }
    }
}

$t = new Task8();
print_r($t->main('{
        "Title": "The Cuckoos Calling",
        "Author": "Robert Galbraith",
        "Detail": {
        "Publisher": "Little Brown"
        }
        }')
);