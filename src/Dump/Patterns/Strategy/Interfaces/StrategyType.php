<?php

namespace Dump\Patterns\Strategy\Interfaces;

interface StrategyType
{
    public static function getStrategy(self $value): Strategy;

    public function strategy(): Strategy;

    public function all(): array;

    public static function getAll(): array;
}
