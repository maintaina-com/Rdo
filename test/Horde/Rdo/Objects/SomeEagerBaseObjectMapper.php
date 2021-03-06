<?php

namespace Horde\Rdo\Objects;
use Horde_Rdo_Mapper;
use Horde_Rdo;

class SomeEagerBaseObjectMapper extends Horde_Rdo_Mapper
{
    /**
     * Inflector doesn't support Horde-style tables yet
     */
    protected $_table = 'test_someeagerbaseobjects';
    protected $_relationships = array(
        'eagerRelatedThing'  => array('type' => Horde_Rdo::ONE_TO_ONE,
                'foreignKey' => 'relatedthing_id',
                'mapper' => 'Horde\Rdo\Objects\RelatedThingMapper'),
            );
}
