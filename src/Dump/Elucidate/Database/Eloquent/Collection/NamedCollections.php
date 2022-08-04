<?php

namespace Dump\Elucidate\Database\Eloquent\Collection;

/**
 * Implements in model support a custom relationship collection in Laravel Framework;
 *
 * @property array $collections
 *
 *      protected $collections = [
 *          '<model>' => '<collection>'
 *      ];
 */
trait NamedCollections
{
	public function newCollection(array $models = [])
	{
		if ($this->hasCollectionNamed($models)) {
			return new ($this->getCollectionNamed($models));
		}
		return parent::newCollection($models);
	}
	
	private function getClassNameFromModelsArray(array $models): ?string
	{
		$firstKey = array_key_first($models);
		return !empty($models[$firstKey]) ? $models[$firstKey]::class : null;
	}
	
	private function hasCollectionNamed(array $models = []): bool
	{
		return
			!empty($models) &&
			$this->hasCollectionsAttribute() &&
			in_array($this->getClassNameFromModelsArray($models), $this->collections);
	}
	
	private function getCollectionNamed(array $models = [])
	{
		return $this->collections[$this->getClassNameFromModelsArray($models)]($models);
	}
	
	private function hasCollectionsAttribute(): bool
	{
		return !empty($this->collections);
	}
}
