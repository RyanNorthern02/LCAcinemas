// Select all elements with the class "input"
const inputs = document.querySelectorAll(".input");

// Function is called when an input field is focused
function focus() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

// Function to be called when an input field loses focus
function blur() {
  let parent = this.parentNode;
  
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

// For each input field
inputs.forEach((input) => {
  // A focus event listener that calls the focus function when the input field is focused
  input.addEventListener("focus", focus);
  
  // A blur event listener that calls the blur function when the input field loses focus
  input.addEventListener("blur", blur);
});