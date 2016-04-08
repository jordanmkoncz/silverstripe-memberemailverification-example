# SilverStripe Member Email Verification Example

This repository provides an example project that uses the [SilverStripe Member Email Verification Module](https://github.com/jordanmkoncz/silverstripe-memberemailverification) so that Members are required to validate their email address before they can log in.

## Usage

To set up this example project:

 - `git clone https://github.com/jordanmkoncz/silverstripe-memberemailverification.git`
 - `cd path/to/cloned/repository`
 - `composer install`

## About

 - In `mysite/_config/config.yml` we define the `Email.admin_email` setting, which is the email address that verification emails are sent from.
 - In `mysite/_config/routes.yml` we define a route to the `ProfileController`.
 - In `mysite/code/ProfileController.php` we define a Controller that provides a `register` action to allow new users to register via the `RegisterForm`, and a `verify` action that displays a message to users who have just registered to tell them they need to verify their email address.
 - In `themes/simple/templates/Layout/ProfileController_register.ss` we define the template for the `ProfileController` `register` action.
 - In `themes/simple/templates/Layout/ProfileController_verify.ss` we define the template for the `ProfileController` `verify` action.