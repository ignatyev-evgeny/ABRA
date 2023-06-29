<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Faa726eb7-f1de-4703-9e5d-19cd899b574b%3Fdate%3D1&style=for-the-badge"></a>
</p>

**Demo**: http://abra.ignatyev.pro

## ABRA - Test task

#### Target of the task

To develop a trading platform consisting of 2 pages:

- Main page - where 6 products will be placed, every product must have: name, image, price and “Add to basket” button
- Basket - on this page, showing only the products that the member added to his cart.

On the top part of all pages, would be the button “My basket” which shows count of the products in the cart, and will
add a new product in the cart, changing count of products in the cart should be dynamically (without refreshing the
page).

#### Additional:

- Member registration
- Member authentication (Login and Password)
- Saving the member's shopping cart

## What is done?

### Project pages

- **Registration**
- **Authorization**
- **Auth area**
    - **List & Delete users baskets**
    - **List & Add & Delete products in shop**
- **Member area**
    - **Main page (list products)**
    - **Basket**

### More about pages

- **Registration** - opportunity to register. Required fields: Username and Email.
- **Authorization** - the ability to authenticate the user in the account
- **Admin area**
    - **List baskets** - table for viewing the list of user baskets, with the ability to delete.
    - **List products** - a table for viewing existing products, with the ability to delete a product and
      create a new product.
- **Member area**
    - **Main page** - main page, with a list of products and the ability to add a product to the cart. The
      item counter in the navbar is updated dynamically.
    - **Basket page** - page for viewing the list of goods added to the cart.