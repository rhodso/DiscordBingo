<?php
    $db = new SQLite3('bingo');
    
    function sqlSafeFormVal($str){
        $ans = trim($str);
        return $str;
    }

    function getBingoGrids(){
        //  Usnig global DB
        global $db;

        //SQL statement
        $sql = "SELECT Bingo_Name FROM \"bingoGrids\";";

        //Execute query and store results in new array res
        $results = $db->query(sqlSafeFormVal($sql));
        $res = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            array_push($res, $row);
        }

        //Extract the data we want
        $bingoGrids = array();
        for($i = 0; $i < count($res); $i++){
            array_push($bingoGrids, $res[$i]["Bingo_Name"]);
        }

        //Return the data
        return $bingoGrids;
    }

    function getLinesFromBingo($bingoID){
        //  Usnig global DB
        global $db;

        //SQL statement
        $sql = "SELECT Line_Name FROM \"bingoLines\" WHERE Bingo_ID = " . $bingoID .";";

        // Execute query and store results in new array res
        $results = $db->query(sqlSafeFormVal($sql));

        $res = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            array_push($res, $row);
        }

        //Extract the data we want
        $bingoLines = array();
        for($i = 0; $i < count($res); $i++){
            array_push($bingoLines, $res[$i]["Line_Name"]);
        }

        //Shuffle the array
        shuffle($bingoLines);

        //Return the data
        return $bingoLines;
    }

    function getIDFromName($bingoName){
        //  Usnig global DB
        global $db;

        //SQL statement
        $sql = "SELECT bingoGrids.Bingo_ID FROM bingoGrids WHERE bingoGrids.Bingo_Name = '" . sqlSafeFormVal($bingoName) ."'";

        //Execute query and store results in new array res
        $results = $db->query(sqlSafeFormVal($sql));
        $res = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            array_push($res, $row);
        }

        if(count($res) == 0){ return -1; }
        return $res[0]["Bingo_ID"];
    }   
?>

