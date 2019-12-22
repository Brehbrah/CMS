<?php 
    // This is our base controller. This will be easily loading our model from our other controllers. 
    // The controller create will extend this class/libraries
    // Every controller we are going to include for example page.php will be extended on the controller.php
    // This will include the method to load the model, load the view.

    /**
     * Base Controller 
     * Loads the models and views
     */

    class Controller {
        // Load model - This is going to be our page controller if we want to load for example page.php
        public function model($model) {
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instantiate the model - This will return for example new Posts();
            return new $model();
        }

        // Load view - Here we can add something like /add/post/1
        // The array will be passed in dynamically hardcoded, or from the database whatever.
        public function view($view, $data = []) {  // Array will be optional if we want to pass the data on the view
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                // View does not exist
                die('View does not exist'); // die() function will just stop the application
            }
        }

    }

?>