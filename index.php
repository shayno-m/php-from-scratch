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
        "title" => "The Haunted House",
        "rating" => "R18+"
    ]
];

// echo $movies[0]["rating"];
// echo $movies[3]["title"];
// echo $movies[1]["rating"];

echo "Take a look at our list of available movies below:\n\n";
echo "\n========================================MOVIES SHOWING ========================================\n";

foreach($movies as $i => $movie) {
    echo ($i + 1) . ". Movie: {$movie['title']}, Rating: {$movie['rating']}\n";
}

function movieSelection(array $movies)
{

    do {
        echo "\n";
        $user_selection = readline("\nPlease select a movie by submitting a value ranging from 1-4: ");
        
        if ($user_selection === "1") {
            echo "You have selected {$movies[0]['title']}!\n";
            $movie_selection = $movies[0]['title'];
            break;
        }   elseif ($user_selection === "2") {
                echo "You have selected {$movies[1]['title']}!\n";
                $movie_selection = $movies[1]['title'];
                break;
        }   elseif ($user_selection === "3") {
                echo "You have selected {$movies[2]['title']}!\n";
                $movie_selection = $movies[2]['title'];
                break;
        }   elseif ($user_selection === "4") {
                echo "You have selected {$movies[3]['title']}!\n";
                $movie_selection = $movies[3]['title'];
                break;
        }
    } while ($user_selection > "4" || $user_selection < "1");

    //var_dump($movie_selection);
    return $movie_selection;
}


// Got question about type coersion / changing the types to match e.g string/string or int/int


$movie_selection = movieSelection($movies);


function ticketPurchase()
{
    do {

        $ticket_number = readline("How many tickets would you like to purchase? You can purchase up to 6 tickets per booking. Please provide a value between 1-6 to continue. ");

        $int_to_word = [
            1 => "one",
            2 => "two",
            3 => "three",
            4 => "four",
            5 => "five",
            6 => "six"
        ];
        
        if ($ticket_number >= 1 && $ticket_number <= 6) {
            $plural = $ticket_number === 1 ? "ticket" : "tickets";
            echo "\nYou have selected {$int_to_word[$ticket_number]} {$plural}.\n";
            return (int)$ticket_number;
        }
    } while ($ticket_number > "6" || $ticket_number < "1");
}


$ticket_amount = ticketPurchase();
//var_dump("Ticket amount: $ticket_amount");

function customerAge()
{
    global $ticket_amount;
    $ticket_counter = 0;
    $age_data = [];
    
    do {
        //var_dump("Ticket amount 2: $ticket_amount");
        if ($ticket_counter === $ticket_amount) break;

        $age = readline("\n(Ticket" . " " . ($ticket_counter + 1) . ") Please provide the age of the ticket holder:  ");
        // Want to add some validation to only accept integers here. 
    
        $ticket_counter++;

        array_push($age_data, (int) $age);
        //print_r($age_data);
        //echo $ticket_amount;

    } while ($ticket_counter !== $ticket_amount);

    return $age_data;

}

$customer_age = customerAge();
// var_dump($customer_age);

function ticketType($movie_selection)
{
    global $customer_age;
    $ticket_type_data = [];
    $ticket_price_data = [];

        $ticket_options = [
        [
            "ticket" => "Child",
            "price" => 10.00
        ],
        [
            "ticket" => "Adult",
            "price" => 18.00
        ], 
        [
            "ticket" => "Senior",
            "price" => 12.00
        ]
    ];

    foreach($customer_age as $index => $age)
        {   
            if ($movie_selection === 'The Haunted House' && $age < 18) {
                echo "\n==!!====================================!WARNING!====================================!!==\n";
                echo "(Ticket " . $index + 1 . ") Please note that you must be at least 18 years old to view {$movie_selection}. \n";
                $continue = trim(readline("If you would like to still add this ticket to your booking, please type in 'yes' or 'no': "));
                $continue = strtolower($continue);
                    if ($continue === 'yes'){
                        continue;
                    } else if ($continue === 'no') {
                        echo "No worries. We have removed your ticket from the booking. ";
                        echo "If you have any other tickets in the order, these will be processed as normal.\n";
                        var_dump("age array BEFORE splice" . $customer_age);
                        array_splice($customer_age, $age); // may need to create a new array too so i dont change the original age array
                        var_dump("age array AFTER splice" . $customer_age);
                    }
            } else if ($movie_selection === 'Midnight Escape' && $age < 15) {
                echo "\n==!!====================================!WARNING!====================================!!==\n";
                echo "(Ticket " . $index + 1 . ") Please note that you must be at least 15 years old to view {$movie_selection}. \n";
                $continue = trim(readline("If you would like to still add this ticket to your booking, please type in 'yes' or 'no': "));
                    if ($continue === 'yes'){
                        continue;
                    } else if ($continue === 'no') {
                        echo "No worries. We have removed your ticket from the booking. ";
                        echo "If you have any other tickets in the order, these will be processed as normal.\n";
                        array_splice($customer_age, $age);
                    }
            }
        }

    foreach($customer_age as $age){
            if ($age >= 65) {
                $ticket_type = $ticket_options[2]["ticket"];
                array_push($ticket_type_data, $ticket_type);
                $ticket_price = $ticket_options[2]["price"];
                array_push($ticket_price_data, $ticket_price);
                echo "Your booking now includes a {$ticket_type} ticket (\${$ticket_price}).\n";
            } else if ($age < 65 && $age >= 18) {
                $ticket_type = $ticket_options[1]["ticket"];
                array_push($ticket_type_data, $ticket_type);
                $ticket_price = $ticket_options[1]["price"];
                array_push($ticket_price_data, $ticket_price);
                echo "Your booking now includes a {$ticket_type} ticket (\${$ticket_price}).\n";
            } else if ($age < 18) {
                $ticket_type = $ticket_options[0]["ticket"];
                array_push($ticket_type_data, $ticket_type);
                $ticket_price = $ticket_options[0]["price"];
                array_push($ticket_price_data, $ticket_price);
                echo "Your booking now includes a {$ticket_type} ticket (\${$ticket_price}).\n";
            }
    }

    var_dump($ticket_type_data);
    var_dump($ticket_price_data);

    // Need to look into how I can combine two arrays into one so that I an return that array and use it later.
    // or potentially perform the rest of the functionality in this function? First option probs best practice


    // This was how I was tackling the above resolution initially, but pivoted to a foreach as I was making too
    // much work for myself

    /*$ticket_type = null;
    $ticket_price = null;
    $updated_age_array = $customer_age;

        do {
                echo "Customer Age IN while";
                var_dump($updated_age_array);

            if ($updated_age_array >= 65) {
                $ticket_type = 'Senior';
                $ticket_price = 12.00;
                echo "A {$ticket_type} ticket has been added to your booking at a price of \${$ticket_price}.\n";
                $ticket_amount--;
                $updated_age_array = array_shift($customer_age);
            } else if ($updated_age_array < 65 && $updated_age_array >= 18) {
                $ticket_type = 'Adult';
                $ticket_price = 18.00;
                echo "A {$ticket_type} ticket has been added to your booking at a price of \${$ticket_price}.\n";
                $ticket_amount--;
                $updated_age_array = array_shift($customer_age);
            } else if ($updated_age_array < 18) {
                $ticket_type = 'Child';
                $ticket_price = 10.00;
                echo "A {$ticket_type} ticket has been added to your booking at a price of \${$ticket_price}.\n";
                $ticket_amount--;
                $updated_age_array = array_shift($customer_age);
            }
        } while($ticket_amount > 0);*/
    }


ticketType($movie_selection);

// TODO 7: Check the selected film's classification against each age.

function checkClassification()
{
        /*foreach($movies as $i => $movie) {
        if ($movie["rating"] === 'R18+' && $customer_age)
    }*/


}
// TODO 8: Print a receipt with the ticket breakdown and total.

// Tip: Write and test one TODO at a time. Commit your progress!