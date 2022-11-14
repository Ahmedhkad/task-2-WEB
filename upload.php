<html>
<style> table, th, td { border: 1px solid black;} </style>      <!-- style of table -->

<body>
    <form method="POST" action="file-uploader.php" enctype="multipart/form-data">
        <div>
            <span>Upload file type .csv:</span>
            <input type="file" name="uploadedFile" />
            <input type="submit" name="uploadBtn" value="Upload" />
        </div>
    </form>

    <?php
    $filename = './upload/allowed_csv.csv';
    if (file_exists($filename)) {
        echo "File CSV data:";
        $row = 0;       //row to use it with file name
        if (($handle = fopen($filename, "r")) !== FALSE) { //load file .csv
            echo "<table> <tr> <th>File Name</th> <th>Containt</th> </tr>"; 
            while (($data = fgetcsv($handle, 1000, "r")) !== FALSE) {   //Get data inside
                $row++;
                foreach ($data as $key => $value) {        //extract value from data array
                    $pieces = explode(",", $value);        // split table's row by "," 
                    echo "<tr> <td>";
                    echo  $pieces[0];       // column 1 - file name
                    echo "</td> <td> <xmp>";
                    echo $pieces[1];        // column 2 - file containt
                    echo "</xmp> </td>";     //use <xmp> to avoid loading html

                    $filext = explode(".", $pieces[0]);         //get file extension from file name in column 1

                    $csvfile = fopen("./upload/$row.$filext[1]", "w") or die("Unable to open file!"); //Open for writing only
                    $fileContaints = "$pieces[1]";
                    fwrite($csvfile, $fileContaints);       //make file
                    fclose($csvfile);
                }
            }
            fclose($handle);
        }
    } else {
        echo "Please upload file .csv to show data";
    }