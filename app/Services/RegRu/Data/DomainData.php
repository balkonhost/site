<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class DomainData extends Data
{
    public function __construct(
        public int $service_id,
        public string $domain,
        public string $state,
        public string $creation_date,
        public string $expiration_date
    ) {}

    public static function from(mixed ...$payloads): static
    {
        $data = current($payloads);

        return new self(
            $data['service_id'],
            $data['dname'],
            self::state($data['state']),
            $data['creation_date'],
            $data['expiration_date']
        );
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
