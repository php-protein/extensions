# Protein | Extensions
## Provides a way to extend static classes with new methods

### Install
---

```
composer require protein/extensions
```

Include the trait in your classes via :

```php
use Protein\Extensions;

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