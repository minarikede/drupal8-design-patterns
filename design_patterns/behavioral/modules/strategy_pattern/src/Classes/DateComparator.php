<?php

namespace Drupal\strategy_pattern\Classes;
class DateComparator implements ComparatorInterface
{
    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return int
     */
    public function compare($a, $b): int
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);
        if ($aDate == $bDate) {
            return 0;
        }
        return ($aDate < $bDate) ? -1 : 1;
    }
}
