<?php
/*Functii folosite pt plante */
function add_plant($con, $plant_data)
{
    array_walk($plant_data, 'array_clean');
    $fields = '`' . implode('`, `', array_keys($plant_data)) . '`';
    $data = '\'' . implode('\', \'', $plant_data) . '\'';
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $_FILES["photo"]["name"]);
    return mysqli_query($con, "INSERT INTO `plants` ($fields) VALUES ($data)");
}
function plant_exists($con, $user, $plant)
{
    $name = clean($plant);
    $user_id = clean($user);
    $query = mysqli_query($con, "SELECT COUNT(`id`) FROM `plants` WHERE `name` = '$name' and `id_user` = '$user_id'");
    $result = mysqli_fetch_array($query);
    return $result[0] > 0 ? true : false;
}
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
        </tr>';
    } else {
        $filtered = isset($_GET['submit']);

        //daca nu sunt puse filtre
        if ($filtered == false)
            $query = "SELECT * FROM plants where id_user='$id'";
        else if ($filtered == true) {
            $filters = array(
                'region' => $_GET['region'],
                'color' => $_GET['color'],
                'uses' => $_GET['uses'],
                'others' => $_GET['others'],
                'name' => $_GET['search'],
            );
            $sort = $_GET['sort'];

            //construiesc un query concatenand filtrele alese
            $query = "SELECT * FROM plants where id_user='$id'";
            foreach ($filters as $key => $value) {
                if ($value != "All" && $value != null)
                    $query = $query . " and $key='$value'";
            }
            if ($sort != "-")
                $query = $query . " order by $sort desc";
        }
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $queryalbums = "SELECT name,id FROM albums WHERE id_user='$id'";
            $resultalbums = mysqli_query($con, $queryalbums);
            echo '
					<tr>
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
                    <label>Add to album</label>
			        <form action="addtoalbum.php" method="GET" enctype="multipart/form-data">
                        <div><select name="album" class="button-addToAlbum shadow">
                         <option>None</option>';
            while ($rowalbums = mysqli_fetch_array($resultalbums)) {
                echo '<option>' . $rowalbums['name'] . ' </option>';
            }
            echo '</select></div>
                    <input type="hidden" name="id_plant" value="' . $row['id'] . '"/>
                    <input type="submit" value="Add" class="button-addToAlbum shadow"/>
                    </form>
                    <a class="button-delete shadow" href="delete.php?id=' . $row['id'] . '">Delete</a>
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
        $filtered = isset($_GET['submit']);
        //daca sunt filtrate categoriile, afisez filtrul ales primul
        if ($filtered == true) {
            echo '<option> ' . $_GET[$category] . '</option>';
            if ($_GET[$category] != "All")
                echo '<option>All</option>';
            $query = "SELECT DISTINCT $category FROM plants where id_user='$id'";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row[$category] != $_GET[$category])
                    echo '<option> ' . $row[$category] . '</option>';
            }
        } else { //afisez filtrele normal
            echo '<option>All</option>';
            $query = "SELECT DISTINCT $category FROM plants where id_user='$id'";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<option> ' . $row[$category] . '</option>';
            }
        }
    }
}