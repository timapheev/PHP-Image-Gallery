# PHP Image Gallery
Этот проект представляет собой PHP-скрипт для вывода изображений в галерее с поддержкой миниатюр и полноразмерных изображений.

## Описание
Скрипт автоматически находит изображения в указанной папке и формирует галерею. Миниатюры (1.jpg, 2.jpg и т. д.) отображаются на странице, а при клике открывается соответствующее полноразмерное изображение (1-big.jpg, 2-big.jpg).

## Код (Фотографии по очереди)
```php
<?php
$directory = 'путь_к_папке_с_фото'; // Укажите путь к папке с изображениями
$files = glob($directory . '/*-big.jpg'); // Получаем все большие файлы JPG

// Функция для сортировки файлов по числовым названиям
usort($files, function ($a, $b) {
    return intval(pathinfo($a, PATHINFO_FILENAME)) - intval(pathinfo($b, PATHINFO_FILENAME));
});

// Выводим изображения
foreach ($files as $bigFile) {
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
```

## Код (Фотографии рандомные 9 шт)
```php
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
```

## Использование

Скопируйте файлы проекта в нужную директорию сервера.
В файле index.php укажите путь к папке с изображениями:

```php
$directory = 'путь_к_папке_с_фото';
```

Убедитесь, что в папке с изображениями содержатся файлы в формате:

`1.jpg` (миниатюра)
`1-big.jpg` (полноразмерное изображение)

Откройте страницу в браузере и наслаждайтесь галереей!

## Технологии
* PHP
* HTML/CSS
* JavaScript (для PrettyPhoto)

## Зависимости
Скрипт использует библиотеку PrettyPhoto для отображения полноразмерных изображений в модальном окне.

### 📜 Лицензия
Этот проект распространяется под лицензией MIT. Вы можете использовать и модифицировать код по своему усмотрению.

### ⚠️ Важно!
Данный репозиторий автора нужен только для того, чтобы хранить и делится полезными знаниями. Знаю, можно было сделать по-другом, проще, интереснее, безопаснее и т.д.
