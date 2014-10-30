<?php

namespace Kwejk\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KwejkUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
