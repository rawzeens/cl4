Homepage (index.php):

Handles displaying the list of stock items.
Handles the buy button functionality.
Add Stock Page (add_stock.php):

Handles displaying the form for adding new stock items.
Handles the logic for adding new items to the database.
Update Stock Page (update_stock.php):

Handles displaying the form for updating existing stock items.
Handles the logic for updating items in the database.
Reports Page (reports.php):

Handles displaying various reports related to stock.
Login Page (login.php):

Handles user authentication if required.
Database Connection (db.php):

Contains code for connecting to the database.
May include common database operations.
Common Functions (functions.php):

Includes common functions that are reused across multiple pages.
Error Handling (error.php):

Handles displaying error messages.
Logout Page (logout.php):

Handles user logout if authentication is implemented.
AJAX Handler (ajax_handler.php):

Handles AJAX requests for improved user interactions.
User Manual (user_manual.php):

If applicable, includes documentation on how to use the system.
Configuration (config.php):

CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO stock (name, price, quantity) VALUES
    ('Item 1', 10.99, 20),
    ('Item 2', 5.99, 15),
    ('Item 3', 7.49, 30);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
    ('admin', 'admin123');