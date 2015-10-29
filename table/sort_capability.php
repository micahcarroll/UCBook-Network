<!--
Logic for sorting items in html tables
-->
<?php
echo <<<_END
<script type="text/javascript">
    // Creating a bunch of variables, one for each column
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

    // On load, gathers information about the table of books
    window.onload = function () {
        people = document.getElementById("book_parameters");
    }

    function sort_table(tbody, col, asc) {
        var rows = tbody.rows;
        var rlen = rows.length; // Number of rows
        var arr = new Array();
        var i, j, cells, clen;
        // Fill the array with values from the table
        for (i = 0; i < rlen; i++) {
            cells = rows[i].cells; // Cells of current row
            clen = cells.length;   // Number of cells in current row
            arr[i] = new Array();
            for (j = 0; j < clen; j++) {
                arr[i][j] = cells[j].innerHTML;
            }
        }
        // Sort the array by the specified column number (col) and order (asc) using custom sorting function
        arr.sort(
          function (a, b) {
            if (a[col] == b[col]){
              return 0;
            } else {
              if (a[col].toLowerCase() > b[col].toLowerCase()) {
                return asc;
              } else {
                return -1 * asc;
              }
            }
          }
        );

        // Replace existing rows with new rows created from the sorted array
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
