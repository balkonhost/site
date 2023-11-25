<?php
namespace App\Services\RegRu\Data\Hosting;

use Spatie\LaravelData\Data;

class HostingData extends Data
{
    public function __construct(
        public int $service_id,
        public string $state,
        public string $type,
        public string $subtype,
        public string $creation_date,
        public string $expiration_date,

    ) {}

    public static function fromJson(array $json): self|bool
    {
        if (str_contains($json['servtype'], 'srv_hosting')) {
            return new self(
                $json['service_id'],
                self::state($json['state']),
                str_replace('srv_hosting_', '', $json['servtype']),
                $json['subtype'],
                $json['creation_date'],
                $json['expiration_date'],
            );
        }

        return false;
    }

    protected static function state($state): string
    {
        return match ($state) {
            'A' => 'active',
            'S' => 'suspended',
            'D' => 'deleted',
            'O' => 'moved',
            default => 'inactive',
        };
    }
}
