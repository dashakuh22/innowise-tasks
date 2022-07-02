<?php

namespace src;

class Task2
{
    public function updateDate($dateString)
    {
        $suppliedDate = new \DateTime($dateString);
        $currentYear = (int)(new \DateTime())->format('Y');
        return (new \DateTime())->setDate(
            $currentYear,
            (int)$suppliedDate->format('m'),
            (int)$suppliedDate->format('d')
        );
    }

    public function main(string $date)
    {
        $date_parts = explode('.', $date);
        if (!checkdate($date_parts[1], $date_parts[0], $date_parts[2])) {
            throw new \InvalidArgumentException();
        }

        $date = $this->updateDate($date)->format('d.m.Y');
        $inp = \DateTime::createFromFormat('d.m.Y', $date);

        $cur = \DateTime::createFromFormat('d.m.Y', date_create('now')->format('d.m.Y'));

        if ($cur > $inp) {
            $date = $inp->modify('+1 year')->format('d.m.Y');
            $inp = \DateTime::createFromFormat('d.m.Y', $date);
        }

        return $cur->diff($inp)->format('%a');
    }
}
