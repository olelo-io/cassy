<?php

namespace Olelo\Cassy;

use Olelo\Cassy\Exceptions\CassyException;

class Cassy
{
    protected $urlPrefix;

    protected $defaultUrlPrefix = 'https://cdn.cassy.olelo.io';

    public function __construct($urlPrefix = null)
    {
        if(is_null($urlPrefix)) {
            $urlPrefix = $this->defaultUrlPrefix;
        }

        if(!$this->isValidUrl($urlPrefix)) {
            throw new CassyException('"' . $urlPrefix . '" is not a valid CDN URL.');
        }

        if($this->stringEndsWith($urlPrefix, '/')) {
            throw new CassyException('"' . $urlPrefix . '" must not have a trailing "/".');
        }

        $this->urlPrefix = $urlPrefix;
    }

    /**
     * @param $url
     * @param null $quality
     * @return string
     * @throws CassyException
     */
    public function getCdnUrl($url, $quality = null)
    {
        if(!$this->isValidUrl($url)) {
            throw new CassyException('"' . $url . '" is not a valid URL.');
        }

        $quality = $quality ? '?quality='.$quality : '';

        return $this->urlPrefix .'/'.urlencode($url).$quality;
    }

    /**
     * @param $url
     * @param null $quality
     * @return string
     * @throws CassyException
     */
    public function cdn($url, $quality = null)
    {
        return $this->getCdnUrl($url, $quality);
    }

    /**
     * Determine if the given path is a valid URL.
     *
     * @param  string  $path
     * @return bool
     */
    public function isValidUrl($path)
    {
        if (! preg_match('~^(#|//|https?://|mailto:|tel:)~', $path)) {
            return filter_var($path, FILTER_VALIDATE_URL) !== false;
        }

        return true;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    public function stringEndsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if (substr($haystack, -strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }
}