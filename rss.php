<?php
/*Script care genereaza dinamic rss feed */
include 'core/init.php';
protected_page();
header("Content-Type: text/xml");
$query = mysqli_query($con, "SELECT `name`, COUNT(*) AS cnt
        FROM `plants`
        GROUP BY `name`
        ORDER BY cnt DESC
        LIMIT 5");
$result = mysqli_fetch_all($query);
echo '<?xml version="1.0" encoding="utf-8" ?>
            <rss version="2.0">
                <channel>
                    <title>Top 5 most popular plants</title>
                    <description>RSS Feed</description>
                    <language>en-us</language>';
                     foreach($result as $row)
                        echo '
                        <item>
                            <title>' . $row[0] . '</title>
                            <description>Count=' . $row[1] . '</description>
                        </item>';
echo '
                </channel>
             </rss>';
