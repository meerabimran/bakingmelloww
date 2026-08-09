Baking Mellow - Bakery E-Commerce Website 🍩🧁
Baking Mellow is a beautifully designed, full-stack web application for a home-based bakery in Sargodha, Pakistan. It allows customers to browse baked goods, add custom items to a cart, place orders, create accounts, and contact the bakery—all powered by a PHP and MySQL backend.

🚀 Features
Responsive UI: Warm, elegant design built with CSS Grid and Flexbox.

Dynamic Menu: Products with size/quantity options and real-time pricing.

Shopping Cart: LocalStorage-powered cart system with add/remove functionality.

User Authentication: Secure Signup and Login system with password hashing.

Order Management: Users can place orders, view order history, and receive confirmation.

Contact Form: Store customer messages directly into the database.

Social Media Integration: Quick links to Instagram, Facebook, and WhatsApp.

Customer Reviews: Auto-playing testimonial slider on the homepage.

� Screenshots
Below are sample screens from the Baking Mellow web app. Open the images from the `screenshots/` folder to preview the pages.

- Home: `screenshots/homee.jpeg`
- Menu: `screenshots/meenuu.jpeg`
- Cart / Checkout: `screenshots/cart (2).jpeg`, `screenshots/checkout (2).jpeg`
- Login / Signup: `screenshots/loginnn.jpeg`, `screenshots/signup.jpeg`
- Contact / Social: `screenshots/contactus.jpeg`, `screenshots/social.jpeg`

�📁 Project Structure
text
baking-mellow/
│
├── home.html              # Landing page with hero section and reviews
├── about.html             # "Our Story" page
├── menu.html              # Product catalog with add-to-cart logic
├── cart.html              # Shopping cart page
├── checkout.html          # Order summary and payment processing
├── checkout_process.php   # Backend logic to save orders to DB
├── place_order.php        # Alternate order processing script
├── order_success.php      # Thank you page after placing an order
├── my_orders.php          # User-specific order history
├── order.html             # Customer account login/register page
├── login.html             # Secure login interface
├── signup.html            # New user registration form
├── signup.php             # Backend script to register users
├── social.html            # Social media links page
├── contact.html           # Contact form for customer messages
├── contact2.php           # Backend to save contact messages
├── demo_db.sql            # Complete database schema
├── db.php                 # Database connection file
└── assets/                # Images (logo.jpg, cakes, cupcakes, etc.)
🗄️ Database Setup
1. Create the Database
Open phpMyAdmin (or your SQL client) and run the demo_db.sql file provided in the project. It will create:

users – For storing customer accounts.

orders – For tracking purchases.

contact_messages – For storing form submissions.

2. Configure Connection
The database connection is set in db.php. Update the credentials if needed:

php
$conn = mysqli_connect("localhost", "root", "", "demo_db");
📄 Page-by-Page Guide
1. home.html – Homepage
Purpose: Introduces the bakery, highlights products, and displays customer testimonials.

Key Features:

Hero section with 3 collaged images and brand story.

6 product cards (Cakes, Cupcakes, Donuts, Brownies, Bouquets, Baskets).

Auto-playing review slider with 4 customer reviews.

2. about.html – About Us
Purpose: Tells the story of Baking Mellow.

Content: Includes the bakery's origin, mission, and commitment to quality.

3. menu.html – Product Catalog
Purpose: Displays the full product list with add-to-cart functionality.

Key Features:

Each product has a radio-button selection for size/quantity.

Quantity increment/decrement buttons.

"Add to cart" saves item details (name, option, price, qty) to localStorage.

4. cart.html – Shopping Cart
Purpose: Shows all items added to the cart.

Key Features:

Table displaying product, option, quantity, price, and remove button.

Calculates total price automatically.

"Proceed to Checkout" button redirects to checkout page.

If cart is empty, displays "Your cart is empty 😢".

5. checkout.html – Order Confirmation
Purpose: Final review before placing the order.

Key Features:

Displays summary of all cart items.

Shows grand total.

"Confirm & Pay" button sends order to checkout_process.php.

6. checkout_process.php – Order Backend
Purpose: Inserts the order into the orders table.

Logic:

Checks if the user is logged in ($_SESSION['user_id']).

Binds user_id and total and inserts into the database.

Returns "SUCCESS" or an error message.

7. order_success.php – Thank You Page
Purpose: Displays confirmation after successful payment.

Features:

Shows Order ID, status, total paid, and order date.

"Return to Home" and "View All Orders" buttons.

8. my_orders.php – Order History
Purpose: Displays all past orders for the logged-in user.

Features:

Fetches orders from the database using user_id.

Displays Order ID, Total Amount, and Date in a responsive table.

9. login.html – User Login
Purpose: Login interface for returning customers.

Features:

Simple form with First Name, Last Name, and Password fields.

Link to signup.html for new users.

10. signup.html – Registration
Purpose: New user registration form.

Features:

Fields: First Name, Last Name, Email, Password, Confirm Password.

Form submits to signup.php.

11. signup.php – Registration Backend
Purpose: Validates input and securely stores user data.

Logic:

Checks if passwords match.

Hashes password using password_hash().

Inserts into the users table.

Redirects to login.html on success.

12. order.html – Customer Account Page
Purpose: A combined login and create account page for easy access.

Features:

Two side-by-side cards: Login (email/password) and Create Account (full name, email, password).

13. social.html – Social Media Links
Purpose: Bridges customers to the bakery's social profiles.

Cards: Instagram (Follow), Facebook (Visit Page), WhatsApp (Chat Now).

Icons: Uses Font Awesome.

14. contact.html – Contact Form
Purpose: Let customers send inquiries.

Fields: Name, Email, Message.

Backend: Sends data to contact2.php for insertion into contact_messages table.

15. contact2.php – Contact Backend
Purpose: Sanitizes input and stores messages in the database.

Result: Displays a JavaScript alert on success and redirects back to contact.html.

16. place_order.php – Alternate Order Logic
Purpose: Similar to checkout_process.php but used for testing or fallback.

Requires: user_id from session and total_price from POST.

17. db.php – Database Connector
Purpose: Centralized connection file for all PHP scripts.

Usage: include 'db.php'; in every backend script.

18. demo_db.sql – Full Schema
Contains all SQL commands to create:

users table

orders table

contact_messages table

Foreign key relationship: orders.user_id references users.id

19. summary.html – Static Order Confirmation
Purpose: A static fallback page in case the dynamic order page fails.

Note: Used primarily as a template.

🧪 How to Run This Project
Install XAMPP (or any local PHP/MySQL server).

Place the project folder inside htdocs (XAMPP) or www (WAMP).

Open phpMyAdmin and import demo_db.sql.

Update db.php if your database credentials are different.

Run the project by visiting http://localhost/baking-mellow/home.html.

🛠️ Technologies Used
Frontend: HTML5, CSS3, JavaScript (ES6)

Backend: PHP (7.4+)

Database: MySQL

Storage: LocalStorage (cart)

Design: Georgia font, warm earthy color palette

👩‍🍳 Author
MEERAB IMRAN
Powered by Baking Mellow © 2025

📌 Future Improvements
Admin dashboard for managing orders and messages.

Email notifications for orders.

Real payment gateway integration (Stripe/JazzCash).

Product image gallery and zoom feature.