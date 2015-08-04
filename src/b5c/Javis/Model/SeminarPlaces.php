<?php

namespace b5c\Javis\Model;
use b5c\Javis\ModelBase;
use SimpleXMLElement;

/**
 * Class SeminarPlaces
 * @package b5c\Javis\Model
 */
class SeminarPlaces extends ModelBase
{

    /**
     * @var int
     */
    protected $min;

    /**
     * @var int
     */
    protected $max;

    /**
     * @var int
     */
    protected $available;

    /**
     * @param SimpleXMLElement $element
     */
    public function import(SimpleXMLElement $element) {
        $this->min = (int) $element->min;
        $this->max = (int) $element->max;
        $this->available = (int) $element->available;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return SeminarPlaces
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return SeminarPlaces
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return int
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param int $available
     * @return SeminarPlaces
     */
    public function setAvailable($available)
    {
        $this->available = $available;
        return $this;
    }

}