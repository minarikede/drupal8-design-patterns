<?php

namespace Drupal\strategy_pattern\Classes;
class IdComparator implements ComparatorInterface
{
    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return int
     */
    public function compare($a, $b): int
    {
        if ($a['id'] == $b['id']) {
            return 0;
        }
        return ($a['id'] < $b['id']) ? -1 : 1;
    }
}
