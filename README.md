# For Instructions 
Please refer to AssignmentInstructions.pdf. 

Developed a fictional online dating site, "Nerdieluv," using HTML and PHP, with the following key features:
1.	Pages and Navigation:
-	Implemented index.php as the front page with header/footer and links to other pages.
-	Created pages: signup.php, signup-submit.php, matches.php, and matches-submit.php.
-	Utilized a common file, common.php, to store shared code used across multiple pages.
2.	Sign-Up Page (signup.php):
-	Designed a user-friendly sign-up form with fields for name, gender, age, personality type, favorite OS, and seeking age range.
-	Implemented radio buttons, text input boxes, a dropdown select box, and dynamic placeholder text.
-	Linked the personality type label to http://www.humanmetrics.com/cgi-win/JTypes2.asp.
3.	Processing Sign-Up (signup-submit.php):
-	Form data submitted to signup-submit.php via POST method.
-	Stored user data in singles.txt file using PHP's file_put_contents function, maintaining a specific data format.
4.	View Matches Page (matches.php):
-	Created a page with a form for existing users to log in and check their matches.
-	Form includes a labeled text box for the user to type their name, submitted as a query parameter on "View My Matches."
5.	Viewing Matches (matches-submit.php):
-	Displayed matches based on specified criteria: opposite gender, compatible ages, favorite OS, and common personality type.
-	Utilized PHP code to read the user's name from the query parameter and find matching records in singles.txt.
-	Organized matches with images, names, and details in a styled layout.
6.	Styling:
-	Employed styles from nerdieluv.css to ensure a consistent and visually appealing user interface.
