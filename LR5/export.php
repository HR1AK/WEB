<?php
    require_once "export_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleweb.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="exportpolebody">
            <div>
                <Label>Формат экспорта в виде csv-файла относительно внешнего скрипта</Label>
            </div>
            <input name="exportpole" value="text2.csv" placeholder="lb5/upload/export.csv" width="370px">
            <div class="butten_type">
                <button name="import" class="export_butten" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
    <span><?php if (isset($res)) echo $res;?></span>
</body>
</html>