const highScoresList = document.getElementById("highScoresList");
const highScores = JSON.parse(localStorage.getItem("highScores")) || [];

highScoresList.innerHTML = "<li style='width: 40rem;'>Difficulty | Score | Correct Questions</li>"
highScoresList.innerHTML += highScores.map( score => {
    return `<li class="high-score" style='width: 40rem;'>${score.difficulty}\t | \t${score.score}\t | \t${score.counter}/5</li>`;
}).join("");