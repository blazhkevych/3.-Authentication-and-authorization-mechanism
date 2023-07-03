# 3.-Authentication-and-authorization-mechanism

Exercise 1

This lab is an extension of the previous lab.

Introduction.

When writing websites, it is very often necessary to create an authentication and authorization mechanism that regulates the access of visitors to the resources of the site. In the previous lab, you created pages that can be used for this purpose. In this work, you are invited to add to those pages another one that allows you to perform verification of users entering the site.
What needs to be improved.

To the index.php, addUser.php and showUsers.php files, you need to add another file named login.php. This file should contain the user login form. Usually the login form is different from the registration form. To enter, it is enough to enter a username and password, while when registering, you often need to enter other values. In addition, in the registration form it is useful to create an additional field for re-entering the password.

Therefore, create a new login form in the login.php page.

When filling out this form and clicking the submit button on it, a check must be made to see if the incoming user is listed in the users.txt file. If the user with the login and password entered in the login form is in this file, display a message about successful login on the page, otherwise, display a message about access to the site being denied.

In addition, make sure that the password in the file is stored not in clear text, but in hashed form. If you have already stored users with cleartext passwords in the file, you will need to delete this file and register new users.

To check the login, write a function that accepts the username and password from the form. Upon successful verification of the incoming user, the function should return true, on unsuccessful - false.
