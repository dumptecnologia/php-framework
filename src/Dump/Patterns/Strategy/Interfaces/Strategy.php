<?php

namespace Dump\Patterns\Strategy\Interfaces;

interface Strategy
{
    public function type(): StrategyType;
}
