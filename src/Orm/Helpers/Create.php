<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Base\BaseClass;
use Emeka\Base\Exceptions\CreateException;
use Emeka\Potato\Database\Connections\Connect;

class Create extends Connect
{

    public function checkIsset ( $object )
    {
        extract($object, EXTR_PREFIX_SAME, "wddx");
        try
        {
            if ( $name == null || $role == null || $age == null )
            {
                throw new CreateException();
            }
        }
        catch (CreateException $e)
        {
            return $e->unSetVariable();
        }

        try
        {
            if ( ! is_array( $object ) )
            {
                throw new CreateException;
            }
        }
        catch (CreateException $e)
        {
            return $e->isNotArray();
        }
        return $object;
    }


    public function create ( $object )
    {
        return $this->checkIsset ( $object );
    }

}

