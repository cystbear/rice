<?php

namespace Rice\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RiceUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
