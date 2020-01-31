<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CarBodyClass extends Enum
{
    const Hatchback = 0;
    const Sedan = 1;
    const SUV = 2;
    const Coupe = 3;
    const Convertible = 4;
    const StationWagon = 5;
    const Crossover = 7;
    const MPV = 8;
    const miniVan = 9;
    const Pickup = 10;
}
