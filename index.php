<html>

    <!-- Cotrol Vars -->
    <?php
        $leftOffset = 10;
        $topOffset = 50;
        
        $leftPadding = 5;
        $topPadding = 5;
        
        $buttonWidth = 150;
        $buttonHeight = 150;


        // ----------------
        // Do not change anything below this line
        $vertical = $topOffset + (5*($buttonHeight + $topPadding))
    ?>

    <!-- Get lines from bingo DB -->
    <?php
        include "db.php"
        
        
    ?>
    <head>
        <!-- Setup the style for controls -->
        <style>
        <?php echo "\t.button {\n\t\tposition: absolute;\n\t\tmin-height: " . $buttonHeight . "px;\n\t\tmin-width: " . $buttonWidth . "px;\n\t\twhite-space: normal;\n\t\tword-wrap: break-word;\n\t};\n"; ?>
        </style>
    </head>
    <body>
        <label for="BingoGrids">Choose a bingo grid to play: </label>
        <select name="BingoGrids" id="bingoGridSelection" class="select" style="width: 587px">bingoGridSelection
            <option Value="Test">Test</option>
            <option Value="Test">Tester</option>
            <option Value="Test">Testest</option>
        </select>

        <!-- Add some buttons -->
        <?php
            $topPos = $topOffset;
            $leftPos = $leftOffset;
            $buttonText = "Here's some text";

            for ($i = 1; $i <= 25; $i++) {
                echo "<button onclick=\"changeColor(this.id, this.style.background)\" id=\"btn" . $i . "\" class=\"button\" style=\"background: rgb(255, 255, 255); left: ". $leftPos. "; top: ". $topPos ."\">" . $buttonText . "</button>";

                $leftPos += $leftPadding + $buttonWidth;

                if($i % 5 == 0){ 
                    echo "<br>";
                    $leftPos = $leftOffset;
                    $topPos += $topPadding + $buttonHeight;
                }
            }
        ?>
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

