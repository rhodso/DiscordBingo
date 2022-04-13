<html>
    <!-- Control Vars -->
    <?php
        $leftOffset = 10;
        $topOffset = 50;
        
        $leftPadding = 5;
        $topPadding = 5;
        
        $buttonWidth = 150;
        $buttonHeight = 150;

        $buttonTextLength = 12;

        // ----------------
        // Do not change anything below this line
        $vertical = $topOffset + (5*($buttonHeight + $topPadding))

        
    ?>    

    <head>
        <style> body{ background-color: #181a1b; }</style>

        <!-- Setup the style for controls -->
        <style>
            
            <?php echo "\t.button {
                \n\t\tposition: absolute;
                \n\t\tmin-height: " . $buttonHeight . "px;
                \n\t\tmin-width: " . $buttonWidth . "px;
                \n\t\twhite-space: normal !important;
                \n\t\tword-wrap: keep-all;
                \n\t\ttext-align: center;
                \n\t};
                \n"; ?>

        .buttonText {
            display: block;
            margin: 0;
            white-space: normal !important;
            word-break: break-word;
            text-align: center;
        }

        </style>
    </head>    
    
    <body>
        <!-- Get lines from bingo DB -->
        <?php
            include "db.php";
            $grids = getBingoGrids();
            $lines = getLinesFromBingo(3);

            // $id = getIDFromName("TestList");
        ?>

        <label for="BingoGrids">Choose a bingo grid to play: </label>
        <select name="BingoGrids" id="bingoGridSelection" class="select" style="width: 587px">bingoGridSelection
            <option>
            <?php
                for($i = 0; $i < count($grids); $i++){
                    echo "<option>" . $grids[$i] ."</option>";
                }
            ?>
        </select>

        <div>

        <!-- Add some buttons -->
        <?php
            $topPos = $topOffset;
            $leftPos = $leftOffset;
            $buttonText = "Here's some text";

            for ($i = 1; $i <= 25; $i++) {
                $buttonText = $lines[$i];

                // If length of $buttonText is greater than 12 characters, then do the split
                if(strlen($buttonText) > $buttonTextLength){

                    // Split into array of words
                    $buttonTextArray = explode(" ", $buttonText);
                    
                    // Add a line break every 2 words
                    for($j = 0; $j <= count($buttonTextArray); $j+=2){
                        $buttonTextArray[$j] .= "<br>";
                    }

                    // var_dump($buttonTextArray);                

                    // Recombine text into string
                    $buttonText = "";
                    for($j = 0; $j <= count($buttonTextArray); $j++){
                        $buttonText .= $buttonTextArray[$j] . " ";
                    }
                }

                echo "<button onclick=\"changeColor(this.id, this.style.background)\" id=\"btn" . $i . 
                "\" class=\"button\" style=\"white-space: normal !important; word-break: break-word; text-align: center; background: rgb(255, 255, 255); left: ". $leftPos. 
                "; top: ". $topPos . 
                "\"><p class=\"buttonText\" style=\"white-space: normal !important; word-break: break-word; text-align: center;\">" . $buttonText . 
                "</p></button>";

                $leftPos += $leftPadding + $buttonWidth;

                if($i % 5 == 0){ 
                    echo "<br>";
                    $leftPos = $leftOffset;
                    $topPos += $topPadding + $buttonHeight;
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
        </script>

        <!-- Footer -->
        <div style="position: absolute; top: 830px">
            <hr>
            <p><a href="phpliteadmin.php">Admin</a></p>
        </div>  
    </body>
</html>

