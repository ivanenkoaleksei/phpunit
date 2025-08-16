<?php

namespace App\Api;

interface StorageInterface
{
    public function get(string $key): mixed;
    public function set(string $key, mixed $value): static;
    public function unset(string $key): static;
    public function has(string $key): bool;
}