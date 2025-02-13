<?php

    //normal class & object
    echo "<h2>Normal class and objects</h2>";

    class Fruit {
        
        // properties
        public $name;
        public $color;

        function set($name, $color)
        {
            $this->name = $name;
            $this->color = $color;
        }

        function prinData()
        {
            echo "name = $this->name color = $this->color";
        }
    }
    $obj = new Fruit();
    $obj->set("apple", "red");
    $obj->prinData();

     // access modifiers with inheritance

    echo "<h2>inheritance</h2>";

    class A {
        
        protected function a_Method()
        {
            echo "Class A method <br>";
        }
    }
    class B extends A {
        function b_method()
        {
            echo "Class B method <br>";
            $this->a_Method();
        }
    }
    class C extends B {
        function c_method()
        {
            echo "Class C method";
        }
    }
    
    // $checkObj = new C();
    $checkObj1 = new B();
    $checkObj1->b_Method();

    //abstraction
    echo "<h2>Abstraction</h2>";

    abstract class Demo {
        abstract public function name();
    }
    class Staff extends Demo {

        public function name()
        {
            echo "Staff class <br>";
        }
    }
    class Hr extends Demo {
        public function name()
        {
            echo "Hr class";
        }
    }

    $staff = new Staff();
    $staff->name();
    // hr class
    $hr = new Hr();
    $hr->name();

    //interface
    echo "<h2>Interface</h2>";

    interface Demo1 {
        public function count($num);
    }
    class SubClass implements Demo1 {

        function count($num)
        {
            for ($i=1; $i<=$num; $i++)
            {
                echo "$i ";
            }
        }
    }
    $object = new SubClass();
    $object->count(10);

    // Trait
    echo "<h2>Trait</h2>";

    trait A1 {
        function show()
        {
            echo "A1 Trait <br>";
        }
    }
    trait A2 {
        function show()
        {
            echo "A2 Trait <br>";
        }
    }
    class A3 {
        use A1,A2 {
            A1::show insteadOf A2;
        }
    }
    $a3 = new A3();
    $a3->show();

    // static 
    echo "<h2>Static</h2>";

    class Counter {

        static $cnt = 0;

        public static function count_num()
        {
            self::$cnt++;
        }
        public static function get()
        {
            return self::$cnt;
        }
    }
   
    echo Counter::$cnt . "<br>";
    Counter::count_num();
    Counter::count_num();
    echo "after 2 increment : " . Counter::get();

    
    // constructor

    echo "<h2>Constructor & Destructor</h2>";
    class Person {

        public $fName;
        public $lName;
        
        function __construct($firstName, $lastName)
        {   
            $this->fName = $firstName;
            $this->lName = $lastName;
        }

        function __destruct()
        {
            echo "first name : $this->fName <br> last name : $this->lName";
        }
    }
    $person1 = new Person("Sagar", "Vyas");

   
    

?>  