<html>
    <!-- Control Vars -->
    <?php
        $leftOffset = 10;
        $topOffset = 50;
        
        $leftPadding = 5;
        $topPadding = 5;
        
        $buttonWidth = 150;
        $buttonHeight = 150;

        $buttonTextLength = 20;

        // ----------------
        // Do not change anything below this line
        $vertical = $topOffset + (5*($buttonHeight + $topPadding));
        $showBingo = false;
    ?>    

    <head>
        <style> body{ background-color: #181a1b; }</style>
        <!-- Setup the style for controls -->
        <style>
            <?php echo "\t.button {
                \n\t\tposition: absolute;
                \n\t\tmin-height: " . $buttonHeight . "px;
                \n\t\tmin-width: " . $buttonWidth . "px;
                \n\t\ttext-align: center;
                \n\t};
                \n"; ?>
        </style>
    </head>    
    <body>
        <!-- Get lines from bingo DB -->
        <?php
            include "db.php";

            //some testing stuff
            $grids = getBingoGrids();
            $lines = getLinesFromBingo(3);
            // $id = getIDFromName("TestList");

            // Setup new grids for later
            $newGrids = getBingoGridInfo();
            
            // Parse URL argument
            $url_components = parse_url($_SERVER['REQUEST_URI']);
            parse_str($url_components['query'], $params);

            // Check if we actually have any params
            if(count($params) > 0){
                // If the params are valid
                if(checkValidBingoId($params['bingo_id'])){
                    // Param is valid, so get the lines and show the bingo
                    $lines = getLinesFromBingo($params['bingo_id']);
                    $showBingo = true;
                } else {
                    // Invalid bingo
                    echo "<h1 style=\"color: red\">Invalid Bingo ID</h1>";    
                }
            }

            //Ensure that we have enough lines
            if(count($lines) < 25){
                $showBingo = false;
            }
        ?>
        <script>
            var bingoContent = <?php echo json_encode($newGrids); ?>;
            // console.log(bingoContent);
        </script>
        <div>
            <label for="BingoGrids">Choose a bingo grid to play: </label>
            <select name="BingoGrids" id="bingoGridSelection" class="select" style="width: 500">bingoGridSelection
                <option>
                <?php
                    for($i = 0; $i < count($grids); $i++){
                        echo "<option>" . $grids[$i] ."</option>";
                    }
                ?>
            </select>
            <button id="changeBingoButton" onclick="changeBingo()" style="position: absolute; left: 700px;">Play bingo</button>
        </div>
        <div>
        <!-- Add some buttons -->
        <?php
            if($showBingo){           
                // Setup controls
                $topPos = $topOffset;
                $leftPos = $leftOffset;
                $buttonText = "Here's some text";
                
                // Add each button
                for ($i = 1; $i <= 25; $i++) {
                    // Get the word text
                    $buttonText = wordwrap($lines[$i],$buttonTextLength, "<br>");
                    if($i == 13){ $buttonText = "Free space"; }
                    
                    // Echo out the actual HTML button
                    echo "<button onclick=\"changeColor(this.id, this.style.background)\" id=\"btn" . $i . 
                    "\" class=\"button\" style=\"background: rgb(255, 255, 255);left: ". $leftPos. 
                    "; top: ". $topPos . "\"><p>" . $buttonText . "</p></button>";

                    // Increment left pos
                    $leftPos += $leftPadding + $buttonWidth;

                    // "Carriage return" for button placement
                    if($i % 5 == 0){ 
                        echo "<br>";
                        $leftPos = $leftOffset;
                        $topPos += $topPadding + $buttonHeight;
                    }
                }
            }
        ?>
        </div>
        <!-- Control the background colour of the buttons with JS (ew) -->
        <script>
        function changeColor(id, backColour) {
            let rgb = backColour.toString();
            if (rgb == "rgb(255, 255, 255)"){       // White
                document.getElementById(id).style.background='#4CAF50';
                document.getElementById(id).style.color='black';
            }else if (rgb == "rgb(76, 175, 80)"){   // Green
                document.getElementById(id).style.background='#ff0000';
                document.getElementById(id).style.color='white';
            }else if (rgb == "rgb(255, 0, 0)"){     // Red
                document.getElementById(id).style.background='#ffffff';    
                document.getElementById(id).style.color='black';
            }
            else{ // Catch all
                document.getElementById(id).style.background='#ffffff';
                document.getElementById(id).style.color='black';
            }
        }
        function changeBingo(){
            //Get the dropdown selected value
            var select = document.getElementById('bingoGridSelection')
            var val = select.options[select.selectedIndex].value;

            //Look up the ID
            var match = -1;
            for(let i=0; i < bingoContent.length; i++){
                if(val == bingoContent[i][1]){
                    match = bingoContent[i][0];
                }
            }
            
            //Go to the corresponding page
            if(match > 0){
                window.location.assign("index.php?bingo_id=" + match); 
            }
        }
        </script>
        <!-- Footer -->
        <div style="position: absolute; top: 830px">
            <hr>
            <p><a href="phpliteadmin.php">Admin</a></p>
        </div>  
    </body>
</html>

