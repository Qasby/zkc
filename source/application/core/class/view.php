<?php
class view
{
    /**
     * Base directory with template files.
     * @static string
     */
    static $dir = 'template/';
    static $var = array();
	protected $file;
    protected $data = array();
    function __construct($file)
    {
        $this->file = $file;
    }
    
    function __get($name)
    {
        return array_key_exists($name, $this->data) ? $this->data[$name] : null;
    }
    
    function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    function __toString()
    {
        if (!file_exists(self::$dir . $this->file)) return '';
        foreach (array_merge(self::$var, $this->data) as $name => $value)
        {
            if ($name != 'this') $$name = $value;
        }
        unset($name, $value);
        $_dir = self::$dir;
        ob_start();
        require $_dir . $this->file;
        return ob_get_clean();
    }
}