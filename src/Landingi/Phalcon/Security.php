<?php

namespace Landingi\Phalcon;

use Zend\Crypt\Utils;

class Security
{
    public function checkHash($password, $passwordHash, $maxPassLength = 0)
    {
        if ($maxPassLength) {
            if ($maxPassLength > 0 && strlen($password) > $maxPassLength) {
                return false;
            }
        }

        return Utils::compareStrings($passwordHash, crypt($password, $passwordHash));
    }
}
