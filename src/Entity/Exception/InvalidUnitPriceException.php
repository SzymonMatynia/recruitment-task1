<?php


namespace DealerGroup\Entity\Exception;

class InvalidUnitPriceException extends \LogicException
{

    /**
     * InvalidUnitPriceException constructor.
     * @param null $message
     * @param int $code
     * @param \LogicException|null $previous
     */
    public function __construct($message = null, $code = 0, \LogicException $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
