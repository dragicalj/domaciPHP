<?php

require "dbBroker.php";
require "model/prijava.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: indeks.php');
    exit();
}

$rezultat = Prijava::getAll($conn);

if (!$rezultat) {
    echo ("Neuspesna konekcija");
    die();
} else {



?>




    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <link rel="shortcut icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <title>Zakazivanje termina u kozmetickim salonima</title>

    </head>

    <body>

        <div class="div1">
            <h1>Zakazivanje termina u kozmetickim salonima</h1>
        </div> <br><br><br>

        <div class="row1">
            <div class="div3">
                <button id="vidi" class="btn_vidi"> Zakazani termini</button>
            </div><br>

            <div class="div4">
                <button id="prijavise" type="button" class="btn_prijavise" data-toggle="modal" data-target="#prikaziModal">Zakaži</button>


                <button id="btn-izmeni" type="button" class="btn_izmeni" data-toggle="modal" data-target="#izmeniModal">Izmeni</button>

            </div>

            <div class="div5">

                <input type="text" id="ulaz" onkeyup="nadji()" placeholder="Pretraži termine po kozmetickom salonu">

            </div><br>

            <br>

        </div>



        <div id="pregled" class="divp">



            <div class="div6">


                <table id="tabela" class="tabela" border="3">
                    <thead class="zaglavlje">
                        <tr>
                            <th scope="kolona">Kozmeticki salon</th>
                            <th scope="kolona">Lokacija</th>
                            <th scope="kolona">Datum</th>
                            <th scope="kolona">Kozmeticar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($red = $rezultat->fetch_array()) :
                            if ($red["user"] == $_SESSION['user_id']) {
                        ?>
                                <tr>
                                    <td><?php echo $red["kozmetickisalon"] ?></td>
                                    <td><?php echo $red["mesto"] ?></td>
                                    <td><?php echo $red["datum"] ?></td>
                                    <td><?php echo $red["kozmeticar"] ?></td>
                                    <td>
                                        <label class="oznaci">
                                            <input type="radio" name="cekiranje" value=<?php echo $red["id"] ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                </tr>
                    <?php
                            };
                        endwhile;
                    }
                    ?>
                    </tbody>
                </table>
                <div class="row">

                    <div class="div10">
                        <button id="uredi" class="btn_uredi" onclick="sortirajTabelu()">Sortiraj</button>
                    </div>
                    <div class="div10">
                        <button id="btn-obrisi" type="button" formmethod="post" class="btn btn-danger">Otkaži</button>
                    </div>

                </div>
            </div>
        </div>









        <div class="modal" id="prikaziModal" role="dialog">
            <div class="div12">


                <div class="modal-content" id="zakazi">
                    <div class="div14">
                        <button type="button" class="zatvori" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="div15">
                        <div class="fprijava">
                            <form action="#" method="post" id="dodajForm">
                                <h3>Zakaži</h3>
                                <div class="row">
                                    <div class="div16 ">

                                        <div class="form-group">
                                            <label for="">Kozmeticki salon: </label>
                                            <input type="text" name="kozmetickisalon" class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <label for="mesto">Mesto: </label>
                                            <input type="text" name="mesto" class="form-control" />
                                        </div><br>

                                        <div class="div18">
                                            <div class="form-group">
                                                <label for="">Datum: </label>
                                                <input type="date" name="datum" class="form-control" />
                                            </div>
                                        </div><br>


                                        <div class="form-group">
                                            <label for="">Kozmeticar: </label>
                                            <input type="text" name="kozmeticar" class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <button id="btnDodaj" type="submit" class="btn btn-success btn-block">Zakaži</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="modal" id="izmeniModal" role="dialog">
            <div class="div12">


                <div class="modal-content" id="izmeni">
                    <div class="div14">
                        <button type="button" class="zatvori" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="div15">
                        <div class="fprijava">
                            <form action="#" method="post" id="izmeniForm">
                                <h3>Izmeni</h3>
                                <div class="row">
                                    <div class="div16 ">

                                        <div class="form-group">
                                            <label for="">ID: </label>
                                            <input id="id" type="text" name="id" class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <label for="">Kozmeticki salon: </label>
                                            <input id="teretana" type="text" name="kozmetickisalon" class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <label for="mesto">Mesto: </label>
                                            <input id="lokacija" type="text" name="mesto" class="form-control" />
                                        </div><br>

                                        <div class="div18">
                                            <div class="form-group">
                                                <label for="">Datum: </label>
                                                <input id="datum" type="date" name="datum" class="form-control" />
                                            </div>
                                        </div><br>


                                        <div class="form-group">
                                            <label for="">Kozmeticar: </label>
                                            <input id="kozmeticar" type="text" name="kozmeticar" class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <button id="btnIzmeni" type="submit" class="btn btn-success btn-block">Izmeni</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>




        <script>
            function sortirajTabelu() {
                console.log("Pozvana");
                var table, rows, s, i, a, b, shouldS;
                table = document.getElementById("tabela");
                s = true;

                while (s) {
                    s = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldS = false;
                        a = rows[i].getElementsByTagName("td")[2];
                        b = rows[i + 1].getElementsByTagName("td")[2];
                        if (a.innerHTML.toLowerCase() > b.innerHTML.toLowerCase()) {
                            shouldS = true;
                            break;
                        }
                    }
                    if (shouldS) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        s = true;
                    }
                }
            }




            function nadji() {
                var unos, filter, table, tr, td, i, txtValue;
                unos = document.getElementById("ulaz");
                filter = unos.value.toUpperCase();
                table = document.getElementById("tabela");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>

    </body>

    </html>