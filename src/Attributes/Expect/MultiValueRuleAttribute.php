<?php declare(strict_types = 1);

namespace Orisai\ObjectMapper\Attributes\Expect;

use Orisai\ObjectMapper\Meta\Compile\RuleCompileMeta;

abstract class MultiValueRuleAttribute implements RuleAttribute
{

	private RuleCompileMeta $item;

	private ?int $minItems;

	private ?int $maxItems;

	private bool $mergeDefaults;

	public function __construct(
		RuleAttribute $item,
		?int $minItems = null,
		?int $maxItems = null,
		bool $mergeDefaults = false
	)
	{
		$this->item = new RuleCompileMeta($item->getType(), $item->getArgs());
		$this->minItems = $minItems;
		$this->maxItems = $maxItems;
		$this->mergeDefaults = $mergeDefaults;
	}

	public function getArgs(): array
	{
		return [
			'item' => $this->item,
			'minItems' => $this->minItems,
			'maxItems' => $this->maxItems,
			'mergeDefaults' => $this->mergeDefaults,
		];
	}

}
