<?php namespace MartinsBalodis\Validator;

use Illuminate\Support\Contracts\MessageProviderInterface;

abstract class Validator implements MessageProviderInterface {

	/**
	 * @var array
	 */
	protected $input;

	/**
	 * Validation rules used by the instance
	 * @var array
	 */
	protected $validationRules;

	/**
	 * @var \Illuminate\Support\MessageBag
	 */
	public $messages;

	/**
	 * @var array
	 */
	public static $rules;

	public function __construct($input) {
		$this->input = $input;
		$this->validationRules = static::$rules;
	}

	/**
	 * @return bool
	 */
	public function fails() {

		$validation = \Validator::make($this->input, $this->validationRules);

		if ($validation->fails()) {
			$this->messages = $validation->messages();
			return true;
		}

		return false;
	}

	/**
	 * @return \Illuminate\Support\MessageBag
	 */
	public function messages() {
		return $this->messages;
	}

	public function getMessageBag() {
		return $this->messages();
	}
}