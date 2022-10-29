//initialise sums
var house =0;
var aulait =0;
var cap =0;

//check if house button is pressed
function checkHse(){
	if(document.getElementById("hse").checked==true){
		calcHse();
	}
}

//calculate price of house blend
function calcHse(){
	var number=document.getElementById("hsenum").value;
	house= number*hseprice;
	document.getElementById("hsetotal").value ="$"+house;
	calcsum();
}

//check which single or double aulait is selected
function checkAulait(){
	if(document.getElementById("singleAu").checked){
		calcAulait(1);
	}
	else if(document.getElementById("doubleAu").checked){
		calcAulait(2);
	}
}


//calculate price of aulait based on choice
function calcAulait(choice){
	var number=document.getElementById("aulaitnum").value;
	
	if (choice==1){
		aulait = singleau*number;
		document.getElementById("aulaitsum").value="$"+aulait;
	}
	else if(choice==2){
		aulait = doubleau*number;
		document.getElementById("aulaitsum").value="$"+aulait;	
	}
	
	calcsum();
}

//check which single or double cappucino is selected
function checkCap(){
	if(document.getElementById("singleCap").checked){
		calcCap(1);
	}
	else if(document.getElementById("doubleCap").checked){
		calcCap(2);
	}
}

//calculate price of capuccino based on choice
function calcCap(choice){
	var number=document.getElementById("capnum").value;
	
	if (choice==1){
		cap = singlecap*number;
		document.getElementById("capsum").value="$"+cap;
	}
	else if(choice==2){
		cap = doublecap*number;
		document.getElementById("capsum").value="$"+cap;	
	}

	
	calcsum();
}

function calcsum(){
	var total = house + aulait + cap;
	document.getElementById("totalsum").value="$"+total;
}
