<?php

namespace Workshop\Bundle\AclBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsPassword extends Constraint
{
    public $message = 'One capital and one uppercase letter are required';
    /**
     * @return string
     */
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}