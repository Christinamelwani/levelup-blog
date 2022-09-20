# Laravel Homework Tuesday

Now that you've seen how `Article` is related to the `User`, it should be simple for you to implement `Comment`s on your blog!

To help you get started, here are some design pointers:

* article can have many comments
* user can post many comments
* comment belongs to a single author
* comment belongs to a single article

To make your life and testing slightly easier, make sure you create Comment seeder, factory and all other goodies
(hint, run `php artisan make:model --help` to see what kind of flags there are when creating a model).

If you want, you can update `article-card.blade.php` to also display comments underneath the articles, but consider this optional (I will not be grading how pretty your blogs looks like).

Even if you choose not to update article card, make sure that you avoid `N+1 problem` we discussed when loading comments.
An article can have many comments, so you don't want to access them one by one - unless you have an interactive page with "Show me more comments" which we will do later in the course :)

To start your homework, start working from `upstream/laravel-lecture-3` branch.
You should `git fetch` the branch from `upstream` and then `git push` it to `origin` to make it available there.
Create a commit containing your homework and then create a MR from your homework branch to `laravel-lecture-3` in your fork repository (`origin`).

When done, comment the MR link on the Jira ticket and assign Luka as the reviewer.

## Side note

I didn't mention it in the lecture, but in `Article.php` you will see that there is an `author` relationship defined as such:
```php
    public function author()
    {
        // this is a relationship towards User model, but we name it differently therefore we must use explicitly state key
        return $this->belongsTo(User::class, 'user_id');
    }
```

This makes it possible to write `$article->author`. It does the exact same thing as `$article->user`, but it might be bit clearer.
You can define as many relationships as you wish on each model, but if the name of the relationship (function) does not match
the name of the table model, then you need to tell Laravel what is the name of the foreign key.

In the above example, we define `author` relationship, which points to a user, but since we don't have `authors` table, we must tell Laravel
that `author` is an instance of `User::class` and that they are related through `user_id`.
