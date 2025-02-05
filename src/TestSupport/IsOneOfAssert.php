<?php

declare(strict_types=1);

namespace Yiisoft\Db\TestSupport;

use PHPUnit\Framework\Constraint\Constraint;
use Yiisoft\VarDumper\VarDumper;

use function implode;
use function in_array;

/**
 * IsOneOfAssert asserts that the value is one of the expected values.
 */
final class IsOneOfAssert extends Constraint
{
    public function __construct(private array $allowedValues)
    {
    }

    /**
     * Returns a string representation of the object.
     */
    public function toString(): string
    {
        $allowedValues = [];

        foreach ($this->allowedValues as $value) {
            $this->allowedValues[] = VarDumper::create($value)->asString();
        }

        $expectedAsString = implode(', ', $allowedValues);

        return "is one of $expectedAsString";
    }

    protected function matches($other): bool
    {
        return in_array($other, $this->allowedValues, false);
    }
}
