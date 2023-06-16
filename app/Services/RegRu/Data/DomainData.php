<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class DomainData extends Data
{
    public function __construct(
        public int $service_id,
        public string $name,
        public string $state,
        public string $creation_date,
        public string $expiration_date
    ) {}

    public static function fromJson(array $json): self
    {
        if ('domain' === $json['servtype']) {
            return new self(
                $json['service_id'],
                $json['dname'],
                self::state($json['state']),
                $json['creation_date'],
                $json['expiration_date']
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
