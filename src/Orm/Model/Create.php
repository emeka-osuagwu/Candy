<?php

namespace Emeka\Candy\Helpers;

use Emeka\Candy\Base\BaseClass;
use Emeka\Base\Exceptions\InvalidNameException;
use Emeka\Candy\Database\Connections\Connect;

class Create extends Connect
{

    public function checkIsset ( $object )
    {
        extract($object, EXTR_PREFIX_SAME, "wddx");
        try
        {
            if ( $name == null || $role == null || $age == null )
            {
                throw new InvalidNameException("some variable are not set for the create function.");
            }
        }
        catch (InvalidNameException $e)
        {
            return $e
        }

        try
        {
            if ( ! is_array( $object ) )
            {
                throw new InvalidNameException("some variable are not set for the create function.");
            }
        }
        catch (InvalidNameException $e)
        {
            return $e;
        }
        return $object;
    }


    public function create ( $object )
    {
        return $this->checkIsset ( $object );
    }

}

