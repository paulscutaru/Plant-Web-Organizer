<?php
/*Functii folosite pt albume */

/*Adauga un album in baza de date apoi returneaza id-ul acestuia*/
function add_album($con, $album_data)
{
    array_walk($album_data, 'array_clean');
    $fields = '`' . implode('`, `', array_keys($album_data)) . '`';
    $data = '\'' . implode('\', \'', $album_data) . '\'';
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $_FILES["photo"]["name"]);
    mysqli_query($con, "INSERT INTO `albums` ($fields) VALUES ($data)");
    $id = mysqli_fetch_array(mysqli_query($con, "SELECT LAST_INSERT_ID()"));
    return $id[0] > 0 ? $id[0] : false;
}

/*Returneaza daca un album exista deja*/
function album_exists($con, $user, $album)
{
    $name = clean($album);
    $user_id = clean($user);
    $query = mysqli_query($con, "SELECT COUNT(`id`) FROM `albums` WHERE `name` = '$name' and `id_user` = '$user_id'");
    $result = mysqli_fetch_array($query);
    return $result[0] > 0 ? true : false;
}

/*Primeste numele albumului si ii returneaza id-ul*/
function get_album_id($con, $name, $id_user)
{
    $query = mysqli_query($con, "SELECT `id` FROM `albums` WHERE `name` = '$name' and `id_user`=$id_user");
    $result = mysqli_fetch_array($query);
    return $result[0];
}

/*Functie de render albume*/
function show_albums($con)
{
    $id = $_SESSION['user_id'];
    /*Verific intai daca exista inregistrari*/
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
            /*Afiseaza albumul*/
            echo '
					<tr>
                    <td><img src="images/' . $row['photo'] . '" alt="image"/></td>
                    <td> ' . $row['name'] . ' </td>
                    <td>';
            /*Afiseaza plantele din album */
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
                        <div>
                        <a class="button-addToAlbum shadow" href="sharealbum.php?id=' . $row['id'] . '">Share</a>
                        </div>
					    <a class="button-delete shadow" href="deletealbum.php?id=' . $row['id'] . '">Delete</a>
					</td>
					</tr>';
        }
    }
}

/*Functie de render albume recomandate */
function show_recommended_albums($con)
{
    $id = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM recommended_albums";
    $count = mysqli_fetch_array(mysqli_query($con, $query));
    /*Verific intai daca exista inregistrari */
    if ($count[0] == 0) {
        echo '<tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        <td> - </td>
        </tr>';
    } else {
        /*Selectez toate albumele de la recomandate */
        $query = "SELECT id FROM recommended_albums";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        /*Selectez apoi doar albumele care nu apartin userului logat */
        $query2 = "SELECT * FROM albums where id_user!=$id and id=" . $row['id'];
        while ($row = mysqli_fetch_array($result))
            $query2 = $query2 . " or id=" . $row['id'];
        $result = mysqli_query($con, $query2);
        //Afisare albume recomandate
        while ($row = mysqli_fetch_array($result)) {
            $id_album = $row['id'];
            $queryplants = "SELECT photo,name FROM plants WHERE id_album=$id_album";
            $resultplants = mysqli_query($con, $queryplants);
            /*Afisez albumul */
            echo '
					<tr>
                    <td><img src="images/' . $row['photo'] . '" alt="image"/></td>
                    <td> ' . $row['name'] . ' </td>
                    <td>';
            /*Afisez plantele din album */
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
