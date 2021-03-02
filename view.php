
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO List</title>
</head>
<body>
    <h1>TODO List</h1>
    <p>A simple CRUD application using PHP, MySQL and HTML following the MVC(Model-View-Controller) pattern.</p>

    <?php if ($action == 'edit' && ! empty($edit_todo)) { ?>

    <form action="?action=update" method="POST">
        <input type="hidden" name="id" value="<?=$edit_todo['id']?>">
        <input type="text" name="item" value="<?=$edit_todo['item']?>">
        <button type="submit">Update</button>
    </form>

    <?php } else { ?>

    <form action="?action=create" method="POST">
        <input type="text" name="item">
        <button type="submit">Add</button>
    </form>

    <?php } ?>

    <ol>

        <?php foreach($todo_list as $todo) { ?>

        <li><?=$todo['item']?> 
            <a href="?action=edit&id=<?=$todo['id']?>">Edit</a> 
            <a href="?action=delete&id=<?=$todo['id']?>">Delete</a>
        </li>

        <?php } ?>

    </ol>
</body>
</html>