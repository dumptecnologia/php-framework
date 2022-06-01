<?php

namespace Dump\Patterns\Strategy\Interfaces;


abstract class Strategiable
{

    protected ?Strategy $strategy = null;


    abstract public function setStrategy(StrategyType $type): self;

    abstract public function getStrategy(): ?StrategyType;

    /** @return array<int, Strategy> */
    abstract public function strategies(): array;

}
