<?php

declare(strict_types=1);

namespace Yiisoft\Db\Constraint;

/**
 * CheckConstraint represents the metadata of a table `CHECK` constraint.
 */
final class CheckConstraint extends Constraint
{
    private string $expression = '';

    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * @param string $value the SQL of the `CHECK` constraint.
     */
    public function expression(string $value): self
    {
        $this->expression = $value;

        return $this;
    }
}
