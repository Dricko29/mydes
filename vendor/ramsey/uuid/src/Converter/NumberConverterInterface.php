<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Converter;

/**
 * A number converter converts UUIDs from hexadecimal characters into
 * representations of integers and vice versa
 *
 * @psalm-immutable
 */
interface NumberConverterInterface
{
    /**
     * Converts a hexadecimal number into a string integer representation of
     * the number
     *
     * The integer representation returned is a string representation of the
     * integer, to accommodate unsigned integers greater than PHP_INT_MAX.
     *
     * @param non-empty-string $hex The hexadecimal string representation to convert
     *
     * @return numeric-string String representation of an integer
     *
     * @psalm-pure
     */
    public function fromHex(string $hex): string;

    /**
     * Converts a string integer representation into a hexadecimal string
     * representation of the number
     *
     * @param numeric-string $number A string integer representation to convert;
     *     this must be a numeric string to accommodate unsigned integers
     *     greater than PHP_INT_MAX.
     *
     * @return non-empty-string Hexadecimal string
     *
     * @psalm-pure
     */
    public function toHex(string $number): string;
}
