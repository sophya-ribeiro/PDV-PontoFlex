<?php

declare(strict_types=1);

namespace App\Utility;

class CurrencyHelper
{
	public static function brlToFloat($brlString)
	{
		$brlString = str_replace(['.', ' '], '', $brlString);
		$brlString = str_replace(',', '.', $brlString);

		return floatval($brlString);
	}
}
