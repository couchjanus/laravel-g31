<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\InvokableCases;

enum ProductStatus: int {
   use Values;
   use InvokableCases;

   case PENDING = 0;
   case ACTIVE = 1;
   case NEW = 3;
   case SALE = 4;
   case SOLD = 5;
}
