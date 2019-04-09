<?php

    class Luna_Master_List {

        public function task_states() {
            return [
                ["label" => "Open", "key" => "10"],
                ["label" => "In Progress", "key" => "20"],
                ["label" => "Closed", "key" => "90"]
            ];
        }

        public function task_priorities() {
            return [
                ["label" => "1", "key" => "1"],
                ["label" => "2", "key" => "2"],
                ["label" => "3", "key" => "3"],
                ["label" => "4", "key" => "4"]
            ];
        }

    }

?>