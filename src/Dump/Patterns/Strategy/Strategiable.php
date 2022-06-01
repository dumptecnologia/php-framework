<?php

namespace Dump\Patterns\Strategy;


use Dump\Patterns\Strategy\Interfaces\Strategy;
use Dump\Patterns\Strategy\Interfaces\StrategyType;

/**
 * @property ?Strategy $strategy = null
 * @implements \Dump\Patterns\Strategy\Interfaces\Strategiable
 */
trait Strategiable
{

    public function setStrategy(StrategyType $type): self
    {
        if ($type->strategy() instanceof Strategy) {
            $this->strategy = $type->strategy();
            return $this;
        }

        throw new \Exception('strategy need have instance of \Dump\Patterns\Strategy\Interfaces\Strategy');

    }


    public function getStrategy(): ?StrategyType
    {
        return $this->strategy->type();
    }


    /** @return array<int, Strategy> */
    public function strategies(): array
    {
        return empty($this->strategy) ? [] : $this->strategy->type()->all();
    }


    protected function bootStrategy(?StrategyType $strategy = null): void
    {
        if ($strategy !== null) {
            $this->setStrategy($strategy);
        }
    }

}
