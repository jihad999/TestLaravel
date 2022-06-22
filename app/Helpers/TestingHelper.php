<?php

namespace App\Helpers;

class TestingHelper{

    private $foo;

    public function __construct($foo){
        $this->foo = $foo;
    }

    public function foo()
    {
        $testFoo = app(TestingHelper::class);
        return $testFoo->foo;

    }

    public function bar()
    {
        return app(TestingHelper::class)->foo();
    }

    public function setFoo($foo)
    {
        $testFoo = app(TestingHelper::class);
        $testFoo->foo = $foo;
    }

}
