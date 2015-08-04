<?php

namespace b5c\Javis;
use b5c\Javis\Model\Seminar;
use SimpleXMLElement;

/**
 * Class Client
 * @package b5c\Javis
 */
class Client
{

    /**
     * @var APIAccessor
     */
    protected $javisAPIAccessor;

    /**
     * JavisAPIClient constructor.
     * @param string $endPointName
     */
    public function __construct($endPointName)
    {
        $this->javisAPIAccessor = new APIAccessor($endPointName);
    }

    /**
     * @return array
     */
    public function getSeminars()
    {
        $result = array();

        try {
            $xml = $this->javisAPIAccessor->request('seminar');
        } catch (\Exception $e) {
            return $result;
        }

        $seminars = $xml->xpath('seminars/seminar');
        if($seminars instanceof SimpleXMLElement) {
            $result[] = new Seminar($seminars);
        } else {
            foreach($seminars as $seminar) {
                $result[] = new Seminar($seminar);
            }
        }

        return $result;
    }

}
