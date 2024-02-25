<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Options;

enum ProductStatus: int {
   use Values;
   use InvokableCases;
   use Options;

   case PENDING = 0;
   case ACTIVE = 1;
   case NEW = 3;
   case SALE = 4;
   case SOLD = 5;
}
