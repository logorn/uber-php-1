<?php 
/*
 * UberAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 07/17/2016
 */

namespace UberAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Activities implements JsonSerializable {
    /**
     * Position in pagination.
     * @var integer $offset public property
     */
    public $offset;

    /**
     * Number of items to retrieve (100 max).
     * @var integer $limit public property
     */
    public $limit;

    /**
     * Total number of items available.
     * @var integer $count public property
     */
    public $count;

    /**
     * @todo Write general description for this property
     * @var Activity $history public property
     */
    public $history;

    /**
     * Constructor to set initial or default values of member properties
     * @param   integer           $offset    Initialization value for the property $this->offset 
     * @param   integer           $limit     Initialization value for the property $this->limit  
     * @param   integer           $count     Initialization value for the property $this->count  
     * @param   Activity          $history   Initialization value for the property $this->history
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->offset  = func_get_arg(0);
            $this->limit   = func_get_arg(1);
            $this->count   = func_get_arg(2);
            $this->history = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['offset']  = $this->offset;
        $json['limit']   = $this->limit;
        $json['count']   = $this->count;
        $json['history'] = $this->history;

        return $json;
    }
}