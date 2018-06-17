var addRaceForm = document.getElementById('addRaceForm');
var newRaceName = document.getElementById('raceTitle');
var newRaceLocation = document.getElementById('raceLocation')
var newRaceDistance = document.getElementById('raceDistance')
var raceList = document.getElementById("raceList");


window.addEventListener("DOMContentLoaded", function () {
  getRaces();
})


/**
 *
 */
function toggleNewRace() {
  var newRaceButton = document.getElementById('newRaceButton');
  var addRaceBox = document.getElementById('addRaceBox');

  newRaceButton.classList.contains('d-none') ?
    newRaceButton.classList.remove('d-none') : newRaceButton.classList.add('d-none');

  addRaceBox.classList.contains('d-none') ?
    addRaceBox.classList.remove('d-none') : addRaceBox.classList.add('d-none');
}

/**
 *
 */
addRaceForm.onsubmit = function (event) {
  event.preventDefault();

  axios.post(`http://localhost:8000/api/races`, {
    name: newRaceName.value,
    location: newRaceLocation.value,
    distance: newRaceDistance.value
  })
    .then(res => {
      getRaces()
    })
}

/**
 *
 */
function getRaces() {
  axios.get(`http://localhost:8000/api/races`)
    .then(res => {
      const races = res.data;
      buildRaceListDOM(races)
    })
}

/**
 *
 */
function buildRaceListDOM(races) {
  raceList.innerHTML = '';

  races.forEach(function(race) {
    let li = document.createElement("li");
    li.classList.add('list-group-item');
    let t = document.createTextNode(race.name);
    li.appendChild(t);

    raceList.appendChild(li);
  })
}
