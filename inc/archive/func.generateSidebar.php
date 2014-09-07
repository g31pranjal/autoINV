<?php

class generateSidebar {

    function generateSidebar($a, $b) {
        $this->yr = $a;
        $this->q = $b;
    }

    function popullate_sidebar() {
        $a = $this->segregateFY();
        foreach ($a as $key => $value) {
            echo('<div class="t3">' . $value . '<br></div>'
                    . '<div class="t2 ');
            if ($this->yr == (substr($value, 5, 2) . substr($value, 12, 2)) && $this->q == 'SAL')
                echo('t2active');
            echo('" id="archButton' . substr($value, 5, 2) . substr($value, 12, 2) . 'SAL">Sales Invoice<br></div>');
            echo('<div class="t2 ');
            if ($this->yr == (substr($value, 5, 2) . substr($value, 12, 2)) && $this->q == 'TAX')
                echo('t2active');
            echo('" id="archButton' . substr($value, 5, 2) . substr($value, 12, 2) . 'TAX">Tax Invoice<br></div>');
        }
    }

    function segregateFY() {
        $r = mysql_query("SELECT * FROM invoice_aggregate ORDER BY mntID DESC");
        $mark2 = 0;
        while ($result = mysql_fetch_array($r)) {
            if ($hold1 == $result[mntID])
                continue;
            else {
                $hold1 = $result[mntID];
                $month = (0 + substr($hold1, 2));
                if ($month <= 3)
                    $fy = 'FY 20' . (substr($hold1, 0, 2) - 1) . ' - 20' . substr($hold1, 0, 2);
                else
                    $fy = 'FY 20' . (substr($hold1, 0, 2)) . ' - 20' . (substr($hold1, 0, 2) + 1);

                if (strcmp($hold2, $fy) == 0)
                    continue;
                else {
                    $uniquefy[$mark2] = $fy;
                    $mark2++;
                    $hold2 = $fy;
                }
            }
        }
        return $uniquefy;
    }

}

?>
