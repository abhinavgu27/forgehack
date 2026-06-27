<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case AGENT = 'agent';
    case CUSTOMER = 'customer';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrator',
            self::AGENT => 'Agent',
            self::CUSTOMER => 'Customer',
        };
    }

    public function canManageUsers(): bool
    {
        return $this === self::ADMIN;
    }

    public function canAccessAgentFeatures(): bool
    {
        return $this === self::ADMIN || $this === self::AGENT;
    }
}