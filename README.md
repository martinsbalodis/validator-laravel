## Usage

```php
<?php
namespace App\Lib\Validators;

class MyValidator extends Validator {

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
	);
}

$input = array(
    'title' => 'asd',
    'description' => 'dsa',
);
$validator = new MyValidator($input);
if(!$validator->fails()) {
    // passes
}
else {
    $validator->messages();
}
```