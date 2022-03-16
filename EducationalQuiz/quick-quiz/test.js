//CONSTANTS
const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 5;

const question = document.getElementById("question")
const choices = Array.from(document.getElementsByClassName("choice-text"))
const questionCounterText = document.getElementById('questionCounter');
const scoreText = document.getElementById('score');
const progressBarFull = document.getElementById('progress-bar-full');
const loader = document.getElementById("loader");
const sampleTest = document.getElementById("sample-test");
const difficulty = document.getElementById("difficulty").innerText.trim();

let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];
let correctQuestions = 0;

let questions = [];

// Fetch available questions from the server
fetch("../questions.json").then( response => {
    return response.json();
}).then( loadedQuestions => {
    // As soon as we load the questions, the quiz starts
    loadedQuestions.forEach(question => {
        if (question["difficulty"] == difficulty) {
            questions.push(question);
        }
    });
    startTest();
})
.catch( error => {
    console.error("Failed to load quesitons\n" + error);
});

// Begin the test
startTest = () => {
    questionCounter = 0;
    score = 0;

    // Copy json to the array of questions
    availableQuestions = [...questions];
    
    // Load the first question
    getNewQuestion();
    
    sampleTest.classList.remove("hidden");
    loader.classList.add("hidden");
}

// Updates question counter and pushes a new question
getNewQuestion = () => {
    // Check if theres is an available question or 
    // the questions already exceed the limit
    if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
        // Save the score to the local storage
        localStorage.setItem("mostRecentScore", score);
        localStorage.setItem("difficulty", difficulty);
        localStorage.setItem("counter", correctQuestions);
        return window.location.assign("./end.php?score=" + score + "&difficulty=" + difficulty + "&counter=" + correctQuestions);
    }

    // Update the counter and progress bar
    questionCounter++;
    questionCounterText.innerText = questionCounter + ' / ' + MAX_QUESTIONS;
    progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

    // Get random question
    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    
    // Push the question and the options to html
    question.innerText = currentQuestion.question;
    choices.forEach(choice => {
        const number = choice.dataset['number'];

        choice.innerText = currentQuestion['choice' + number]
    });

    // Remove the shown question from the pool
    availableQuestions.splice(questionIndex, 1);

    acceptingAnswers = true;
};

// Wait for the user to choose the answer
choices.forEach(choice => {
    choice.addEventListener("click", e => {
        if (!acceptingAnswers) return;

        acceptingAnswers = false;
        // Get the selected answer
        const selectedChoice = e.target;
        const selectedAnswer = selectedChoice.dataset["number"];

        // Check if the choice is correct
        const classToApply = selectedAnswer == currentQuestion.answer ? 'correct' : 'incorrect';

        // Increment the score if correct
        if (classToApply === 'correct') {
            switch (difficulty) {
                case 'easy':
                    incrementScore(CORRECT_BONUS);
                    break;
                case 'medium':
                    incrementScore(CORRECT_BONUS * 1.5);
                    break;
                case 'hard':
                    incrementScore(CORRECT_BONUS * 2);
                    break;
            }
        }

        // Change the html class to apply a new css style
        // Updates the color of the choice for 1 second
        selectedChoice.parentElement.classList.add(classToApply);
        setTimeout( () => {
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
        }, 1000);
    })
});

// Increments the total score and uodates it on the screen
incrementScore = number => {
    score += number;
    scoreText.innerText = score;
    correctQuestions += 1;
}
