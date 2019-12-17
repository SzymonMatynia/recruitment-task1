<?php
declare(strict_types=1);

namespace DealerGroup\Model\Exception;

class InvalidItemQuantityException extends \LogicException
{
    /**
     * InvalidItemQuantityException constructor.
     * @param null $message
     * @param int $code
     * @param \LogicException|null $previous
     */
    public function __construct($message = null, $code = 0, \LogicException $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
