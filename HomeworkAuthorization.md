# Authorization homework

In the lectures we demonstrated how to implement authorization capabilities for `Comments`.
Your task for this homework is to expand these authorization capabilities to cover all aspects of the application we have so far.

The exact details are left up to you, but here are some guidelines about what you might implement:

* everyone should be able to read articles and comments, even if they are not authenticated
* unauthenticated users should not be able to create, update or delete articles and comments
* authenticated users should not be allowed to post articles or comments under the name of other users
* authenticated users should not be allowed to edit articles or comments belonging to other users

These are minimum requirements required to consider this homework solved, but feel free to get fancy and implement other features.

Note: parts of `Comment` authorization have been implemented in the lecture. You can merge `upstream/laravel-lecture-authorization` to your `origin/main` if you want to use that code,
or you can follow along in the lectures and write it yourself. Whatever you choose, it should be clear that both comments and articles should have proper authorization.

# Submitting solutions

As usual, to submit the homework for grading you should:

* starting from your `origin/main`, create a new branch named `LVLUP-xxxx-authorization-homework`
* implement the task from the homework
* when done, create a MR from your homework branch back to the `origin/main` branch in your repo
* assign Luka as the MR reviewer
* assign Luka on Jira ticket

# Recommended reading

This homework shouldn't be too difficult since a lot was demonstrated in the lectures, so make sure to use the extra time homework read up on authorization documentation:

* https://laravel.com/docs/9.x/authorization

The homework for tomorrow (Tuesday) will be to add an `admin` user to the website which can do every action on the site,
and you will need the extra knowledge found in the documentation to solve it so I advise to prepare early.
