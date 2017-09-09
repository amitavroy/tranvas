<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/amitavroy/tranvas"><img src="https://travis-ci.org/amitavroy/tranvas.svg" alt="Build Status"></a>
</p>

# About Tranvas

This is a Demo application which I am building along with
my Youtube Channel video tutorials.

This is a WIP project.

## User Registration and Login
Right now, I am using the default Laravel's Auth scaffolding to handle the entire user registration and login 
functionality. This also takes care of the forgot password functionality which comes by default.

## Events
Right now any User can create events and can see the listing of all the events. Every event will have details like 

- Event start date
- Event end date
- Location - this is a Google Map based selection widget to save the lat and lng of the location

![Events](https://d1067y8t86k9le.cloudfront.net/wp-content/uploads/2017/09/09213758/Screen-Shot-2017-09-09-at-9.37.25-PM.png)

## User profile
A User apart from editing the profile can also set the location using the Google Map widget which will save the lat long
on the user table. 