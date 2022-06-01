<?php

namespace Dump\Patterns\Strategy\Interfaces;

/**
 * @property ?Strategy $strategy = null
 */
interface Strategiable
{
    public function setStrategy(StrategyType $type): self;

    public function getStrategy(): ?StrategyType;

    /** @return array<int, Strategy> */
    public function strategies(): array;

}
