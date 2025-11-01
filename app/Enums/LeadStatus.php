<?php

namespace App\Enums;

enum LeadStatus: string
{
    case NEW = 'new';
    case CONTACTED = 'contacted';
    case INTERESTED = 'interested';
    case NOT_INTERESTED = 'not_interested';
    case CONVERTED = 'converted';

    public function label(): string
    {
        return match($this) {
            self::NEW => 'Baru',
            self::CONTACTED => 'Dihubungi',
            self::INTERESTED => 'Tertarik',
            self::NOT_INTERESTED => 'Tidak Tertarik',
            self::CONVERTED => 'Converted',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::NEW => 'blue',
            self::CONTACTED => 'yellow',
            self::INTERESTED => 'green',
            self::NOT_INTERESTED => 'red',
            self::CONVERTED => 'purple',
        };
    }

    public static function options(): array
    {
        return array_map(
            fn($case) => ['value' => $case->value, 'label' => $case->label()],
            self::cases()
        );
    }
}