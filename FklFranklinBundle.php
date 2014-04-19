<?php

namespace Fkl\FranklinBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FklFranklinBundle extends Bundle
{

    public function getParent()
    {
        return 'DevelopatheCrudBundle';
    }

}
