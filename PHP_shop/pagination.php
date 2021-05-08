<?php

$sql_count_pages = "SELECT COUNT(`$label_id`) FROM `$stock` WHERE $filter";
if(!mysqli_stmt_prepare($stmt, $sql_count_pages)){
    echo "Problem with sql_count_pages in periphery_stock.php"; 
    exit;
} else {
    mysqli_stmt_execute($stmt);
    $num_stock = mysqli_stmt_get_result($stmt);
    echo"<div class = 'pagination_container'><a class = 'left_border'></a>";
        while($row = mysqli_fetch_assoc($num_stock)){

            if (mysqli_num_rows($result) !== 0) { 
                $count_stock = $row["COUNT(`$label_id`)"];
            $lastPage = ceil($count_stock / $stock_on_page);
            $firstpage = 1;

                for($p = 1; $p <= $lastPage; $p++){
                    $remove_page = str_replace("&page=".$page_num, "&page=$p", $url);
                    if($page_num == $p){
                        echo "<a class = 'page_btn_pressed'  href=".$remove_page." >$p</a>";  
                    } else {
                        echo "<a class = 'page_btn'  href=".$remove_page." >$p</a>";
                    }  
                }
            }
        }
    echo"</div>";
}