<?php
namespace App\Enum;

enum EventType : string
{
    case Payment  ='payment';
    case Contribution = 'contribution';
}