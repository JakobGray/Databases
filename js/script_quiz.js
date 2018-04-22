const testWrapper = document.querySelector(".test-wrapper");
const testArea = document.querySelector("#test-area");
const startButton = document.querySelector("#start");
const theTimer = document.querySelector(".timer");


const originText = answer;

var timer = [0,0,0,0];
var interval;
var timerRunning = false;
var pauseText = false;

// Add leading zero to numbers 9 or below (purely for aesthetics):
function leadingZero(time) {
    if (time <= 9) {
        time = "0" + time;
    }
    return time;
}

// Run a standard minute/second/hundredths timer:
function runTimer() {
    let currentTime = leadingZero(timer[0]) + ":" + leadingZero(timer[1]) + ":" + leadingZero(timer[2]);
    theTimer.innerHTML = currentTime;
    timer[3]++;

    timer[0] = Math.floor((timer[3]/100)/60);
    timer[1] = Math.floor((timer[3]/100) - (timer[0] * 60));
    timer[2] = Math.floor(timer[3] - (timer[1] * 100) - (timer[0] * 6000));
}

// Match the text entered with the provided text on the page:
function spellCheck() {
    let textEntered = testArea.value;
    let originTextMatch = originText.substring(0,textEntered.length);

    if (textEntered == originText) {
        clearInterval(interval);
        console.log(timer[3])
        pauseText = true;
        testWrapper.style.borderColor = "#429890";
    } else {
        if (textEntered == originTextMatch) {
            testWrapper.style.borderColor = "#65CCf3";
        } else {
            testWrapper.style.borderColor = "#E95D0F";
        }
    }
}

// Start the timer:
function start() {
    // testArea.prop('readonly', false);
    let textEnterdLength = testArea.value.length;
    if (textEnterdLength === 0 && !timerRunning) {
        timerRunning = true;
        interval = setInterval(runTimer, 10);
    }
    // console.log(textEnterdLength);
}

// Reset everything:
function reset() {
    clearInterval(interval);
    interval = null;
    timer = [0,0,0,0];
    timerRunning = false;

    testArea.value = "";
    theTimer.innerHTML = "00:00:00";
    testWrapper.style.borderColor = "grey";
}

function type(text, screen) {
	//You have to check for lines and if the screen is an element
	if(!text || !text.length || !(screen instanceof Element)) {
		return;
	}

	//if it is not a string, you will want to make it into one
	if('string' !== typeof text) {
		text = text.join('\n');
	}

	//normalize newlines, and split it to have a nice array
	text = text.replace(/\r\n?/g,'\n').split('');

	//the prompt is always the last child
	var prompt = screen.lastChild;
	prompt.className = 'typing';

	var typer = function(){
		var character = text.shift();
		screen.insertBefore(
			//newlines must be written as a `<br>`
			character === '\n'
				? document.createElement('br')
				: document.createTextNode(character),
			prompt
		);

		//only run this again if there are letters
		if( text.length && !pauseText) {
			setTimeout(typer, 40);
		} else {
			prompt.className = 'idle';
		}
	};
	setTimeout(typer, 50);
};


// Event listeners for keyboard input and the reset
// window.addEventListener("load", start, false);


window.onload=function(){
	var screen = document.getElementById('screen');
  // var text = [
  //   'Hello. I am a better console wannabe.',
  //   'All systems are functioning.',
  //   'I like pie.'
  // ];
  testArea.addEventListener("keyup", spellCheck, false);
  startButton.addEventListener("click", start, false);
  startButton.addEventListener("click", () => {
    type(text, screen);
  }, false);
	// type(text, screen);
};
