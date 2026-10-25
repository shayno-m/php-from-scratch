<?php

declare(strict_types=1);

// Week 01: Movie Ticket Booking
// Run from the repository root: php index.php
//
// This file is intentionally a starter, not a finished program.
// Read week-01-movie-tickets/README.md before continuing.

// STEP 0 (provided): Start the program and read one line of input.
echo "================================\n";
echo "       THE PHP CINEMA\n";
echo "================================\n\n";
echo "Welcome! What is your name? ";

$name = trim(fgets(STDIN));

echo "\nHi, {$name}! Your movie booking starts here.\n\n";

// TODO 1: Create an array of at least three movies, each with a title and rating.

$movies = [
    [
        "title" => "Interstellar",
        "rating" => "PG-13"
    ],
    [   
        "title" => "Weapons",
        "rating" => "R"
    ],
    [
        "title" => "Forrest Gump",
        "rating" => "PG-13"
    ],
    [
        "title" => "Parasite",
        "rating" => "R"
    ]
];

// echo $movies[0]["rating"];
// echo $movies[3]["title"];
// echo $movies[1]["rating"];

// TODO 2: Display the movies as a numbered menu, using a loop.

echo "Take a look at our list of available movies below:\n\n";

foreach($movies as $i => $movie) {
    echo ($i + 1) . ". Movie: {$movie['title']}, Rating: {$movie['rating']}\n";
}

// TODO 3: Ask the user to choose a movie; reject invalid choices.

echo "\nPlease select a movie by submitting a value randing from 1 to 4";

function movieSelection()
{
    $user_selection = readline(" >>");

    /*if (! $user_selection) {
        return "Please submit an answer between 1 - 4 to select your movie.";
    } */

    if ($user_selection === 1) {
        echo "You have selected Interstellar";
    }

}

movieSelection();
// TODO 4: Ask how many tickets they want (between 1 and 6).
// TODO 5: Loop once per ticket, asking for that person's age.
// TODO 6: Work out the ticket type and price for each age.
// TODO 7: Check the selected film's classification against each age.
// TODO 8: Print a receipt with the ticket breakdown and total.

// Tip: Write and test one TODO at a time. Commit your progress!