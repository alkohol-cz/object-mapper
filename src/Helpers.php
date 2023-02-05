<?php declare(strict_types = 1);

namespace Orisai\ObjectMapper;

use function array_unique;
use function levenshtein;
use function strlen;

final class Helpers
{

	/**
	 * Looks for a string from possibilities that is most similar to value, but not the same (for 8-bit encoding).
	 *
	 * @param array<string> $possibilities
	 */
	public static function getSuggestion(array $possibilities, string $value): ?string
	{
		$best = null;
		$min = (strlen($value) / 4 + 1) * 10 + .1;
		foreach (array_unique($possibilities) as $item) {
			if ($item !== $value && ($len = levenshtein($item, $value, 10, 11, 10)) < $min) {
				$min = $len;
				$best = $item;
			}
		}

		return $best;
	}

}
