## The Laughing Stock

This is a description for The Laughing Stock.

"The Laughing Stock" is a comedy blog site that offers a hilarious and
lighthearted take on current events, pop culture, and everyday life.
From witty satire to funny memes, this blog is dedicated to bringing
a smile to your face and brightening up your day with its clever humor
and comedic commentary. Join the fun and become a part of the Laughing Stock
community today!



********* Last updated: April 6, 2023, 2:40 PM JB *********
- generated PostController, CommentController, CategoryController
- made about view
- made contact view
- made the basic starting routes


********* Last updated: April 6, 2023, 3:55 PM CM *********
- Generated models for Category, Comment, Post, Report
- Connected articles and categories (hasMany/belongsTo)
- Basic routes to the CategoryController and PostController
- Created tables using artisan migrate for posts and categories
    - one will need to be made for comments as well I suppose
- created two test categories to test the table and route



********* Last updated: April 7, 2023, 1:00 PM JB *********
- updated CategoryController
- added create.blade.php in    resources/views/categories
- updated index.blade.php in   resources/views/categories
- created edit.blade.php in    resources/views/categories
- created CategoryRequest in   app/Http/Requests
- updated the category & posts routes in web.php (grouped all routes)
- updated PostController
- created posts directory      resources/views/posts
                               - created create.blade.php
                               - created index.blade.php
                               - created show.blade.php
- updated Category Model
- created edit.blade.php in    resources/views/categories
- created manage.blade.php in    resources/views/categories

We can now add new categories, delete categories and edit categories. We can now restore
deleted Posts and Categories, as well as force delete them. Once we finish the original assignment,
adding the other features will be much easier.

We are almost done the original assignment, and we can start adding features or even styling the
website by Monday or earlier.


** Artisan Commands Used **
- php artisan make:request CategoryRequest
- composer require laravel/ui="4.*"
- php artisan ui bootstrap
- npm install && npm run build
- php artisan ui:auth
- php artisan migrate
- php artisan make:migration add_softdeletes_to_categories --table=categories

!! ---- Files to Download From Remote Host ---- !!

- build folder (app/public/build)
- auth folder (public/views/auth)
- auth folder (app/Http/Controllers/Auth)
- posts folder (resources/views/posts)
- categories folder (resources/views/categories)
- PostController
- CategoryController
- Requests folder (app/Http/Requests)
- web.php
- add_softdeletes_to_categories from database/migrations
- add_softdeletes_to_posts from database/migrations

********* Last updated: April 8, 2023, 6:07 PM CM *********
- Uploaded Bootswatch: Solar to resources/css/bootstrap.min.css
- used https://techvblogs.com/blog/how-to-install-bootstrap-5-in-laravel-9-with-vite
    to download and get Solar theme working
    - Theme is not working colour-wise but the bootstrap 'btn' I added does look like a bootstrap button
- installed bootswatch, but theme is not loading and error is being shown

** Artisan Commands Used **
npm install bootstrap @popperjs/core
npm install sass --save-dev
npm install
npm run build
npm install bootswatch --save


!! ---- Files to Download From Remote Host ---- !!





********* Last updated: April 10, 2023, 10:30 AM JB *********
- added ReportController
- added Report Table
- Added Comments Table
- created a relationship between comments and reports, and commments and posts

Comments can now be added to specific posts, tracking the user and post id.
CRUD Functionality has been implemented.
We should be good to start styling this thing now??


** Artisan Commands Used **
- php artisan make:controller ReportController
- php artisan make:migration create_reports_table --create=reports
- php artisan make:migration add_comments_table --create=comments
- php artisan migrate
- added routes for comments
- added MVC components for Comments
- added CRUD to Comments




!! ---- Files to Download From Remote Host ---- !!

- web.php
- comments folder in        resources/views
- CommentController.php
- Comment.php in            app/Http/Models
** To be safe just redownload the entire Controllers and Models folder **




---------------------------------------------------------------------------------------------------------------------

********* Last updated: April 11, 2023, 4:30 PM JB *********
- added roles to users

Added a 'Roles' category to 'Users' table. Now, only admin level
users have the ability to delete Comments, Posts, Categories.



** Artisan Commands Used **
- php artisan make:migration add_role_to_users_table --table=users
- php artisan migrate


!! ---- Files to Download From Remote Host ---- !!

- add_roles_to_users_table.php
- comments.show.blade.php
- web.php
- views and controllers folders
- Requests folder



********* Last updated: April 12, 2023, 6:00 PM CM *********
- Time to Style!
- Used bootstrap to design blog posts and comments
- updated master so that the blog has a layout and header

- Need to link posts and users to display user name on blog post
- need to link comments and users to display user name on comment
- need to add @if admin stuff still


!! ---- Files to Download From Remote Host ---- !!
posts.index.blade.php
posts.show.blade.php
comments.show.blade.php
comments.create.blade.php
master.blade.php




********* Last updated: April 13, 2023,  10:30AM JB *********
- updated the posts.create.blade.php
- updated posts.show.blade.php to display the username of the posted user
- updated posts table to include author_username
- added username and pfp to user table
- restricted "manage" pages to admin users only
- comments now show the username of the posting user
- created a custom pagination view
- our pagination now works, not laravel's default implementation

********* Last updated: April 14, 2023,  10:30PM JB *********
- added tags to post and added some default tag options (thinking users should have more options but
for this assignment they can deal with 2)
- tags are displayed on posts
- added Delete Buttons to posts
- signed in users now cannot see the Login and Register buttons



!! ---- Files to Download From Remote Host ---- !!
- posts.show.blade.php
- posts.create.php
- PostController.php
- RegisterController
- (download views, Models, Controllers folders to be 100% safe)




********* Last updated: April 15, 2023, 8:00 PM CM *********
- Updated posts/index.blade to show only the first 250 characters of a given post
- Updated the posts controller to link related posts in the show function.
    - Updated the post/show.blade to show posts that share the same category
- Added a route to display our posts.index as the homepage '/'
- Updated master.blade to reflex the 'home' route

!! ---- Files to Download From Remote Host ---- !!
posts/index.blade
posts/show.blade
PostController
master.blade
routes/web.php


********* Last updated: April 15, 2023, 12:00 AM CM *********
- categories/index.blade to show cards
- added missing closing div to master
- categories/show and posts/index, delete button moved to top
- posts/show, comments/index, comments/show delete button changed to outline-warning

!! ---- Files to Download From Remote Host ---- !!
categories/index.blade
master.blade
categories/show.blade
posts/index.blade
posts/show.blade
comments/index.blade
comments/show.blade

********* Last updated: April 16, 2023, 4:00 PM CM *********
- Added links to new/manage posts/categories to master if logged in
- styled profiled picture on users/index to be square and margined
    - added link to that users posts
- made users/show look like category.show

!! ---- Files to Download From Remote Host ---- !!
master.blade
users/index.blade
users/show.blade


