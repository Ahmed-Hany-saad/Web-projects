
    <div class="container" style="text-align:right; direction:rtl">
        <?php if ($surahList) { ?>
        <h2>Quran Surah List</h2><br>
        <div class='list-group'>
            <?php foreach($surahList as $surah) { ?>
            <a href='?surah=<?php echo $surah->number ?>' class='list-group-item list-group-item-action'>
                <?php echo $surah->name ?>
            </a><br>
            <?php } ?>
        </div>
        <?php } elseif ($surah) { ?>
        <h1><?php echo $surah->name ?></h1><br>
        <div class='list-group'>
            <?php foreach($surah->ayahs as $ayah) { ?>
            <a href='#' class='list-group-item list-group-item-action '>
                <strong><?php echo $ayah->numberInSurah ?></strong> <?php echo $ayah->text ?>
            </a>
            <?php } ?>
        </div>
        <?php 
    } ?>
    </div>
