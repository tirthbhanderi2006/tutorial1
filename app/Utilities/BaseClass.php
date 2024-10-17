    <?php

    namespace App\Utilities;

    class BaseClass
    {
        protected $name;

        // Constructor to initialize name
        public function __construct($name)
        {
            $this->name = $name;
        }

        // A method that returns the name
        public function getName()
        {
            return "Base Class Name: " . $this->name;
        }

        // A method that can be overridden in the child class
        public function displayMessage()
        {
            return "Message from the Base Class.";
        }
    }
