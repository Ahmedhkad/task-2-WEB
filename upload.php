<?php
// Создать PHP-страницу upload.php с формой загрузки CSV-файла
// В CSV-файле должны быть 2 столбца: название файла, содержимое
// Рядом с файлом upload.php требуется создать папку /upload/ и создать в ней файлы, прочитав CSV-файл.
// Какие дыры это может создать? Как бороться?
// Ограничений на функции и возможности PHP нет.

// Пример файла CSV:
// aaa.txt,Привет
// bbb.log,Тест
// ccc.html,Заголовок

// При загрузке такого файла должны быть созданы /upload/1.txt, /upload/2.log, /upload/3.html (с соответствующим содержимым)
 
$row = 1;
if (($handle = fopen("Example.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}
