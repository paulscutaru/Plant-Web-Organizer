<?php function show_users($con)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM users where id!=$id";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    if ($count[0] == 0) {
        echo '<tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        </tr>';
    } else {
        $query = "SELECT * FROM users where id!=$id";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $id_user = $row['id'];
            echo '
					<tr>
                    <td>' . $row['id'] . '</td>
                    <td> ' . $row['username'] . ' </td>
                    <td> ' . $row['password'] . ' </td>
                    <td> ' . $row['email'] . ' </td>
                    <td> ' . $row['date'] . ' </td>
                    <td> ' . $row['type'] . ' </td>
                    <td>
                    <div>
                    <a class="button-addToAlbum shadow" href="alteruser.php?id=' . $row['id'] . '&option=block">Block</a>
                    </div>
                    <div>
                    <a class="button-addToAlbum shadow" href="alteruser.php?id=' . $row['id'] . '&option=unblock">Unblock</a>
                    </div>
                    <div>
                    <a class="button-delete shadow" href="alteruser.php?id=' . $row['id'] . '&option=delete">Delete</a>
                    </div>
					</td>
					</tr>';
        }
    }
}