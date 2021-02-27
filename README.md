# FinalProjectPHP
recipe website using HTML5, CSS3, PHP, Bootstrap

It is a complete web application with a database using OOP in PHP and PDO class.
It is a web application that manages classified Recipes.
Each recipe is described by Name, recipeDate, PreparationTime, Servings, Ratings and so on.
Each recipe belongs to one category and one meal tpe. 
Each recipe has a list of ingridients(every ingridient is described by name and quantity)
Each recipe has a description and a picture.
 There are two types of users: 
 - visitors are not registered, can just search by category, mealtype and first letters in the name of the recipe, and view details of recipes.
 - members - registerd users, can view search anf view details of recipes. They need to login to access to extra functionalities like rate recipe and write a review about a recipe.
 
 If any user wants to become a member he must register by entering Username, Password.
 If the user forgets his password, a link is provided to reset his password.
 
 I used HTML and CSS, Bootstrap, PHP, MySQL DB, Singleton pattern( to restrict the number of instances that can be created to only one), Salted passwords
 
 What I would like to add to this application: 
 1. advanced serach by specifying ingridient
 2. add ingridients in the grocery list
 3. save images in database as blob type
 4. display videos of the recipes
 5. add the nutrition facts
 

 List of functionalities:
 registration
 login
 search by category, mealtype, word_in_recipe_name
 ratings and reviews
 
