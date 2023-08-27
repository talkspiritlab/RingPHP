<?php
namespace GuzzleHttp\Ring\Future;

/**
 * Represents a future array that has been completed successfully.
 */
class CompletedFutureArray extends CompletedFutureValue implements FutureArrayInterface
{
    public function __construct(array $result)
    {
        parent::__construct($result);
    }

    public function offsetExists($offset) : bool
    {
        return isset($this->result[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->result[$offset];
    }

    public function offsetSet($offset, $value) : void
    {
        $this->result[$offset] = $value;
    }

    public function offsetUnset($offset) : void
    {
        unset($this->result[$offset]);
    }

    public function count() : int 
    {
        return count($this->result);
    }

    public function getIterator() : \Iterator
    {
        return new \ArrayIterator($this->result);
    }
}
