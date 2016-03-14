<?php

class Image
{
    protected $path;
    protected $gallery;

    public function __construct($path = null, Gallery $gallery = NULL)
    {
        if( ! is_null($path))
        {
            $this->setPath($path);
        }
        if( ! is_null($gallery))
        {
            $this->gallery = $gallery;
        }
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function webPath()
    {
        return DIRECTORY_SEPARATOR . basename(dirname(dirname($this->path))) . DIRECTORY_SEPARATOR . basename(dirname($this->path)) . DIRECTORY_SEPARATOR . basename($this->path);
    }

    public function getName($bWithExtension = false)
    {
        if($bWithExtension)
            return basename($this->path);
        else{
            $name = explode('.', basename($this->path));
            array_pop($name);
            return implode('.', $name);
        }
    }

    public function getExtension()
    {
        return pathinfo($this->getPath(), PATHINFO_EXTENSION);
    }
}
