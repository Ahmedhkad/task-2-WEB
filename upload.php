<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <form method="POST" action="file-uploader.php" enctype="multipart/form-data">
        <div>
            <span>Upload File "Example.csv":</span>
            <input type="file" name="uploadedFile" />
        </div>

        <input type="submit" name="uploadBtn" value="Upload" />
    </form>

    <?php

    $filename = './upload/Example.csv';
    if (file_exists($filename)) {
        echo "File Example.csv data:";
        $row = 0;       //row to use it with file name
        if (($handle = fopen("./upload/Example.csv", "r")) !== FALSE) { //load file .csv
            echo "<table> <tr> <th>File Name</th> <th>Containt</th> </tr>"; 
            while (($data = fgetcsv($handle, 1000, "r")) !== FALSE) {   //Get data inside
                $row++;
                foreach ($data as $key => $value) {        //extract value from data array
                    $pieces = explode(";", $value);        // split table's row by ";" 
                    echo "<tr> <td>";
                    echo  $pieces[0];       // colume 1 - file name
                    echo "</td> <td> <xmp>";
                    echo $pieces[1];        // colume 2 - file containt
                    echo "</xmp> </td>";     //use <xmp> to avoid loading html

                    $filext = explode(".", $pieces[0]);

                    $csvfile = fopen("./upload/$row.$filext[1]", "w") or die("Unable to open file!"); //Open for writing only
                    $fileContaints = "$pieces[1]";
                    fwrite($csvfile, $fileContaints);       //make file
                    fclose($csvfile);
                }
            }
            fclose($handle);
        }
    } else {
        echo "The file Example.csv does not exist";
    }