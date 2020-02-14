<?php

namespace TangoTiendas\Model;

class ProductComment extends AbstractModel
{
    /**
     * @var int
     */
    protected $Line;

    /**
     * Getter for Line
     * @return int
     */
    public function getLine()
    {
        return $this->Line;
    }

    /**
     * Setter for Line
     * @param int Line
     * @return self
     */
    public function setLine($Line)
    {
        $this->Line = $Line;
        return $this;
    }

    /**
     * @var string
     */
    protected $Text;

    /**
     * Getter for Text
     * @return string
     */
    public function getText()
    {
        return $this->Text;
    }

    /**
     * Setter for Text
     * @param string Text
     * @return self
     */
    public function setText($Text)
    {
        $this->Text = $Text;
        return $this;
    }
}
