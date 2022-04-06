<html>

<head>
<style>

.button {background-color: #ffffff;} /* Green */

</style>
</head>

<body>


<button onclick="changeColor(this.id, this.style.background)" id="btn1" class="button" style="background: rgb(255, 255, 255);">Button 1</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn2" class="button" style="background: rgb(255, 255, 255);">Button 2</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn3" class="button" style="background: rgb(255, 255, 255);">Button 3</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn4" class="button" style="background: rgb(255, 255, 255);">Button 4</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn5" class="button" style="background: rgb(255, 255, 255);">Button 5</button>

</br>

<button onclick="changeColor(this.id, this.style.background)" id="btn6" class="button" style="background: rgb(255, 255, 255);">Button 6</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn7" class="button" style="background: rgb(255, 255, 255);">Button 7</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn8" class="button" style="background: rgb(255, 255, 255);">Button 8</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn9" class="button" style="background: rgb(255, 255, 255);">Button 9</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn10" class="button" style="background: rgb(255, 255, 255);">Button 10</button>

</br>

<button onclick="changeColor(this.id, this.style.background)" id="btn11" class="button" style="background: rgb(255, 255, 255);">Button 11</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn12" class="button" style="background: rgb(255, 255, 255);">Button 12</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn13" class="button" style="background: rgb(255, 255, 255);">Button 13</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn14" class="button" style="background: rgb(255, 255, 255);">Button 14</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn15" class="button" style="background: rgb(255, 255, 255);">Button 15</button>

</br>

<button onclick="changeColor(this.id, this.style.background)" id="btn16" class="button" style="background: rgb(255, 255, 255);">Button 16</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn17" class="button" style="background: rgb(255, 255, 255);">Button 17</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn18" class="button" style="background: rgb(255, 255, 255);">Button 18</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn19" class="button" style="background: rgb(255, 255, 255);">Button 19</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn20" class="button" style="background: rgb(255, 255, 255);">Button 20</button>

</br>

<button onclick="changeColor(this.id, this.style.background)" id="btn21" class="button" style="background: rgb(255, 255, 255);">Button 21</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn22" class="button" style="background: rgb(255, 255, 255);">Button 22</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn23" class="button" style="background: rgb(255, 255, 255);">Button 23</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn24" class="button" style="background: rgb(255, 255, 255);">Button 24</button>

<button onclick="changeColor(this.id, this.style.background)" id="btn25" class="button" style="background: rgb(255, 255, 255);">Button 25</button>

<script>

function changeColor(id, backColour) {
    console.log(backColour);
    let rgb = backColour.toString();
	if (rgb == "rgb(255, 255, 255)"){
	document.getElementById(id).style.background='#4CAF50';
	}else if (rgb == "rgb(76, 175, 80)"){
	document.getElementById(id).style.background='#ff0000';
	}else{
	document.getElementById(id).style.background='#ffffff';
	}
}

</script>
</body>
</html>