const positionSelect = document.getElementById("positionPlayer");
const elementsPlayer = document.querySelectorAll(".form-group-player");
const elementsGK = document.querySelectorAll(".form-group-gk");

function playersPositionChange() {
  if (positionSelect.value === "GK") {
    elementsGK.forEach((element) => (element.style.display = "flex"));
    elementsPlayer.forEach((element) => (element.style.display = "none"));
  } else {
    elementsGK.forEach((element) => (element.style.display = "none"));
    elementsPlayer.forEach((element) => (element.style.display = "flex"));
  }
}
positionSelect.addEventListener("change", playersPositionChange);
playersPositionChange();
