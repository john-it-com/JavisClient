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

    /**
     * @param $tag
     * @return array
     */
    public function getSeminarsByTag($tag) {
        $result = array();
        $seminars = $this->getSeminars();
        foreach($seminars as $seminar) {
            /**
             * @var Seminar $seminar
             */
            $tags = $seminar->getTags();
            if($tags !== null && in_array($tag, $tags)) {
                $result[] = $seminar;
            }
        }
        return $result;
    }

    /**
     * @param $path
     * @param array $parameters
     * @param int $method
     * @return SimpleXMLElement
     * @throws APIException
     */
    public function getRawData($path, $parameters=array(), $method=APIAccessor::HTTP_GET) {
        return $this->APIAccessor->request($path, $parameters, $method);
    }

}
