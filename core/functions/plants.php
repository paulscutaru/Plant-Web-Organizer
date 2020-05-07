<?php
    function add_plant($con, $plant_data) {
        array_walk($plant_data, 'array_clean');
        $fields = '`' . implode('`, `', array_keys($plant_data)) . '`';
        $data = '\'' . implode('\', \'', $plant_data) . '\'';
        return mysqli_query($con,"INSERT INTO `plants` ($fields) VALUES ($data)");
    }
    function plant_exists($con, $user, $plant) {
        $name = clean($plant);
        $user_id = clean($user);
        $query = mysqli_query($con,"SELECT COUNT(`id`) FROM `plants` WHERE `name` = '$name' and `id_user` = '$user_id'");
        $result = mysqli_fetch_array($query);
        return $result[0] > 0 ? true : false;
    }
?>