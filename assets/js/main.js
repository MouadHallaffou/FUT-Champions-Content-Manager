const formClub = document.getElementById('clubForm');
const createButtonClub = document.getElementById('createClubs');

createButtonClub.addEventListener('click', () =>{
    formClub.classList.toggle('hidden');
})

//======================================//
const addPlayerButton = document.getElementById('addPlayerButton');;
const formulairePlayer = document.getElementById('formulairePlayer');
const statsGK = document.getElementById('statsGK');
const statPlayer = document.getElementById('statsPlayers');
const positionPlayer = document.getElementById('positionPlayer');
addPlayerButton.addEventListener('click', () => {
    formulairePlayer.classList.toggle('hidden');
});
positionPlayer.addEventListener('change', () => {
    if (positionPlayer.value === 'GK') {
        statsGK.classList.remove('hidden');
        statPlayer.classList.add('hidden');
    } else {
        statsGK.classList.add('hidden');
        statPlayer.classList.remove('hidden');
    }
});