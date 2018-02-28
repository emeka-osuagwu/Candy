# Candy
[![Build Status](https://travis-ci.org/andela-eosuagwu/Candy.svg)](https://travis-ci.org/andela-eosuagwu/Candy)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-eosuagwu/Candy/?branch=master)
[![Open Source Helpers](https://www.codetriage.com/emeka-osuagwu/candy/badges/users.svg)](https://www.codetriage.com/emeka-osuagwu/candy)


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

```php
$users = User::all();
echo $users;
```

#find($id)
- Finds and return single entity from the database.

```php
$users = User::find($id);
echo $users;
```


#where($value, $field)
Find all entities that match the given conditions and return records from the database.

```php
$value = "username"
$field = "user's table"

echo $user = User::where($value, $field)
```

#Save
- The save method is a convenience method that handles both inserting and updating an entity object. Save will call either insert or update, depending on whether the Entity has as an `ID` property `isset`.

####Insert

```php
$user = new User;
$user->email     = "john@doe.co";
$user->username  = "john";
$user->password  = "password";
//without the ID property the Save method will insert a new record in to  the database 
$user::save();
```

####Update
```php
$user = new User;
$user->id        = 1;
$user->email     = "new_john@doe.co";
$user->username  = "new_john";
$user->password  = "new_password";
//with the ID property the Save method will update the USERS table where ID = 1. 
$user::save();
```

#Delete
- Delete a from the database.

```php
$user = User::destroy($id):
$user returns a boolean
```

## Change log
Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Contributing
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits
Candy is maintained by `Emeka Osuagwu`.

## License
Urban dictionary is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for more details.


