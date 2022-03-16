const username = document.getElementById("username");
const difficulty = localStorage.getItem("difficulty");
const correctQuestions = localStorage.getItem("counter");
const saveScoreButton = document.getElementById("saveScoreButton");
const finalScore = document.getElementById("finalScore");
const mostRecentScore = localStorage.getItem("mostRecentScore");
const highScores = JSON.parse(localStorage.getItem("highScores")) || [];
const  MAX_HIGH_SCORES = 25;

finalScore.innerText = mostRecentScore;

// Wait for the user to start typing the username
username.addEventListener("keyup", () => {
    saveScoreButton.disabled = !username.value;
})

// Save the recent score to the local storage
saveHighScore = (event) => {
    console.log("Clicked Save");
    event.preventDefault();

    // Create the score object
    const score = {
        score: mostRecentScore,
        difficulty: difficulty,
        counter: correctQuestions
    }

    // Update the scores table
    highScores.push(score);

    // Sort the scores
    highScores.sort( (a, b) => {
        return b.score - a.score;
    })
    highScores.splice(MAX_HIGH_SCORES);

    // Save the final score table to the local storage as JSON
    localStorage.setItem("highScores", JSON.stringify(highScores));

    // Return to home page
    document.location.assign("/");
}