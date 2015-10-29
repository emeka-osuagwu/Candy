# Candy
[![Build Status](https://travis-ci.org/andela-eosuagwu/Candy.svg)](https://travis-ci.org/andela-eosuagwu/Candy)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/?branch=master)


#### Candy is a lightweight ORM built with php


#Testing
 The phpunit framework for testing is used to perform
 unit test on the classes. The TDD principle has been
 employed to make the application robust

 Run this on bash to execute the tests
 
```bash
 /vendor/bin/phpunit
```

#Install

- To install this package, PHP 5.5+ and Composer are required

```bash
composer require emeka/candy
```

#Basic CRUD Operations
All querie requires a Mapper instance. Mappers are responsible for finding and updating or delete individual entities.

##Queries With Candy

#all()
- Finds and return all entities from a field in the database.

```
$users = User::all();
echo $users;
```

#find($id)
- Finds and return single entity from the database.

```
$users = User::find($id);
echo $users;
```


#where($value, $field)
Find all entities that match the given conditions and return records from the database.

```
$value = "username"
$field = "user's table"

$user = User::where($value, $field)
```

- Save a model in the database

```php
$user = new User::all();
$user->username = "john";
$user->password = "password";
$user->email = "john@doe.co";
$user->save();
```
- Get  

```php
$user = User::find($id);
```
- Update a record

```php
$user = User::find($id);
$user->password = "s†røngerPaSswoRd";
$user->save();
```
- Delete a record -- returns a boolean

```php
$result = User::destroy($id):
```


## Change log
Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Contributing
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits
Candy is maintained by `Emeka Osuagwu`.

## License
Urban dictionary is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for more details.


