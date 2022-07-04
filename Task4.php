<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task4
{
    public function main(string $input): string
    {
        try {
            $words = preg_split('/[ _-]+/', $input);

            for ($i = 0; $i < sizeof($words); $i++) {
                $words[$i] = ucfirst($words[$i]);
            }

            return implode('', $words);
        } catch (Exception $ex) {
            throw new InvalidArgumentException();
        }
    }
}
