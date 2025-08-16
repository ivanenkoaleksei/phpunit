<?php

namespace App\Model;

use App\Api\StorageInterface;

class Storage implements StorageInterface
{
    protected array $storage = [];

    public function get(string $key): mixed
    {
        return $this->storage[$key] ?? null;
    }

    public function set(string $key, mixed $value): static
    {
        $this->storage[$key] = $value;
        return $this;
    }

    public function unset(string $key): static
    {
        unset($this->storage[$key]);
        return $this;
    }

    public function has(string $key): bool
    {
        return isset($this->storage[$key]);
    }
}