<?php
require_once __DIR__ . '/../vendor/autoload.php';//Composer autoload

use Libs\JsonSorterClass;

$make_route = new JsonSorterClass();
$make_route->FindStartingPoint();//load file, convert it to a string and find 1st boarding pass
$make_route->FinfRelatedBoardingPasses($make_route->getFirstBoardingPass(), $make_route->data);//create array with route keys
$make_route->CreateRoute();//convert set of the boarding passes with correct order

use Libs\JsonContentManagerClass;

$save_route = new JsonContentManagerClass();// Convert ordered set back to Json format
$save_route->SaveRoute();//save it to a disk
//Display created route for the Customer
echo '
<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Demo</title>
    <style>
        body {
            padding: 100px;
            text-align: center;
            font: 14px Arial;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
        }

        tr:nth-child(odd) {
            background-color: #eee;
        }
    </style>
<body>
<h3>Dear Customer, this route has been created for you according your boarding passes. Please follow it to reach your final destination.</h3>
    <table>
        <tr>
            <th>Type of transport</th>
            <th>Transport number</th>
            <th>From</th>
            <th>To</th>
            <th>Seat assignment</th>
            <th>Gate</th>
            <th>Baggage drop</th>
        </tr>
         <tr>
';

foreach ($make_route->getOutput() as $val) {
    foreach ($val as $key) {
        echo "    
            <td>$key</td>
                        ";
    }
    echo '</tr>';
};
echo '
</table>
</form>
</body>
</html>';