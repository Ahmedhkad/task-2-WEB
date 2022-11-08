<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>

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

    if (($handle = fopen("./upload/Example.csv", "r")) !== FALSE) { //load file .csv
        echo "<table>\n  <tr>           
        <th>File Name</th>\n
        <th>Containt</th>\n
      </tr>";
        while (($data = fgetcsv($handle, 1000, "r")) !== FALSE) {   //Get data inside
            foreach ($data as $key => $value) {        //extract value from data array
                $pieces = explode(";", $value);        // split table row by ";" 
                echo "<tr> \n  <td>";
                echo  $pieces[0];       // colume 1 - file name
                echo "</td> \n <td>";
                echo $pieces[1];        // colume 2 - file containt
                echo "</td> \n";
            }
        }
        fclose($handle);
    }
