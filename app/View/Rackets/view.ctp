<table>
    <tr>
        <td>Maker</td>
        <td><?= $racket['Maker']['name']; ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?= $racket['Racket']['name'] ?></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?= number_format($racket['Racket']['price']).'円' ?></td>
    </tr>
    <tr>
        <td>Weight</td>
        <td><?= number_format($racket['Racket']['weight']).'g' ?></td>
    </tr>
</table>
