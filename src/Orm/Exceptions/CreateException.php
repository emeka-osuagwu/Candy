<?php

namespace Emeka\Base\Exceptions;

use Exception;

class ModelNotFoundException extends Exception
{
	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @param string $message
	 */
	public function __construct($message)
	{
		$this->message = $message;
	}

	/**
	 * @method getExceptionMessage
	 *
	 * returns an error message to the calling
	 * method.
	 *
	 * usage $e->getExceptionMessage();
	 *
	 * @return string
	 */
	public function getExceptionMessage()
	{
		return $this->message;
	}
} 