<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDNI implements Rule
{
    /**
     * Validate DNI
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Extracts the 8 numerical digits of the DNI
		$dniDigits = substr($value, 0, 8);
		// Check if contains letters and the length
		if (strlen($value) !== 9 || preg_match('/\p{L}/u', $dniDigits))
			return false;

		// Calculate the remainder of the division between the digits and 23
		$rest = $dniDigits % 23;

		// Defines the correspondence table between remainder and letter
		$dniLetters = 'TRWAGMYFPDXBNJZSQVHLCKE';

		// Get the corresponding letter
		$expectedLetter = $dniLetters[$rest];

		// Compare the expected letter with the given letter
		$dniLetter = strtoupper(substr($value, -1));
		return $dniLetter === $expectedLetter;
    }

    /**
     * Correct format message
     *
     * @return string
     */
    public function message()
    {
        return __('validation.dni');
    }
}
