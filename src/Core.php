<?php


namespace Drandin\DeclensionNouns;

/**
 * Class Core
 * @package Drandin\DeclensionNouns
 */
class Core
{
    /**
     * @param int $number
     * @param array $options
     * @return string
     */
    public function plural(int $number, array $options): string
    {
        $numberPositive = abs($number);

        $cases = [2, 0, 1, 1, 1, 2];

        $key = $numberPositive % 100 > 4 && $numberPositive % 100 < 20
            ? 2
            : $cases[min($numberPositive % 10, 5)];

        return $options[$key];
    }

}
