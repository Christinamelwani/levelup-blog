# Admin User homework

Even though Thursday's lecture wasn't entirely about authorization, this homework **is** again all about authorization.

In the previous homework you were tasked with making the articles and commments readable to everyone, while only authenticated users could post new posts and edit their previous posts.
In this homework you are tasked with improving this functionality by introducing a concept of an admin user.

Admin user should be able to edit all articles and comments, even those posted by other users.
Admin user should **not** be able to create new articles and comments in the name of other people.

There is no need to create a separate endpoint for "admin registration", instead you can just create one admin user via database seeding.

# Submitting solutions

As usual, to submit the homework for grading you should:

* starting from your previous homework branch, create a new branch named `LVLUP-xxxx-admin-user`
* you should start from previous authorization homework branch since you will need a lot of things from there
* implement the admin user homework
* when done, create a MR from your admin user homework branch back to the branch you started from (previous authorization homework)
* assign Luka as the MR reviewer
* assign Luka on Jira ticket

# Recommended reading

This homework shouldn't be too difficult since a lot was demonstrated in the lectures, so make sure to use the extra time homework read up on authorization documentation:

* https://laravel.com/docs/9.x/authorization
