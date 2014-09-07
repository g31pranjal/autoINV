
<?php


function getHeader($page) {
    
    if($page == 'archive')
        $stp = 2;
    else if($page == 'invform')
        $stp = 1;
    else if($page == 'statsCenter')
        $stp = 3;

    if ($stp >= 1 && $stp <= 5) {
        echo('
        <div id="topheader2" class="topheader2">
            <table class="submenu">
                <tr>
                    <td class="start" ><a style="color:white;text-decoration: none;"href="./index.php">invoiceCenter</a></td>
                    ');
        if ($stp == 1)
            echo('<td style="background:#00aff2" class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</a></td>
                ');
        else
            echo('<td class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</td>');
        if ($stp == 5)
            echo('<td style="background:#e0121d" class="s2 opt"><a style="color:white;text-decoration: none;"href="./adr_book.php">addressBook</a></td>');
        else
            echo('<td class="s2 opt"><a style="color:white;text-decoration: none;"href="./adr_book.php">addressBook</a></td>');
        if ($stp == 2)
            echo('<td style="background:#84c707" class="s3 opt"><a style="color:white;text-decoration: none;"href="./archive.php">archive</a></td>');
        else
            echo('<td class="s3 opt"><a style="color:white;text-decoration: none;"href="./archive.php">archive</a></td>');
        if ($stp == 3)
            echo('<td style="background:#F6B402" class="s4 opt"><a style="color:white;text-decoration: none;"href="./statsCenter.php">statsCenter</a></td>');
        else
            echo('<td class="s4 opt"><a style="color:white;text-decoration: none;"href="./statsCenter.php">statsCenter</a></td>');
        if ($stp == 4)
            echo('<td style="background:#92069d" class="s5 opt"><a style="color:white;text-decoration: none;"href="./queryCenter.php">queryCenter</a></td>');
        else
            echo('<td class="s5 opt"><a style="color:white;text-decoration: none;" href="./queryCenter.php">queryCenter</a></td>');

        echo ('</tr></table></div>');
    }
    if ($stp >= 6 && $stp <= 7) {
        echo('
    <div id="topheader2">
            <table class="submenu">
                <tr>
                    <td class="start" ><a style="color:white;text-decoration: none;"href="./index.php">letterCenter</a></td>
                    ');
        if ($stp == 'pad_editor')
            echo('<td style="background:#01B0EC" class="s1 opt"><a style="color:white;text-decoration: none;"href="./pad_editor.php">letterEditor</a></td>');
        else
            echo('<td class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</a></td>');
        if ($stp == 7)
            echo('<td style="background:#d54421" class="s2 opt"><a style="color:white;text-decoration: none;"href="./delInv.php">archive</a></td>');
        else
            echo('<td class="s2 opt"><a style="color:white;text-decoration: none;"href="./delInv.php">archive</a></td>');

        echo ('
            <td class="s3 opt"></td>
            <td class="s4 opt"></td>
            <td class="s5 opt"></td></tr></table></div>');
    }
}

?>