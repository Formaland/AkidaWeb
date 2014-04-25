<?php

namespace Pfe\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PfeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
