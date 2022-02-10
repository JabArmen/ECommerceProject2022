# Project Proposal 



* Title: SussyKeychains
* Purpose: A web website for selling different types of keychains.
## Description
* The website will have two types of users, admin and regular user. 
    * Admin:
        * Access to all the users inforamtion except their passwords
        * Ability to delete user accounts
        * Ability to add new products, and set their price, describtion and image
    * User:
        * Being able to create a user account by registering it Required:
            * Username
            * Password
            * Confirming password
            * Email
            * Adress 
            * A security question and answer for it.
        * Access to the products on the web site
        * Abitlity to save them in their cart 
        * Pay for the products located in their cart
        * Changing their password if they are able to answer a question that they set in 
* Pages:
    * Login page: 
        * Two input text forms and their labels
        * One submit button: The system will check for their infromation and open the right account, if the account with the infromation doesn't exist will show an alert message 
        * Link to the regester page
            * Onclick: they will be redirected to the register page
        
    * Register page: 
        * Input texts for all the information required to register 
        * Submit button to create the account with all the data. If there is something wrong in the inputed data, an alert message will be displayed 
    * Adming page with all the features that admin user needs.
    * User main page:
        * Menu bar with search option, a link to the cart page and the logo of company
            * Logo onclick will refresh the page
            * Search bar will search item using regex
            * Cart logo link will redirect the user to their card
        * Displayed all the products in different divs one on the
        other's side.
            * Image of the product
            * Paragraph describtion of it
            * A button to add it to the cart.
    * Cart page:
        * List of all the productes added by the user to their cart.
            * Small image 
            * Name of the product 
            * Price of the product
        * Total price written on the bottom of the list 
        * Submit button  
    * Payment page:
        * Input texts for credit card information (Credit card number, expiration date, security number) 
        * Final Price (With additional 6$ for shipment and 15% of taxes)
        * Submit Button: if the input text information is not correctly formated, alert message will show up. If everything is correct, it will show a message saying that everything went good and if the user want to go back to the main page to continue their shoping. 

    

