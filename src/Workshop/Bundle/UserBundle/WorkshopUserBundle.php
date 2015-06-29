<?php

namespace Workshop\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class WorkshopUserBundle
 * @package Workshop\Bundle\UserBundle
 */
class WorkshopUserBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}
