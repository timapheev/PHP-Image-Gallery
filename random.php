<?php
$directory = 'путь_к_папке_с_фото'; // Укажите путь к папке с изображениями
$files = glob($directory . '/*-big.jpg'); // Получаем все большие файлы JPG

// Функция для сортировки файлов по числовым названиям
usort($files, function ($a, $b) {
    return intval(pathinfo($a, PATHINFO_FILENAME)) - intval(pathinfo($b, PATHINFO_FILENAME));
});

// Выбираем 9 случайных файлов
$randomFiles = array_rand($files, 9);

// Выводим изображения
foreach ($randomFiles as $index) {
    $bigFile = $files[$index];
    $thumbnail = str_replace('-big.jpg', '.jpg', $bigFile);
    echo '<div class="featured-imagebox featured-imagebox-team ttm-team-box-view-overlay box-shadow1">
            <div class="featured-thumbnail">
                <img class="img-fluid" src="' . $thumbnail . '" alt="' . basename($thumbnail) . '" loading="lazy">
            </div>
            <div class="ttm-box-view-overlay">
                <div class="featured-iconbox ttm-media-link">
                    <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="Pilates Exercises" href="' . $bigFile . '" data-rel="prettyPhoto">
                        <i class="ti ti-search"></i>
                    </a>
                </div>
            </div>
        </div>';
}
?>
