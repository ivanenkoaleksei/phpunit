<?php

declare(strict_types=1);

namespace App\Tests;

use App\Service\StorageClient;
use App\Model\Storage;
use PHPUnit\Framework\TestCase;

class StorageClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testAdd(): void
    {
        $storage = new Storage();
        $storageClient = new StorageClient($storage);
        $data = $this->argumentsSource();
        foreach ($data as $key => $value) {
            $storageClient->set($key, $value);
            if ($storageClient->has($key)) {
                $storageValue = $storageClient->get($key);
                $this->assertSame($value, $storageValue);
                $storageClient->unset($key);
                $storageValue = $storageClient->get($key);
                $this->assertSame(null, $storageValue);
            }
        }
    }

    public function argumentsSource(): array
    {
        return [
            'string' => 'qwerty',
            'number' => 123,
            'bool' => true,
            'array' => [-10, 10, 0]
        ];
    }
}
