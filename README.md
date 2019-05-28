<p align=center><img height=150 src="https://raw.githubusercontent.com/php-protein/docs/master/assets/protein-large.png"></p>

# Protein | Extensions
## Provides a way to extend static classes with new methods

### Install
---

```
composer require proteins/extensions
```

Include the trait in your classes via :

```php
use Proteins\Extensions;

class Test {
    use Extensions;
}
```

### Extend a class with new methods
---

```php
class Test {
  use Extensions;
  public static function foo(){ echo "Foo!"; }
}

Test::foo(); // Foo!
Test::bar(); // Fatal error: Call to undefined method Test::bar

Test::extend([
  'bar' => function(){ echo "Bar!"; },
]);

Test::bar();  // Bar!

```