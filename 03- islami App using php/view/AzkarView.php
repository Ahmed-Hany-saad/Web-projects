<?php include_once "header.php" ?>
<?php if (!isset($_SESSION['person'])) {
    header('Location: login.php');
} ?>


<?php
class AzkarView
{
    public function renderCategories($categories)
    {
        echo "<div class='grid' style='margin-top: 246px;'>";
        foreach ($categories as $category) {
            echo "<div  class='category' onclick='window.location.href=\"Azkar.php?category=$category\"'>";
            echo "<h2>$category</h2>";
            echo "</div>";
        }
        echo "</div>";
    }

    public function renderAzkar($azkar, $selected_category, $start, $count)
    {
        if (count($azkar) == 0) {
            echo "<p>No azkar found for $selected_category</p>";
        } else {
            echo "<div class='slider zekr'>";
            foreach ($azkar as $row) {
                echo "<div>";
                echo "<h2 class='zekr__title'>{$row['category']}</h2>";
                echo "<p class='zekr__content'>{$row['zekr']}</p>";
                echo "</div>";
            }

            echo "<button class='zekr__button' onclick='window.location.href=\"Azkar.php?category=$selected_category&start=" . ($start - 1) . "\"'" . ($start == 0 ? "disabled" : "") . ">Previous</button>";
            echo "<button class='zekr__button' onclick='window.location.href=\"Azkar.php?category=$selected_category&start=" . ($start + 1) . "\"'" . ($count == 0 ? "disabled" : "") . ">Next</button>";
            echo "</div>";
        }

        echo "<button class='menu-button' onclick='window.location.href=\"Azkar.php\"'>Menu</button>";
    }
}
