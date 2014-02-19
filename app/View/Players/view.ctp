<h1>Player Profile</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Nationality</th>
            <th>Hometown</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $player['Player']['name'] ?></td>
            <td><?= $player['Profile']['nationality'] ?></td>
            <td><?= $player['Profile']['hometown'] ?></td>
        </tr>
    </tbody>
</table>