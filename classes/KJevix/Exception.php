<?php defined('SYSPATH') or die('No direct script access.');

class KJevix_Exception extends Kohana_Exception{

    public $errors = array();
    public $original;
    public $result;
    /**
     Jevix error format:
        array(
            'message' => $message,
            'pos'     => $this->curPos,
            'ch'      => $this->curCh,
            'line'    => 0,
            'str'     => $str,
        );
     */

    /**
     * @param string $original_text
     * @param array|null $result
     * @param array $errors
     */
    public function __construct($original,$result, array $errors)
    {
        $this->errors = $errors;
        $this->original = $original;
        $this->result = $result;

        parent::__construct('jevix.parse_error',array(
            ':original' => $original,
            ':result' => $result,
        ));
    }
}