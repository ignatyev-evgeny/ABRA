<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

- **Registration** _[pic. #1]_ - opportunity to register. Required fields: Username and Email.
- **Authorization** _[pic. #2]_ - the ability to authenticate the user in the account
- **Admin area**
    - **List baskets** _[pic. #3]_ - table for viewing the list of user baskets, with the ability to delete.
    - **List products** _[pic. #4]_ - a table for viewing existing products, with the ability to delete a product and
      create a new product.
- **Member area**
    - **Main page** _[pic. #5]_ - main page, with a list of products and the ability to add a product to the cart. The
      item counter in the navbar is updated dynamically.
    - **Basket page** _[pic. #6]_ - page for viewing the list of goods added to the cart.