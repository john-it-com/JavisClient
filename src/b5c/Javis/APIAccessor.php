<?php

namespace b5c\Javis;

/**
 * Main Class of the Javis API.
 * Class JavisAPI
 * @package b5c\Javis
 */
class APIAccessor
{

    /**
     * Javis API version.
     */
    const VERSION_API = 1;

    /**
     * Javis API version.
     */
    const HTTP_GET = 0;

    /**
     * Javis API version.
     */
    const HTTP_POST = 1;

    /**
     * Name of the Javis instance. With this url http://example.javis.de you only have to enter 'example'.
     * @var string
     */
    protected $endPointName;

    /**
     * cURL instance.
     * @var resource
     */
    protected $curl;

    /**
     * @param $endPointName string Name of the Javis instance
     */
    public function __construct($endPointName) {
        $this->endPointName = $endPointName;
        $this->curl = curl_init();
    }

    /**
     * Returns API url with trailing slash.
     * @return string
     */
    protected function getAPIUrl() {
        return 'https://'.$this->endPointName.'.javis.de/api/v'.self::VERSION_API.'/';
    }

    protected function getUserAgent() {
        return 'Javis API Library v'.Client::VERSION_CLIENT;
    }

    /**
     * @param $path
     * @param array $parameters
     * @param int $method
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public function request($path, $parameters=array(), $method=self::HTTP_GET) {

        $url = $this->getAPIUrl().$path;

        curl_setopt_array($this->curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => $this->getUserAgent(),
            CURLOPT_POST => $method,
            CURLOPT_POSTFIELDS => $parameters
        ));


        $response = curl_exec($this->curl);

        if($response === false) {
            throw new APIException('Error: "' . curl_error($this->curl).'"');
        }

        $xml = simplexml_load_string($response);

        return $xml;
    }

    /**
     * Closes cURL instance.
     */
    function __destruct() {
        curl_close($this->curl);
    }

}