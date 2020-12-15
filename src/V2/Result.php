<?php

namespace PHPLegends\Api2Pdf\V2;

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

    public function has(string $key)
    {
        return isset($this->data[static::buildKey($key)]);
    }

    public function get(string $key)
    {
        return $this->data[static::buildKey($key)] ?? null;
    }

    protected static function buildKey($key)
    {
        return implode('', array_map('ucfirst', explode('_', $key)));
    }

    public function jsonSerialize()
    {
        return $this->data;
    }

    public function offsetSet($key, $value)
    {
        throw new \BadMethodCallException(__METHOD__ . ' is disabled');
    }

    public function offsetExists($key)
    {
        return $this->has($key);
    }

     public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetUnset($key)
    {
        throw new \BadMethodCallException(__METHOD__ . ' is disabled');
    }
}