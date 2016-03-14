<?php

class Gallery
{
    CONST RELATIVE_BASEPATH = DIRECTORY_SEPARATOR.'images';

    protected $basepath;
    protected $path;

    public function __construct()
    {
        $this->basepath = dirname(dirname(__FILE__));
        $this->path = $this->basepath . self::RELATIVE_BASEPATH . DIRECTORY_SEPARATOR;
        if( ! file_exists($this->path))
        {
            mkdir($this->path, 0644, true);
        }
    }

    /**
     * @return Image
     */
    public function all()
    {
        $images = [];
        $directoryListing = glob($this->path . '*');
        foreach($directoryListing as $file)
        {
            $tmp = new Image($file);
            $images[] = $tmp;
        }
        return $images;
    }

    public function get($name)
    {
        if( ! $this->exists($name))
        {
            return false;
        }
        return new Image($this->path . $name);
    }

    public function exists($name)
    {
        if(file_exists($this->path . $name))
        {
            return true;
        } else {
            return false;
        }
    }
}
