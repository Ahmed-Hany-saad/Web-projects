<?php
    
    class AzkarController
    {
        private $model;
        private $view;
    
        public function __construct(AzkarModel $model, AzkarView $view)
        {
            $this->model = $model;
            $this->view = $view;
        }
    
        public function handleRequest()
        {
            // Check if the user has selected a category
            if (isset($_GET['category'])) {
                // Get the selected category
                $selected_category = $_GET['category'];
    
                // Check if the user has clicked on the next or previous button
                $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    
                // Prepare a SELECT query to fetch all rows for the selected category with limit and offset
                $azkar = $this->model->getAzkarByCategory($selected_category, $start, 1);
    
                // Check if there are more zekr available for the selected category
                $count = $this->model->getCount($selected_category, $azkar[0]['id']);
    
                $this->view->renderAzkar($azkar, $selected_category, $start, $count);
            } else {
                // Display the categories grid
                $categories = $this->model->getCategories();
                $this->view->renderCategories($categories);
            }
        }
    }
    