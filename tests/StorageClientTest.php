<?php

declare(strict_types=1);

namespace App\Tests;

use App\Api\StorageInterface;
use App\Service\StorageClient;
use PHPUnit\Framework\TestCase;

class StorageClientTest extends TestCase
{
    public function testSet(): void
    {
        $key = 'test_key';
        $value = 'test_value';
        $storageMock = $this->createMock(StorageInterface::class);
        $storageMock->expects(self::once())->method('set')->with($key, $value);
        $storageClient = new StorageClient($storageMock);
        $storageClient->set($key, $value);
    }

    public function testGet(): void
    {
        $key = 'test_key';
        $value = 'test_value';
        $storageMock = $this->createMock(StorageInterface::class);
        $storageMock->expects(self::once())->method('get')->with($key)->willReturn($value);
        $storageClient = new StorageClient($storageMock);
        self::assertSame($storageClient->get($key), $value);
    }

    public function testGetWithNonExistent(): void
    {
        $key = 'test_key';
        $storageMock = $this->createMock(StorageInterface::class);
        $storageMock->expects(self::once())->method('get')->with($key)->willReturn(null);
        $storageClient = new StorageClient($storageMock);
        self::assertNull($storageClient->get($key));
    }

    public function testUnset(): void
    {
        $key = 'test_key';
        $storageMock = $this->createMock(StorageInterface::class);
        $storageMock->expects(self::once())->method('unset')->with($key);
        $storageClient = new StorageClient($storageMock);
        $storageClient->unset($key);
    }

    public function testHas(): void
    {
        $key = 'test_key';
        $storageMock = $this->createMock(StorageInterface::class);
        $storageMock->expects(self::once())->method('has')->with($key)->willReturn(true);
        $storageClient = new StorageClient($storageMock);
        self::assertTrue($storageClient->has($key));
    }
}
