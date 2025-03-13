<?php

namespace App\Enum;

enum CustomerTag: string
{
    case VIP = 'vip';
    case NEW = 'new';
    case HIGH_VALUE = 'high_value';
    case FOLLOW_UP = 'follow_up';
    case POTENTIAL_LEAD = 'potential_lead';
    case LOST_CUSTOMER = 'lost_customer';
    case IMPORTANT = 'important';
}
