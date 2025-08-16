<?php

declare(strict_types=1);

namespace App\Service;

use App\Api\StorageInterface;

class StorageClient
{
    /**
     * @param StorageInterface $storage
     */
    public function __construct(
        protected readonly StorageInterface $storage
    ) {

    }

    public function get(string $key): mixed
    {
        return $this->storage->get($key);
    }

    public function set(string $key, mixed $value): void
    {
        $this->storage->set($key, $value);
    }

    public function unset(string $key): void
    {
        $this->storage->unset($key);
    }

    public function has(string $key): bool
    {
        return $this->storage->has($key);
    }
}
