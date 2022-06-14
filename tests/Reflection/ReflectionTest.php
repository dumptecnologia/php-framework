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

    public function test_class_instance_of()
    {
        $this->assertTrue(Reflection::instanceOf(TestClass::class, TestInterface::class));
    }

    public function test_enum_instance_of()
    {
        $this->assertTrue(Reflection::instanceOf(TestEnum::class, TestInterface::class));
    }

}

interface TestInterface
{
}

class TestClass implements TestInterface
{
    public function testMethod(): void
    {

    }
}

enum TestEnum implements TestInterface
{
    case Test;

    public function testMethod(): void
    {

    }

}
