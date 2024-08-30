// Tasbeh Section
let counter = 0;
let fingerPrintCount = document.querySelector(".fingerPrint p");
fingerPrintCount.innerHTML = counter;

// select the ul element and its width
const tasbehContent = document.querySelector(".tasbeh-content");
const tasbehWidth = tasbehContent.clientWidth;

// select all li elements and their total count
const boxes = document.querySelectorAll(".tasbeh-content .box");
const boxesCount = boxes.length;

// set the current box index to 0
let currentBoxIndex = 0;

// set the initial transform position for the ul element
tasbehContent.style.transform = `translateX(-${(currentBoxIndex * 100) / boxesCount}%)`;

// add click event listener to the fingerprint element
document.querySelector(".fingerPrint").onclick = function () {
  fingerPrintCount.innerHTML = ++counter;
  if (counter === 33) {
    // when counter becomes 33, move to the next box
    currentBoxIndex++;
    // if the last box is reached, reset the current box index to 0
    if (currentBoxIndex === boxesCount) {
      currentBoxIndex = 0;
    }
    // move to the next box with a smooth transition
    tasbehContent.style.transition = "transform 0.5s ease-in-out";
    tasbehContent.style.transform = `translateX(${(currentBoxIndex * 100) / boxesCount}%)`;
    // set counter to 0 after moving to the next box
    counter = 0;
    setTimeout(() => {
      fingerPrintCount.innerHTML = counter;
      // remove the transition after it's finished
      tasbehContent.style.transition = "none";
    }, 500);
  }
};

// add click event listener to the stop button
document.querySelector(".tasbeh .stop").onclick = function () {
  // send an AJAX request to update the tasbih-counter column in the users table
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../tasbihcounter.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(`tasbih_counter=${counter}`);
};

// add click event listener to the delete button
document.querySelector(".tasbeh .delete").onclick = function () {
  counter = 0;
  fingerPrintCount.innerHTML = counter;
  // reset the current box index to 0 and move to the first box
  currentBoxIndex = 0;
  tasbehContent.style.transition = "transform 0.5s ease-in-out";
  tasbehContent.style.transform = `translateX(-${(currentBoxIndex * 100) / boxesCount}%)`;
  setTimeout(() => {
    // remove the transition after it's finished
    tasbehContent.style.transition = "none";
  }, 500);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../resettasbihcounter.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(`tasbih_counter=${counter}`);
};

