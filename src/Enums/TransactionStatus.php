<?php

namespace Przelewy24\Enums;

enum TransactionStatus: int
{
    case NO_PAYMENT = 0;
    case ADVANCE_PAYMENT = 1;
    case PAYMENT_MADE = 2;
    case PAYMENT_RETURNED = 3;
}
