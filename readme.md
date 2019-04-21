## Admin dashboard アップデート
## admin/dashboard
## admin/shops
## admin/orders
## admin/users

    - C:\xampp\htdocs　にフォルダーをコピー、解凍してください。
    - freshのフォルダーの中からCommando Prompt を起動、php artisan migrate を打ってください。このステップでデータベースをアップデートします。
    - Commando Prompt でmysqlをアクセス、freshテーブルにadminのroleは'user'から'admin'にアップデートしてください。
    - また、Commando Prompt で php artisan serve を打ってアプリを起動します。
    - admin login URL: localhost:8000/admin です。

