 <?php
    /*
        Author: Pedro Santana
        Date: 03/1/2015

        Purpose: Take a csv file with address, convert it to an associative array and then convert it to a json array to be use
        by the google maps API to get coordinates.

    */
        
        $ParkLocations = [];
        $openFile = fopen("hamRecCenter.csv", "r") or die("File Was Not Found");
        $CompleteAddress = "";
        $xmlDocument;
        $xmlObject;

        $col = 0;
        while(!feof($openFile))
        {
            $array[] = fgetcsv($openFile);
        }
        $count = 0;
        //creates associative array
        for($row = 0; $row < count($array); $row++)
        {
            if(count($array[$row])<=1)
            {
                $col = 0;
                $ParkLocations[$row]['name'] = $array[$row][$col];
                $count++;
            }
            else
            {
                $ParkLocations[$row]['address'] = $array[$row][$col];
                $col++;
                $ParkLocations[$row]['city'] = $array[$row][$col];
                $CompleteAddress = str_replace(' ', '+',$ParkLocations[$row]['address']." ".$ParkLocations[$row]['city']);
                $xmlDocument = file_get_contents("http://maps.googleapis.com/maps/api/geocode/xml?address={$CompleteAddress}&sensor=false");
                $xmlObject = new SimpleXMLElement($xmlDocument);
                $col+=2; 
                $ParkLocations[$row]['phone'] = $array[$row][$col];
                $ParkLocations[$row]['latitude'] = (string)$xmlObject->result->geometry->ParkLocations->lat;
                $ParkLocations[$row]['longitude'] = (string)$xmlObject->result->geometry->ParkLocations->lng;
                $col = 0;
            }
        }
        //converts associative array to json
        $myPropertyMapString = 'var listRecCenters = ' . json_encode($ParkLocations);
        file_put_contents("listRecCenter.js", $myPropertyMapString);
        fclose($openFile);

?>