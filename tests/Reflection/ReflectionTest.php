<?php

namespace Dump\Tests\Reflection;

use Dump\Reflection\Reflection;
use PHPUnit\Framework\TestCase;

class ReflectionTest extends TestCase
{
    public function test_class_method_exists()
    {
        $this->assertTrue(Reflection::classMethodExist(TestClass::class, 'testMethod'));
    }

    public function test_enum_class_method_exists()
    {
        $this->assertTrue(Reflection::classMethodExist(TestEnum::class, 'cases'));
    }

    public function test_enum_custom_method_class_method_exists()
    {
        $this->assertTrue(Reflection::classMethodExist(TestEnum::class, 'testMethod'));
    }


    public function test_enum_custom_method_fail_class_method_exists()
    {
        $this->assertFalse(Reflection::classMethodExist(TestEnum::class, 'notExist'));
    }
}

class TestClass
{
    public function testMethod(): void
    {

    }
}

enum TestEnum
{
    case Test;

    public function testMethod(): void
    {

    }

}
