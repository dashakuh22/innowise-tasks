<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task1
{
    public array $result = ['More than 30', 'More than 20', 'More than 10', 'Equal or less than 10'];

    public function main(int $inputNumber)
    {
        try {
            return $inputNumber > 30 ?
                $this->result[0] : (
                    $inputNumber > 20 ?
                    $this->result[1] : (
                        $inputNumber > 10 ?
                        $this->result[2] : $this->result[3]
                    )
                );
        } catch (Exception $ex) {
            throw new InvalidArgumentException();
        }
    }
}
