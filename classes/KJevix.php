<?php defined('SYSPATH') or die('No direct script access.');

require Kohana::find_file('vendor', 'jevix/jevix.class');

class KJevix
{
    public static function instance($name = 'default'){
        $jevix = new Jevix();

        /** @var callable $configurator  */
        $configurator = Kohana::$config->load('jevix.'.$name);

        if(is_callable($configurator))
        {
            $jevix = $configurator($jevix);
        }else
        {
            throw new Kohana_Exception($name. 'is not a callable jevix configurator');
        }
        return $jevix;
    }
}