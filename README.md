# emergency_waitlist
Hospital Triage Web App


DEVELOPE INSTRUCTION:

IAM ON A MAC SO I HAVE THE INSTRUCTION FOR THAT PLATFORM


Step 1: Install postgresql the database that is being used

brew install postgresql (I used homebrew package manager)


Step 2: Start the postgres database

brew services start postgresql


Step 3: Create the database

createdb emergency_waitlist



Step 4: connect to the database

psql -d emergency_waitlist (on the terminal iam aslo assuming that there is no password setup on the user or database)

Step 5: Add tables and tuples

The database image is located in Database/database.txt

It also has some basic tuples of patients and admin that you can add in the database


Step 6: SetUp the database connectivety with the php backend

inside the Database folder in database.php change the $username variable to your user (it should be either 'postgres' or if 

installed with homebrew it will be your user of your mac)

add $password if your user has a password



Step 7: Download php on your computer 


Step 8: On the terminal go to the root of the project ../emergency_waitlist


Step 9: Start the php local host server 

php -S localhost:4000



Step 10: Go on your web broswer and acces the website 

http://localhost:4000



ADMIN INSTRUCTION:


You can login using your Admin ID as a username and your password as your password

(username: aaa password: test is an exemple of an admin)


You have four option:


1. Check the patient queue 

You can see the patient queue and all the info of the patient 

When youve finished work with a patient you can press the delete patient button to remove them from the queue


2. Register an admin 

enter all required filed then press the submit button to create an new admin


3. Register a patient 

enter all required filed then press the submit button to create an new patient 


4. LOGOUT


PATIENT INSTRUCTION:

You can login using your name as a username and your Patient ID as your password

(username: patient1 password: 1 is an exemple of a patient)


When logged in you can see where you are in the queue you can see all your info and you can logout
