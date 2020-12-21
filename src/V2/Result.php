<?php

namespace PHPLegends\Api2Pdf\V2;

use PHPLegends\Api2Pdf\V2\Exceptions\FileUrlNotFoundException;

/**
 * Represents the result of request
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Result implements \JsonSerializable, \ArrayAccess
{
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Check if key exists
     * 
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->data[static::buildKey($key)]);
    }

    /**
     * Get the value by key. Returns null if not exists
     * 
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->data[static::buildKey($key)] ?? null;
    }

    /**
     * Build the key for get value. Converts internally "key_name" to "KeyName", same as API
     * 
     * @param string
     * @return string
     */
    protected static function buildKey(string $key)
    {
        return implode('', array_map('ucfirst', explode('_', $key)));
    }

    /**
     * Data to be serialized by json_encode
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->data;
    }

    /**
     * @throws BadMethodCallException
     */
    public function offsetSet($key, $value)
    {
        throw new \BadMethodCallException(__METHOD__ . ' is disabled');
    }

    /**
     * Check if key exists, using \ArrayAccess interface
     * 
     * @param string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

     public function offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * @throws BadMethodCallException
     */
    public function offsetUnset($key)
    {
        throw new \BadMethodCallException(__METHOD__ . ' is disabled');
    }


    /**
     * Loads the output from "FileUrl"
     * 
     * @return string
     */
    public function getFileOutput(): string
    {
        if (! $this->has('FileUrl')) {
            throw new FileUrlNotFoundException('FileUrl not found in the result');
        }

        $response = (new \GuzzleHttp\Client)->get($this->get('FileUrl'));

        return (string) $response->getBody();
    }
}