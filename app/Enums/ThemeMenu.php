<?php


namespace App\Enums;

enum OrderItemStatus: string
{
    case home = 'home';
    case service = 'service';
    case contracts = 'contracts';
    case turnOverRent = 'turnOverRent';

    public function label(): string
    {
        return match ($this) {
            self::home => 'Home',
            self::service => 'Service',
            self::contracts => 'Contracts',
            self::turnOverRent => 'Turn Over Rent',
        };
    }
}
