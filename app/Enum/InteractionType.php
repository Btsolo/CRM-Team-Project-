<?php

namespace App\Enum;

enum InteractionType: string
{
    case CALL = 'call';
    case EMAIL = 'email';
    case MEETING = 'meeting';
    case NOTE = 'note';
    case FOLLOW_UP = 'follow_up';
    case SUPPORT_TICKET = 'support_ticket';
}
