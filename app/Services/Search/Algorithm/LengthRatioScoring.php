<?php


namespace App\Services\Search\Algorithm;


class LengthRatioScoring
{
    /**
     * if key string exists in main string, then return the size ratio
     *
     * @param string $key
     * @param string $main
     * @return float
     */
    static function score(string $key, string $main): float
    {
        $keyLen = strlen($key);
        $mainLen = strlen($main);

        if ($keyLen >= $mainLen && strpos($main, $key) > -1) {
            return $mainLen / $keyLen;
        } else {
            return 0;
        }
    }
}
