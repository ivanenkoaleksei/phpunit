<?php

declare(strict_types=1);

namespace App\Tests;

use App\Model\Storage;
use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    public function testGetAndSetAndUnset(): void
    {
        $key = 'test_key';
        $value = 'test_value';
        $storageModel = new Storage;
        $storageModel->set($key, $value);
        $this->assertSame($storageModel->get($key), $value);
        $this->assertSame($storageModel->unset($key), $storageModel);;
        $this->assertNull($storageModel->get($key));
    }

    public function testGetWithNonExistent(): void
    {
//        $this->expectException(StorageException::class); In case when get throws exception on nonexistent key
        $storageModel = new Storage;
        $this->assertNull($storageModel->get('test_key'));
    }

    public function testHas(): void
    {
        $key = 'test_key';
        $value = 'test_value';
        $storageModel = new Storage;
        $storageModel->set($key, $value);
        $this->assertTrue($storageModel->has($key));
    }

    public function testHasWithNonExistent(): void
    {
        $key = 'test_key';
        $storageModel = new Storage;
        $this->assertFalse($storageModel->has($key));
    }
}
