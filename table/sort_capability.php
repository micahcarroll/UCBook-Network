<?php
echo <<<_END
<script type="text/javascript">
    var people;
    var asc1 = 1;
    var asc2 = 1;
    var asc3 = 1;
    var asc4 = 1;
    var asc5 = 1;
    var asc6 = 1;
    var asc7 = 1;
    var asc8 = 1;
    var asc9 = 1;

    window.onload = function () {
        people = document.getElementById("people");
    }

    function sort_table(tbody, col, asc) {
        var rows = tbody.rows;
        var rlen = rows.length; // Number of rows
        var arr = new Array();
        var i, j, cells, clen;
        // fill the array with values from the table
        for (i = 0; i < rlen; i++) {
            cells = rows[i].cells; // Cells of current row
            clen = cells.length;   // Number of cells in current row
            arr[i] = new Array();
            for (j = 0; j < clen; j++) {
                arr[i][j] = cells[j].innerHTML;
            }
        }
        // sort the array by the specified column number (col) and order (asc)
          arr.sort(
        function (a, b) {
          return (a[col] == b[col]) ? 0 : ((a[col].toLowerCase() > b[col].toLowerCase()) ? asc : -1 * asc);
        }
        );

        // replace existing rows with new rows created from the sorted array
        for (i = 0; i < rlen; i++) {
            rows[i].innerHTML = "<td>" + arr[i].join("</td><td>") + "</td>";
        }
        var asc1 = 1;
        var asc2 = 1;
        var asc3 = 1;
        var asc4 = 1;
        var asc5 = 1;
        var asc6 = 1;
        var asc7 = 1;
        var asc8 = 1;
        var asc9 = 1;
    }
</script>
_END;
?>
