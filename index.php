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
        "title" => "Star Voyage",
        "rating" => "PG"
    ],
    [   
        "title" => "The Last Dragon",
        "rating" => "M"
    ],
    [
        "title" => "Midnight Escape",
        "rating" => "MA15+"
    ],
    [
        "title" => "The haunted House",
        "rating" => "R18+"
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

function movieSelection()
{

    do {
        echo "\n";
        $user_selection = readline("\nPlease select a movie by submitting a value ranging from 1-4: ");
        
        if ($user_selection === "1") {
            echo "You have selected Star Voyage!\n";
            break;
        }   elseif ($user_selection === "2") {
                echo "You have selected The Last Dragon!\n";
                break;
        }   elseif ($user_selection === "3") {
                echo "You have selected Midnight Escape!\n";
                break;
        }   elseif ($user_selection === "4") {
                echo "You have selected The haunted House!\n";
                break;
        }
    } while ($user_selection > "4" || $user_selection < "1");
}

// will come back to looking at how to dynamically program the movie names in instead of hardcoding them
// also got a question about type coersion / changing the types to match e.g string/string or int/int

movieSelection();

// TODO 4: Ask how many tickets they want (between 1 and 6).

function ticketPurchase()
{
    do {

        $ticket_number = readline("How many tickets would you like to purchase? You can purchase up to 6 tickets per booking. Please provide a value between 1-6 to continue. ");
        
        if ($ticket_number >= 1 && $ticket_number <= 6) {
            $plural = $ticket_number === 1 ? "ticket" : "tickets";
            echo "You have selected {$ticket_number} {$plural}.\n";
            return (int)$ticket_number;
        }

        // Map integers to word values -> Add to string to look pretty :D 

       /* }   elseif ($ticket_number === "2") {
                echo "You have selected two tickets.\n";
                return 2;
        }   elseif ($ticket_number === "3") {
                echo "You have selected three tickets.\n";
                return 3;
        }   elseif ($ticket_number === "4") {
                echo "You have selected four tickets.\n";
                return 4;
        }   elseif ($ticket_number === "5") {
                echo "You have selected five tickets.\n";
                return 5;
        } elseif ($ticket_number === "6") {
                echo "You have selected six tickets.\n";
                return 6;
        }*/

    } while ($ticket_number > "6" || $ticket_number < "1");
}

// TODO 5: Loop once per ticket, asking for that person's age.
$ticket_amount = ticketPurchase();
//var_dump("Ticket amount: $ticket_amount");

function customerAge()
{
    global $ticket_amount;
    $age_data = [];
    
    do {
        //var_dump("Ticket amount 2: $ticket_amount");
        if ($ticket_amount === 0) break;
        $age = readline("\nPlease provide the age of each ticket holder:  ");
        $ticket_amount--;
        array_push($age_data, $age);
        print_r($age_data);
        //echo $ticket_amount;

    } while ($ticket_amount > 1);

    //array_push($age_data, $age);
    print_r($age_data);
    return $age_data;

    /*while ($ticket_amount > 0) {
        //var_dump("Ticket amount 2: $ticket_amount");
        $age = readline("\nPlease provide the age of each ticket holder:  ");
        $ticket_amount--;
        array_push($age_data, $age);
        print_r($age_data);
        //echo $ticket_amount;
    }*/


}

customerAge();
$customer_age = customerAge();
//print_r($customer_age);

// TODO 6: Work out the ticket type and price for each age.

function ticketType()
{
    global $customer_age;

    $ticket_options = [
        [
            "ticket" => "adult",
            "price" => 19.00
        ],
        [
            "ticket" => "child",
            "price" => 10.00
        ]
    ];

    //echo $ticket_options[0]["price"];
    //echo $ticket_options[1]["ticket"];

   /* if ($customer_age >= 18) {

    }*/
}

//ticketType();

// TODO 7: Check the selected film's classification against each age.
// TODO 8: Print a receipt with the ticket breakdown and total.

// Tip: Write and test one TODO at a time. Commit your progress!