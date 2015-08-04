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
     * Javis Client version.
     */
    const VERSION_CLIENT = 1;

    /**
     * @var APIAccessor
     */
    protected $APIAccessor;

    /**
     * JavisAPIClient constructor.
     * @param string $endPointName
     */
    public function __construct($endPointName)
    {
        $this->APIAccessor = new APIAccessor($endPointName);
    }

    /**
     * @return array
     */
    public function getSeminars()
    {
        $result = array();

        try {
            $xml = $this->APIAccessor->request('seminar');
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

    public function getRawData($path, $parameters=array(), $method=APIAccessor::HTTP_GET) {
        return $this->APIAccessor->request($path, $parameters, $method);
    }

}
