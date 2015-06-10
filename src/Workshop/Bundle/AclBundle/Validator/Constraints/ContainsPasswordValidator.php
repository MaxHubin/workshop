<?php

namespace Workshop\Bundle\AclBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class ContainsPassword
 * @package Workshop\Bundle\AclBundle\Validator\Constraints
 */
class ContainsPasswordValidator extends ConstraintValidator
{
    /**
     * @param string     $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!preg_match('/[A-Z]+/', $value, $matches) || !preg_match('/[a-z]+/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}