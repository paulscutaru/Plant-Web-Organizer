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
function show_recommended_albums($con)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM recommended_albums";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    if ($count[0] == 0) {
        echo '<tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        </tr>';
    } else {
        $query = "SELECT id FROM recommended_albums";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $query2 = "SELECT * FROM albums where id_user!=$id and id=" . $row['id'];
        while ($row = mysqli_fetch_array($result))
            $query2 = $query2 . " or id=" . $row['id'];
        $result = mysqli_query($con, $query2);
        while ($row = mysqli_fetch_array($result)) {
            $id_album = $row['id'];
            $queryplants = "SELECT photo,name FROM plants WHERE id_album=$id_album";
            $resultplants = mysqli_query($con, $queryplants);
            echo '
					<tr>
                    <td><img src="images/' . $row['photo'] . '" alt="image"/></td>
                    <td> ' . $row['name'] . ' </td>
                    <td>';
            while ($rowplants = mysqli_fetch_array($resultplants)) {
                echo  '
                    <div class="displayblock">
                    <img class="small-image" src="images/' . $rowplants['photo'] . '" alt="image"/>
                    <label>' . $rowplants['name'] . '</label>
                    </div>';
            }
            echo
                '</td>
					<td>
					<a class="button-addToAlbum shadow" href="getalbum.php?id=' . $row['id'] . '">Get this album</a>
					<a class="button-delete shadow" href="deleterecommended.php?id=' . $row['id'] . '">Delete</a>
					</td>
					</tr>';
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
        <td> - </td>
        </tr>';
    } else {
        $query = "SELECT * FROM albums where id_user='$id'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $id_album = $row['id'];
            $queryplants = "SELECT photo,name FROM plants WHERE id_user=$id AND id_album=$id_album";
            $resultplants = mysqli_query($con, $queryplants);
            echo '
					<tr>
                    <td><img src="images/' . $row['photo'] . '" alt="image"/></td>
                    <td> ' . $row['name'] . ' </td>
                    <td>';
            while ($rowplants = mysqli_fetch_array($resultplants)) {
                echo  '
                    <div class="displayblock">
                    <img class="small-image" src="images/' . $rowplants['photo'] . '" alt="image"/>
                    <label>' . $rowplants['name'] . '</label>
                    </div>';
            }
            echo
                '</td>
					<td>
					<a class="button-addToAlbum shadow" href="sharealbum.php?id=' . $row['id'] . '">Share</a>
					<a class="button-delete shadow" href="deletealbum.php?id=' . $row['id'] . '">Delete</a>
					</td>
					</tr>';
        }
    }
}
function show_user_name($con)
{
    $id = $_SESSION['user_id'];
    $query = mysqli_query($con, "SELECT `username` FROM `users` WHERE `id` = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result[0];
}
