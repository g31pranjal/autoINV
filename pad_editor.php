<?php
require('resource.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pad Editor : Automated Invoicing</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="./assets/css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="Shortcut Icon" href="./rel_files/favicon.png" type="image/x-icon" />
        <script src="./assets/js/jquery.js"></script>
        <script type="text/javascript" src="./assets/plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="./assets/plugins/ckeditor/adapters/jquery.js"></script>
    </head>
    <body>
        <?php print_top('6'); ?>
        <div id="body">
            <form method="post" action="pad_veiw.php">
                <div id="editor" style="width: 85%;float:left;">
                    <textarea id="editor1" name="editor1">Begin with the matter ... </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'editor1',
                        {
                            extraPlugins : 'tableresize'
                        });
                    </script>
                </div>
                <div id="editor" style="width: 14%;float:right;margin-left: 1%;">
                    <a class="lnk ed_side_bt arch" href="./letter_archive.php">archive</a>
                    <a class="lnk ed_side_bt refresh" href="./pad_editor.php">refresh</a>
                    <div id="file_info" >
                        Reference ID :<br><input class="pad_inf" name="ref" id="ref" type="text"><br>
                        Date :<br><input class="pad_inf" name="date" id="date" type="text">
                    </div>
                    <input class="lnk create_box" value="Create" style="margin-left: 5px;width: 120px;height: 80px;" type="submit" />
                </div>
                
            </form>
        </div>
    </body>
</html>