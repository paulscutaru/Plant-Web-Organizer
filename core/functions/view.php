<?php
function show_plants($con)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM plants where id_user='$id'";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    if ($count[0] == 0) {
        echo '<tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        </tr>';
    } else {
        $query = "SELECT * FROM plants where id_user='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '
					<tr>
                    <td> ' . $row['id'] . ' </td>
                    <td>
                    <img src="images/' . $row['photo'] . '" alt="image"/>
                    </td>
					<td> ' . $row['name'] . ' </td>
					<td> ' . $row['region'] . ' </td>
					<td> ' . $row['color'] . ' </td>
					<td> ' . $row['uses'] . ' </td>
					<td> ' . $row['others'] . ' </td>
					<td> ' . $row['date'] . ' </td>
					<td>
					<button class="button-addToAlbum shadow" id="add">Add to album</button>
					<button class="button-delete shadow"><a href="delete.php?id=' . $row['id'] . '">Delete</a></button>
					</td>
					</tr>';
        }
    }
}
function show_categories($con, $category)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT($category) FROM plants where id_user='$id'";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    if ($count[0] == 0)
        echo '<option>-</option>';
    else {
        $query = "SELECT DISTINCT $category FROM plants where id_user='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<option> ' . $row[$category] . '</option>';
        }
    }
}
