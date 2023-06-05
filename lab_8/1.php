<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ads</title>
</head>
<body>
<h1>Ads</h1>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <br>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title">

    <br>

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <br>

    <label for="category">Category:</label>
    <input type="text" name="category" id="category">

    <br>

    <button type="submit">Submit</button>
</form>

<table>
    <thead>
    <tr>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ads as $ad): ?>
        <tr>
            <td><?php echo $ad['category']; ?></td>
            <td><?php echo $ad['title']; ?></td>
            <td><?php echo $ad['description']; ?></td>
            <td><?php echo $ad['email']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>