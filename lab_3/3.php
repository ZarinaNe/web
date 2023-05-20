<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Доска объявлений</title>
</head>
<body>
<h1>Доска объявлений</h1>

<form action="add_announcement.php" method="post">
    <label>Email:</label>
    <input type="email" name="email" required>



    <label>Категория:</label>
    <select name="category" required>
        <?php
        $categories = scandir("announcements");
        foreach ($categories as $category) {
            if ($category != "." && $category != "..") {
                echo "<option value=\"$category\">$category</option>";
            }
        }
        ?>
    </select>



    <label>Заголовок объявления:</label>
    <input type="text" name="title" required>



    <label>Текст объявления:</label>

    <textarea name="text" rows="10" required></textarea>



    <input type="submit" value="Добавить">
</form>

<hr>

<table>
    <tr>
        <th>Email</th>
        <th>Категория</th>
        <th>Заголовок объявления</th>
        <th>Текст объявления</th>
    </tr>
    <?php
    $categories = scandir("announcements");
    foreach ($categories as $category) {
        if ($category != "." && $category != "..") {
            $announcements = scandir("announcements/$category");
            foreach ($announcements as $announcement) {
                if ($announcement != "." && $announcement != "..") {
                    $title = pathinfo($announcement, PATHINFO_FILENAME);
                    $text = file_get_contents("announcements/$category/$announcement");
                    echo "<tr><td>$email</td><td>$category</td><td>$title</td><td>$text</td></tr>";
                }
            }
        }
    }
    ?>
</table>
</body>
</html>