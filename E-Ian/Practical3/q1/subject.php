<?php
    //Source: https://refactoring.guru/design-patterns/observer/php/example

    class Subject
    {
        private $observers;

        public function attach($observer): void
        {
            $this->observers[] = $observer;
        }

        public function detach($observer): void
        {
            //Credit: https://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
            foreach (array_keys($this->observers, $observer, true) as $key) {
                unset($this->observers[$key]);
            }
        }

        public function notify(): void
        {
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }