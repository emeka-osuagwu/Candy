# Candy
[![Build Status](https://travis-ci.org/andela-eosuagwu/Candy.svg)](https://travis-ci.org/andela-eosuagwu/Candy)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/?branch=master)


#### Candy is lightweight ORM based in php


#Testing
 The phpunit framework for testing is used to perform
 unit test on the classes. The TDD principle has been
 employed to make the application robust

 Run this on bash to execute the tests
 ```````bash
 /vendor/bin/phpunit
`````````

#Install

- To install this package, PHP 5.5+ and Composer are required

````bash
composer require emeka/candy
``````

#Usage

- Save a model in the database

````````
$user = new User();
$user->username = "john";
$user->password = "password";
$user->email = "john@doe.co";
$user->save();
`````````
- Find a model

``````
$user = User::find($id);
``````
- Update a record

``````
$user = User::find($id);
$user->password = "s†røngerPaSswoRd";
$user->save();
``````
- Delete a record -- returns a boolean

````````
$result = User::destroy($id):
````````


## Change log
Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Contributing
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits
Candy is maintained by `Emeka Osuagwu`.

## License
Urban dictionary is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for more details.


