<?php

/**
 * sfMediaVideoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfMediaVideoTable extends sfMediaFileTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfMediaVideoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfMediaVideo');
    }
}