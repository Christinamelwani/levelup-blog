# Laravel Homework Monday

You are tasked with making the following changes to the blog presented in the lecture:

1. besides `title`, `slug` and `content`, `summary` should also be stored for each article
2. `summary` can be provided by the user, but if is not then summary should be just the first sentence of `content` (sentences are ended with a dot)
3. the articles should still be creatable through both API and `create` form with the same behavior
4. the front page should display articles with shortest `title` first
5. the front page `/` should only display 5 articles, no matter how many there are in the database
6. the first article displayed on the front page should have gray background and the text inside it should be slightly bigger
7. add a "Back to top" button at the bottom of the front page

From these tasks you should gain the following experience:

1. changing Eloquent models
2. how to use optional fields in an API
3. importance of making backwards-compatible changes
4. working with Laravel collections: sorting
5. working with Laravel collections: slicing
6. providing custom attributes in Blade views
7. anchor tags

If at any point during the homework you get stuck, consult the [ultimate Laravel learning resource](https://laracasts.com/series/laravel-8-from-scratch):

Before you start working on the homework, make sure that you put your homework ticket into `In progress` column (to get used to this).
Take the git branch used in Mondays lecture `laravel-lecture-2`, and create a new branch based on it.
The name of the new branch should, as usual, be `LVLUP-XXXX-whatever...` and contain the ID of your homework ticket.
When done with the homework, commit the changes and make a MR on your fork of the repo. After that, comment the MR link on the ticket and assign Luka as the reviewer.
