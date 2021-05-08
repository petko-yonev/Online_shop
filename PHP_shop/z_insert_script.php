<?php

include_once "sql_connection.php";

echo'<form action = "" method = "POST">
<input type = "submit" name = "insert_data" value = "insert data">
</form>';

//  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS  MOTHERBOARDS

// $brand = array("ASUS", "ASROCK", "EVGA", "GIGABYTE", "NZXT", "BIOSTAR");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $lighting = array("RGB", "no");
// $socket = array("AMD", "Intel");
// $form_factor = array("Normal", "Extended", "Micro", "Mini");
// $ram_slots = array("2", "4", "8");
// $ram_frequency = array("1600", "2400", "2600", "3200", "3600", "4000", "4200", "4400",);
// $ram_cap = array("8", "16", "32", "64", "128", "256");
// $ram_type = array("DDR2", "DDR3", "DDR4");
// $warranty = array("12", "24", "36");
// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 100; $i++){

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_price = rand(30, 550);
//         $r_color = rand(0,7);
//         $r_socket = $socket[rand(0,1)];
//         $r_form_factor = $form_factor[rand(0,3)];
//         $r_chipset = $r_socket;
//         $r_ram_slots = $ram_slots[rand(0, 2)];
//         $r_ram_frequency = $ram_frequency[rand(0, 7)];
//         $r_ram_cap = $ram_cap[rand(0,5)];
//         $r_ram_type = $ram_type[rand(0,2)];
//         $r_pic = rand(1,6) . ".jpg"; 
//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_type = rand(0,2);
//         $r_lighting = $lighting[rand(0,1)];
//         $r_connection = rand(0,1);
//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }
//         $r_warranty = $warranty[rand(0,2)];

//         $sql_insert_data = "INSERT INTO `motherboards` (`brand`, `name`, `price`, `pic`, `info`, `quantity`, `warranty`, `promo`, `lighting`, 
//         `socket`, `form_factor`, `chipset`, `ram_slots`, `ram_frequency`, `ram_cap`, `ram_type`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$r_pic', '$info', '$r_quantity', '$r_warranty', '$r_promo',
//         '$r_lighting', '$r_socket', '$r_form_factor', '$r_chipset',
//         '$r_ram_slots', '$r_ram_frequency', '$r_ram_cap', '$r_ram_type')";

//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS  CPUS
// $brand = array("AMD", "INTEL");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");

// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $socket = array("LGA1151", "LGA2066", "AM4", "STRX4");
// $work_frequency = array("2.5", "2.8", "3.0", "3.2", "3.8", "4.0", "4.2", );
// $cache = array("2", "4", "8", "16", "32", "64", "128", "256", );
// $box_cooler = array("yes", "no");
// $series = array("AMD_RYZEN_3", "AMD_RYZEN_5", "AMD_RYZEN_7", "AMD_RYZEN_9", "INTEL_CORE_i3", "INTEL_CORE_i5" , "INTEL_CORE_i7", "INTEL_CORE_i9");


// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 80; $i++){
        
//         $r_brand_num = rand(0,1);
//         $r_brand = $brand[$r_brand_num];
//         $r_name = $r_brand . " " . $name[rand(0,3)];

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(230, 1000);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(1000, 3500);
//         } else {
//             $r_price = rand(3500, 7000);
//         }
        

//         $r_warranty = $warranty[(rand(0,4))];
//         if($r_brand_num == 0){
//             $r_pic = 1 . ".jpg";
//             $r_socket = $socket[rand(2,3)];
//             $r_series = $series[rand(0,3)];
//         } else {
//             $r_pic = 2 . ".jpg";
//             $r_socket = $socket[rand(0,1)];
//             $r_series = $series[rand(4,7)];
//         }
//         $r_work_frequency = $work_frequency[rand(0,6)];
//         $r_cache = $cache[rand(0,7)];
//         $r_box_cooler = $box_cooler[rand(0,1)];
//         $r_physical_cores = $cache[rand(0,5)];
//         $r_logical_cores = $cache[rand(0,6)];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $sql_insert_data = "INSERT INTO `cpus` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `socket`, `work_frequency`, `cache`, `box_cooler`, `series`, `physical_cores`, `logical_cores`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_socket', '$r_work_frequency', '$r_cache', '$r_box_cooler',
//         '$r_series', '$r_physical_cores', '$r_logical_cores')";

//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS  GPUS

// $brand = array("ASROCK", "COOLER_MASTER", "ASUS", "EVGA");
// $memory = array("1", "2", "3", "4", "6", "12", "24");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// // ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");
// $series = array("RX", "GTX");
// $bus = array("32", "64", "128", "256");
// $memory_type = array("GDDR3", "GDDR5", "GDDR6");
// $frequency = array("less_1000", "less_2000", "over_2000");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 100; $i++){
//         $r_series_num = rand(0,1);

//         if($r_series_num == 0){
//             $r_pic = rand(1,2) . ".jpg";
//             $r_brand = $brand[rand(0,1)];
//             $r_cores = "CUDA";
//             $r_series = "RX";
//         } else {
//             $r_pic = rand(3,4) . ".jpg";
//             $r_brand = $brand[rand(2,3)];
//             $r_cores = "Stream";
//             $r_series = "GTX";
//         }
        
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_memory = $memory[rand(0,6)];
//         $r_frequency = $frequency[rand(0, 2)];
//         $r_bus = $bus[rand(0,3)];
//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(230, 1000);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(1000, 3500);
//         } else {
//             $r_price = rand(3500, 7000);
//         }

//             $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];
//         $r_memory_type = $memory_type[rand(0,2)];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `gpus` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `memory`, `cores`, `frequency`, `bus`, `memory_type`, `series`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_memory', '$r_cores', '$r_frequency', '$r_bus',
//         '$r_memory_type', '$r_series')";

//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM  RAM
// $brand = array("GIGABYTE", "HYPERX", "KINGSTON", "JONSBO");
// $cap = array("1", "2", "4", "8", "16", "32", "64", "128");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// // ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");
// $heatsink = array("yes", "no");
// $desk_or_mobile = array("desk", "mobile");
// $type = array("DDR2", "DDR3", "DDR4");
// $frequency = array("400", "800", "1333", "1600", "2400", "2666", "3000", "3200", "3600", "4000", "4200", "4500");
// $color = array("black", "white", "red", "blue", "green");
// $lighting = array("RGB", "no");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 230; $i++){
       
//         $r_brand = $brand[rand(0,3)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_cap = $cap[rand(0,7)];
//         $r_heatsink = $heatsink[rand(0,1)];
//         $r_desk_or_mobile = $desk_or_mobile[rand(0,1)];
//         $r_type = $type[rand(0,2)];
//         $r_frequency = $frequency[rand(0, 11)];
//         $r_color = $color[rand(0,4)];
//         $r_lighting = $lighting[rand(0,1)];
//         $r_pic = rand(1,13) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 400);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(400, 900);
//         } else {
//             $r_price = rand(900, 1500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `ram` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `cap`, `type`, `frequency`, `desk_or_mobile`, `heatsink`, `color`, `lighting`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_cap', '$r_type', '$r_frequency', '$r_desk_or_mobile',
//         '$r_heatsink', '$r_color', '$r_lighting')";

//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD  HDD
// $brand = array("ADATA", "ASUS", "HAMA", "SEAGATE", "TOSHIBA", "MAXEL");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $interface = array("sata", "usb2", "usb3");
// $size = array("120", "240", "500", "1000", "2000", "4000", "8000", "12000", "16000");
// $speed = array("100", "500", "1000", "2000", "4000", "5000", "6000", "7000");
// $type = array("HDD", "SSD", "NVMe");
// $lighting = array("RGB", "no");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 127; $i++){
       
//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_size = $size[rand(0,8)];
//         $r_speed = $speed[rand(0,7)];
//         $r_type = $type[rand(0,2)];
//         $r_lighting = $lighting[rand(0,1)];
//         $r_interface = $interface[rand(0,2)];
//         $r_pic = rand(1,6) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 400);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(400, 900);
//         } else {
//             $r_price = rand(900, 1500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `hdd` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `interface`, `size`, `speed`, `type`, `lighting`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_interface', '$r_size', '$r_speed', '$r_type',
//         '$r_lighting')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY  POWER_SUPPLY
// $brand = array("CORSAIR", "EVGA", "ESTILLO", "WEWNT", "GIGABYTE", "SPIRE");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $certificate = array("no", "80+", "Bronze", "Gold", "Platinum");
// $power = array("180", "250", "300", "400", "500", "600", "700", "800", "1000", "1200", "2000");
// $type = array("module", "half_module", "no_module", "more_cabel_lenght");
// $form_factor = array("ATX", "FlexATX", "SFX");
// $lighting = array("no", "RGB");
// $color = array("black", "white", "grey");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 80; $i++){
       
//         $r_certificate = $certificate[rand(0,4)];
//         $r_power = $power[rand(0,10)];
//         $r_type = $type[rand(0,3)];
//         $r_form_factor = $form_factor[rand(0,2)];
//         $r_lighting = $lighting[rand(0,1)];
//         $r_color = $color[rand(0,2)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,10) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 400);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(400, 900);
//         } else {
//             $r_price = rand(900, 1500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `power_supply` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `power`, `certificate`, `type`, `form_factor`, `lighting`, `color`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_power', '$r_certificate', '$r_type', '$r_form_factor',
//         '$r_lighting', '$r_color')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards  Keyboards
// $brand = array("CORSAIR", "EVGA", "ESTILLO", "WEWNT", "GIGABYTE", "SPIRE");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $type = array("mechanical", "half_mech", "membrane",);
// $lighting = array("no", "RGB", "green", "red", "blue");
// $color = array("black", "white", "grey", "green", "red", "blue");
// $connection = array("USB", "wireless");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 120; $i++){
       
//         $r_type = $type[rand(0,2)];
//         $r_lighting = $lighting[rand(0,4)];
//         $r_color = $color[rand(0,5)];
//         $r_connection = $connection[rand(0,1)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,12) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 100);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(100, 300);
//         } else {
//             $r_price = rand(300, 500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `keyboards` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `color`, `type`, `lighting`, `connection`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_color', '$r_type', '$r_lighting', '$r_connection')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  Headphones  Headphones  Headphones  Headphones  Headphones  Headphones  Headphones  Headphones  Headphones  Headphones
// $brand = array("CORSAIR", "EVGA", "ESTILLO", "WEWNT", "GIGABYTE", "SPIRE");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $type = array("over_ear", "in_ear");
// $lighting = array("no", "RGB", "green", "red", "blue");
// $color = array("black", "white", "grey", "green", "red", "blue");
// $connection = array("USB", "wireless", "3.5_mm" , "6.3_mm");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 120; $i++){
       
//         $r_type = $type[rand(0,1)];
//         $r_lighting = $lighting[rand(0,4)];
//         $r_color = $color[rand(0,5)];
//         $r_connection = $connection[rand(0,3)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,7) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 100);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(100, 300);
//         } else {
//             $r_price = rand(300, 500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `headphones` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `color`, `type`, `lighting`, `connection`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_color', '$r_type', '$r_lighting', '$r_connection')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses  Mouses
// $brand = array("CORSAIR", "EVGA", "ESTILLO", "WEWNT", "GIGABYTE", "SPIRE");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $type = array("optical", "laser");
// $lighting = array("no", "RGB", "green", "red", "blue");
// $color = array("black", "white", "grey", "green", "red", "blue");
// $connection = array("USB", "wireless");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 120; $i++){
       
//         $r_type = $type[rand(0,1)];
//         $r_lighting = $lighting[rand(0,4)];
//         $r_color = $color[rand(0,5)];
//         $r_connection = $connection[rand(0,1)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,10) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 100);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(100, 300);
//         } else {
//             $r_price = rand(300, 500);
//         }

//         $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `mouses` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `color`, `type`, `lighting`, `connection`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_color', '$r_type', '$r_lighting', '$r_connection')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX  PC BOX
// $brand = array("ASUS", "KOLINK", "ESTILLO", "NZXT", "GIGABYTE", "SPIRE");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $form_factor = array("mid_tower", "mini_tower", "super_tower", "full_tower");
// $format = array("ATX", "EATX", "NUC",);
// $fans = array("no", "1", "2", "3", "4");
// $color = array("black", "red", "white", "green", "pink", "yellow", "blue", "grey");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 345; $i++){
       
//         $r_form_factor = $form_factor[rand(0,3)];
//         $r_format = $format[rand(0,2)];
//         $r_fans = $fans[rand(0,4)];
//         $r_color = $color[rand(0,7)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,10) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(20, 100);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(100, 300);
//         } else {
//             $r_price = rand(300, 500);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `pc_box` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `form_factor`, `format`, `fans`, `color`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_form_factor', '$r_format', '$r_fans', '$r_color')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC  PC
// $brand = array("CRUSHER", "FIGHTER", "ROG");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $cpu = array("AMD_RYZEN_3", "AMD_RYZEN_5", "AMD_RYZEN_7", "AMD_RYZEN_9", "INTEL_CORE_i3", "INTEL_CORE_i5", "INTEL_CORE_i7", "INTEL_CORE_i9");
// $gpu = array("Radeon", "GeForce");
// $ram = array("8", "16", "32", "64");
// $disk = array("HDD", "SSD");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 40; $i++){
       
//         $r_cpu = $cpu[rand(0,7)];
//         $r_gpu = $gpu[rand(0,1)];
//         $r_ram = $ram[rand(0,3)];
//         $r_disk = $disk[rand(0,1)];

//         $r_brand = $brand[rand(0,2)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,7) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(700, 2000);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(2000, 3500);
//         } else {
//             $r_price = rand(3500, 5000);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `pc` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `cpu`, `gpu`, `ram`, `disk`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_cpu', '$r_gpu', '$r_ram', '$r_disk')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

//  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop  Laptop
// $brand = array("ASUS", "DELL", "FUJITSU", "HP", "ACER", "LENOVO");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $cpu = array("AMD_RYZEN_3", "AMD_RYZEN_5", "AMD_RYZEN_7", "AMD_RYZEN_9", "INTEL_CORE_i3", "INTEL_CORE_i5", "INTEL_CORE_i7", "INTEL_CORE_i9");
// $gpu = array("Radeon", "GeForce");
// $ram = array("8", "16", "32", "64");
// $disk = array("HDD", "SSD");
// $res = array("1600x900", "1920x1080", "2560x1440", "3840x2160");
// $screen = array("14", "15.6", "16.1", "17.3");
// $battery = array("5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 127; $i++){
       
//         $r_cpu = $cpu[rand(0,7)];
//         $r_gpu = $gpu[rand(0,1)];
//         $r_ram = $ram[rand(0,3)];
//         $r_disk = $disk[rand(0,1)];
//         $r_res = $res[rand(0,3)];
//         $r_screen = $screen[rand(0,3)];
//         $r_battery = $battery[rand(0,9)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,8) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(700, 2000);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(2000, 3500);
//         } else {
//             $r_price = rand(3500, 5000);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `laptop` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `cpu`, `gpu`, `ram`, `disk`, `res`, `screen`, `battery`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_cpu', '$r_gpu', '$r_ram', '$r_disk', '$r_res', '$r_screen', '$r_battery')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

// Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors Monitors
// $brand = array("ASUS", "BENQ", "FUJITSU", "HP", "ACER", "EIZO");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $matrix = array("TN", "IPS", "ADS", "VA", "PLS");
// $frequency = array("60", "75", "100", "120", "144", "165", "170", "175", "280", "360");
// $reaction = array("1", "2", "3", "4");
// $color = array("black", "white", "red", "green", "blue");
// $res = array("1600x900", "1920x1080", "2560x1440", "3840x2160");
// $screen = array("14", "15.6", "16.1", "17.3");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 168; $i++){
       
//         $r_matrix = $matrix[rand(0,4)];
//         $r_frequency = $frequency[rand(0,1)];
//         $r_reaction = $reaction[rand(0,3)];
//         $r_color = $color[rand(0,4)];
//         $r_res = $res[rand(0,3)];
//         $r_screen = $screen[rand(0,3)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,8) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(200, 500);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(500, 1300);
//         } else {
//             $r_price = rand(1300, 2500);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `monitor` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `matrix`, `frequency`, `reaction`, `color`, `res`, `screen`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_matrix', '$r_frequency', '$r_reaction', '$r_color', '$r_res', '$r_screen')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

// Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools Stools
// $brand = array("GIGABYTE", "NACON", "TTESPORT", "PLAYSEAT", "THUNDERX", "NOBLECHAIRS");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $material = array("leather", "fiber");
// $color = array("black", "white", "red", "green", "blue");
// $max_weight = array("70", "100", "150", "170");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 156; $i++){
       
//         $r_material = $material[rand(0,1)];
//         $r_color = $color[rand(0,4)];
//         $r_max_weight = $max_weight[rand(0,3)];

//         $r_brand = $brand[rand(0,5)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,8) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(150, 300);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(300, 900);
//         } else {
//             $r_price = rand(900, 1400);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `stools` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `material`, `color`, `max_weight`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_material', '$r_color', '$r_max_weight')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }

// Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks Desks
// $brand = array("PLAYSEAT", "THUNDERX");
// $name = array("Lorem ipsum", "Dolor Sit", "Ullamco", "Volptate Velit");
// $info = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
// ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// $warranty = array("12", "24", "36", "48", "60");

// $monitor_num = array("1", "2", "3", "4");
// $color = array("black", "white", "red", "green", "blue");
// $max_weight = array("100", "130", "170", "250");

// if(isset($_POST["insert_data"])){
//     for($i = 0; $i < 124; $i++){
       
//         $r_monitor_num = $monitor_num[rand(0,3)];
//         $r_color = $color[rand(0,4)];
//         $r_max_weight = $max_weight[rand(0,3)];

//         $r_brand = $brand[rand(0,1)];
//         $r_name = $r_brand . " " . $name[rand(0,3)];
//         $r_pic = rand(1,8) . ".jpg";

//         $r_chance_price = rand(0,100);
//         if($r_chance_price <= 70){
//             $r_price = rand(150, 300);
//         } else if ($r_chance_price >=71 && $r_chance_price <= 90){
//             $r_price = rand(300, 900);
//         } else {
//             $r_price = rand(900, 1400);
//         }

//        $r_chance_quantity = rand(0,100);
//         if($r_chance_quantity >= 0 && $r_chance_quantity <= 10){
//             $r_quantity = 0;
//         } else if ($r_chance_quantity >= 11 && $r_chance_quantity <= 40){
//             $r_quantity = rand(1, 10);
//         } else {
//             $r_quantity = rand(11, 50);
//         }
//         $r_warranty = $warranty[(rand(0,4))];

//         $chance_promo = rand(0,100);
//         if($chance_promo >= 0 && $chance_promo <= 10){
//             $r_promo = rand(1, 15);
//         } else {
//             $r_promo = 0;
//         }

//         $sql_insert_data = "INSERT INTO `desks` (`brand`, `name`, `price`, `info`, `quantity`, `warranty`, `pic`, `promo`,
//          `monitor_num`, `color`, `max_weight`) 
//         VALUES ('$r_brand', '$r_name', '$r_price', '$info', '$r_quantity', '$r_warranty', '$r_pic', '$r_promo',
//         '$r_monitor_num', '$r_color', '$r_max_weight')";
// echo $sql_insert_data;
//         if(!mysqli_stmt_prepare($stmt, $sql_insert_data)){
//             echo "Problem inserting data";
//             exit;
//         } else {
//                 mysqli_stmt_execute($stmt);
//         }
//     }
// }