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
        return new KJevix($jevix);
    }

    protected $jevix;
    public function __construct(Jevix $jevix)
    {
        $this->jevix = $jevix;
    }
    public function get_jevix()
    {
        return $this->jevix;
    }

    public function parse($text,&$errors){
        $errors = null;

        $text= str_replace("\n", "[n]", str_replace("\r\n", "[rn]", $text));
        $res = $this->jevix->parse($text, $errors);
        $res = str_replace("[n]", "\n", str_replace("[rn]", "\r\n", $res));

        if ($errors)
        {
            throw new KJevix_Exception($text,$res,$errors);
        }
        return $res;
    }
}