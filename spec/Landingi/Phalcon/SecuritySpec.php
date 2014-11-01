<?php

namespace spec\Landingi\Phalcon;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class SecuritySpec
 *
 * @mixin \Landingi\Phalcon\Security
 * @author Tomasz Ślązok <tomek@landingi.com>
 */
class SecuritySpec extends ObjectBehavior
{
    function it_check_that_hash_is_wrong_if_password_length_is_greater_than_given_limit()
    {
        $this->checkHash('password', 'hash', 2)->shouldReturn(false);
    }

    function it_check_that_hash_is_correct_for_given_password()
    {
        $this->checkHash('password', crypt('password'))->shouldReturn(true);
        $this->checkHash('test', '$2a$08$2LT0EnxDq/cDeNQwgHsh9.0E5kqmEcmqJG8RZzbLDZjg7KT2c9zii')->shouldReturn(true);
    }

    function it_check_that_hash_is_incorrect_for_given_password()
    {
        $this->checkHash('password', crypt('test'))->shouldReturn(false);
    }
}
