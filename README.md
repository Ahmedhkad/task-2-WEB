# 2. Веб
Создать PHP-страницу upload.php с формой загрузки CSV-файла
В CSV-файле должны быть 2 столбца: название файла, содержимое
Рядом с файлом upload.php требуется создать папку /upload/ и создать в ней файлы, прочитав CSV-файл.
Какие дыры это может создать? Как бороться?
Ограничений на функции и возможности PHP нет.

# Bugs
1. empty row in csv cause problem 
```
fopen(./upload/3.): failed to open stream: Permission denied in D:\Interview-Tasks\task-2-WEB\upload.php on line 32
```
2. This code work with 2 column in row only , 3rd column will ignored without error.
3. File extension could be danger like .bat .exe .com .cmd etc no filter until now .
4. First column should containt extenstion file or "." else error happen:
```
Notice: Undefined offset: 1 in D:\InterVolga-tasks\task-2-WEB\upload.php on line 32
```
