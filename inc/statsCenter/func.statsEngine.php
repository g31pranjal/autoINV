<?php

require '../connect.php';

class statsEngine {

    function statsEngine($mysql) {
        
    }

    function t1() {
        $row_s = mysql_query("SELECT * FROM invoice_aggregate WHERE `type` = 'SALE INVOICE' ORDER BY sn DESC");
        while ($result_s = mysql_fetch_array($row_s)) {
            $total_cst += $result_s['cstamt'];
            if ($result_s['tarnd'] != null)
                $total_amount_sal += $result_s['tarnd'];
            else
                $total_amount_sal += $result_s['ta'];
            $gross_amount_sal += $result_s['gt'];
        }
        $row_t = mysql_query("SELECT * FROM invoice_aggregate WHERE `type` = 'TAX INVOICE' ORDER BY sn DESC");
        while ($result_t = mysql_fetch_array($row_t)) {
            $total_vat += $result_t['vatamt'];
            $total_sat += $result_t['satamt'];
            if ($result_s['tarnd'] != null)
                $total_amount_tax += $result_t['tarnd'];
            else
                $total_amount_tax += $result_t['ta'];
            $gross_amount_tax += $result_t['gt'];
        }
        return (array(round_number_format($gross_amount_sal), round_number_format($total_cst), round_number_format($total_amount_sal), round_number_format($gross_amount_tax), round_number_format($total_sat + $total_vat), round_number_format($total_amount_tax), round_number_format($total_amount_sal + $total_amount_tax)));
    }

    function t2() {
        $result_last = mysql_fetch_array(mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn DESC LIMIT 1"));

        $hg['0'] = $result_last['ta'];
        $hg['1'] = $result_last['inv'];
        $hg['2'] = $result_last['invdate'];
        $hg['3'] = $result_last['party_name'];

        $lg['0'] = $result_last['ta'];
        $lg['1'] = $result_last['inv'];
        $lg['2'] = $result_last['invdate'];
        $lg['3'] = $result_last['party_name'];

        $row = mysql_query("SELECT * FROM `invoice_aggregate` ORDER BY sn DESC");
        while ($result = mysql_fetch_array($row)) {
            if ($result['ta'] >= $hg['0']) {
                $hg['0'] = $result['ta'];
                $hg['1'] = $result['inv'];
                $hg['2'] = $result['invdate'];
                $hg['3'] = $result['party_name'];
            }
            if ($result['ta'] <= $lg['0']) {
                $lg['0'] = $result['ta'];
                $lg['1'] = $result['inv'];
                $lg['2'] = $result['invdate'];
                $lg['3'] = $result['party_name'];
            }
        }
        return (array($hg[0], $hg[1], $hg[2], $hg[3], $lg[0], $lg[1], $lg[2], $lg[3]));
    }

    function t3() {
        $count_s = 0;
        $count_t = 0;
        $row_s = mysql_query("SELECT * FROM invoice_aggregate WHERE `type` = 'SALE INVOICE' ORDER BY sn DESC");
        while ($result_s = mysql_fetch_array($row_s))
            $count_s++;
        $row_t = mysql_query("SELECT * FROM invoice_aggregate WHERE `type` = 'TAX INVOICE' ORDER BY sn DESC");
        while ($result_t = mysql_fetch_array($row_t))
            $count_t++;
        return (array($count_s, $count_t, $count_s + $count_t));
    }

    function t4() {
        $row_s = mysql_fetch_array(mysql_query("SELECT * FROM div_month ORDER BY gt DESC LIMIT 1"));
        return (array($row_s[name], $row_s[fy], $row_s[gt], $row_s[total_s_inv], $row_s[total_t_inv]));
    }

}

?>
