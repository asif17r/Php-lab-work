<?php
require 'Book.php';
require 'Customer.php';

$books = [];
$customers = [];

while (true) {
    echo "Choose an option:\n";
    echo "1. View Book Info\n";
    echo "2. View Customer Info\n";
    echo "3. Add a Book\n";
    echo "4. Add a Customer\n";
    echo "5. Update Book Info\n";
    echo "6. Update Customer Info\n";
    echo "7. Remove a Book\n";
    echo "8. Remove a Customer\n";
    echo "9. Exit\n";
    $choice = readline("Enter your choice: ");
    system('clear');

    switch ($choice) {
        case 1:
            echo "Available Books (" . count($books) . "):\n";
            foreach ($books as $key => $book) {
                echo "$key: " . $book . PHP_EOL;
            }
            break;
        case 2:
            echo "Customers:\n";
            foreach ($customers as $key => $customer) {
                echo "$key: " . $customer . PHP_EOL;
            }
            break;
            
        case 3:
            $isbn = (int)readline("Enter ISBN: ");
            $title = readline("Enter title: ");
            $author = readline("Enter author: ");
            $available = (int)readline("Enter available copies: ");
            $books[] = new Book($isbn, $title, $author, $available);
            echo "Book added successfully!\n";
            break;
        case 4:
            $id = (int)readline("Enter customer ID: ");
            $firstName = readline("Enter first name: ");
            $lastName = readline("Enter last name: ");
            $email = readline("Enter email: ");
            $customers[] = new Customer($id, $firstName, $lastName, $email);
            echo "Customer added successfully!\n";
            break;
            case 5:
            echo "Select a book to update:\n";
            foreach ($books as $key => $book) {
                echo "$key: " . $book . PHP_EOL;
            }
            $bookKey = (int)readline("Enter the key of the book to update: ");
            if (isset($books[$bookKey])) {
                $book = $books[$bookKey];
                $book->title = readline("Enter new title: ");
                $book->author = readline("Enter new author: ");
                $book->available = (int)readline("Enter new available copies: ");
                echo "Book updated successfully!\n";
            } else {
                echo "Invalid book selection.\n";
            }
            break;
        case 6:
            echo "Select a customer to update:\n";
            foreach ($customers as $key => $customer) {
                echo "$key: " . $customer . PHP_EOL;
            }
            $customerKey = (int)readline("Enter the key of the customer to update: ");
            if (isset($customers[$customerKey])) {
                $customer = $customers[$customerKey];
                $customer->firstName = readline("Enter new first name: ");
                $customer->lastName = readline("Enter new last name: ");
                $customer->email = readline("Enter new email: ");
                echo "Customer updated successfully!\n";
            } else {
                echo "Invalid customer selection.\n";
            }
            break;
        case 7:
            echo "Select a book to remove:\n";
            foreach ($books as $key => $book) {
                echo "$key: " . $book . PHP_EOL;
            }
            $bookKey = (int)readline("Enter the key of the book to remove: ");
            if (isset($books[$bookKey])) {
                unset($books[$bookKey]);
                echo "Book removed successfully!\n";
            } else {
                echo "Invalid book selection.\n";
            }
            break;
        case 8: 
            echo "Select a customer to remove:\n";
            foreach ($customers as $key => $customer) {
                echo "$key: " . $customer . PHP_EOL;
            }
            $customerKey = (int)readline("Enter the key of the customer to remove: ");
            if (isset($customers[$customerKey])) {
                unset($customers[$customerKey]);
                echo "Customer removed successfully!\n";
            } else {
                echo "Invalid customer selection.\n";
            }
            break;
        default:
            echo "Invalid choice. Please enter a valid option.\n";
        }
}
?>