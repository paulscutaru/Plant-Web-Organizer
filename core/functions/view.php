<?php
/*Functii de render*/
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
        $filtered = isset($_POST['submit']);
        
        //daca nu sunt puse filtre
        if ($filtered == false) 
            $query = "SELECT * FROM plants where id_user='$id'";
        else if ($filtered == true) {
            $filters = array(
                'region' => $_POST['region'],
                'color' => $_POST['color'],
                'uses' => $_POST['uses'],
                'others' => $_POST['others'],
            );
            $sort = $_POST['sort'];

            //construiesc un query concatenand filtrele
            $query = "SELECT * FROM plants where id_user='$id'";
            foreach ($filters as $key => $value) {
                if ($value != "All")
                    $query = $query . " and $key='$value'";
            }
            if($sort != "-")
                $query = $query . " order by $sort desc";
        }

        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
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
        
        echo '<option>All</option>';
        $query = "SELECT DISTINCT $category FROM plants where id_user='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<option> ' . $row[$category] . '</option>';
        }
    }
}
function show_albums($con)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM albums where id_user='$id'";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    if ($count[0] == 0) {
        echo '<tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        </tr>';
    } else {
        $query = "SELECT * FROM albums where id_user='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '
					<tr>
                    <td>
                    <img src="images/' . $row['photo'] . '" alt="image"/>
                    </td>
					<td> ' . $row['name'] . ' </td>
					<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow"><a href="deletealbum.php?id=' . $row['id'] . '">Delete</a></button>
					</td>
					</tr>';
        }
    }
}
