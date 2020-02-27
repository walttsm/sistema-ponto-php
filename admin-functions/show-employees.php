<div class="table table-top">
    <table>
        <tr>
            <th>nome</th>
            <th>password</th>
            <th>id</th>
        </tr>
        <?php
        //Requesting table from server
        $query = "SELECT * FROM funcionarios";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr><td class="cell">' . $row["nome"] . '</td><td class="cell"> ' . $row["password"] . '</td><td class="cell"> ' . $row["id"] . '</td></tr>';
        }
        ?>
    </table>
</div>