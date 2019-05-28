<?php declare(strict_types=1);

/**
 * Extensions trait
 *
 * Provides a way to extend static classes with new methods.
 *
 * @package Protein
 * @author  "Stefano Azzolini"  <lastguest@gmail.com>
 */

namespace Protein;

trait Extensions {
    protected static $__EXTENSIONS = [];

    final public function __call($name, $args) {
        if (isset(static::$__EXTENSIONS[$name]) && static::$__EXTENSIONS[$name] instanceof \Closure) {
            return call_user_func_array(static::$__EXTENSIONS[$name]->bindTo($this, $this), $args);
        } else {
            throw new \BadMethodCallException;
        }
    }

    final public static function __callStatic($name, $args) {
        if (isset(static::$__EXTENSIONS[$name]) && static::$__EXTENSIONS[$name] instanceof \Closure) {
            return forward_static_call_array(static::$__EXTENSIONS[$name], $args);
        } else {
            throw new \BadMethodCallException;
        }
    }

    public static function extend($methods = []) {
        if ($methods) {
            foreach ($methods as $name => $method) {
                if ($method && $method instanceof \Closure) {
                    static::$__EXTENSIONS[$name] = $method;
                } else {
                    throw new \BadMethodCallException;
                }
            }
        }
    }
}
