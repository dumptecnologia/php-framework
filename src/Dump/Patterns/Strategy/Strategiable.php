<?php

namespace Dump\Patterns\Strategy;


use App\Interfaces\Task\TaskType;
use Dump\Patterns\Strategy\Interfaces\Strategy;
use Dump\Patterns\Strategy\Interfaces\StrategyType;
use Dump\Reflection\Reflection;

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

        if (Reflection::instanceOf($this->strategies, TaskType::class)) {
            return $this->strategies::getAll();
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
