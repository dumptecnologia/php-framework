<?php

namespace Dump\Patterns\Strategy;


use Dump\Patterns\Strategy\Interfaces\Strategy;
use Dump\Patterns\Strategy\Interfaces\StrategyType;

/**
 * @property ?Strategy $strategy = null
 * @property ?StrategyType $strategies = null // namespace StrategyType::class
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
        if ($this->strategy) {
            return $this->strategy->type()->all();
        }

        if ($this->strategies && method_exists($this->strategies, 'all')) {
            return $this->strategies->all();
        }

        throw new \Exception('strategies not found in atribute $strategy and $strategies');
    }


    protected function bootStrategy(?StrategyType $strategy = null): void
    {
        if ($strategy !== null) {
            $this->setStrategy($strategy);
        }
    }

}
