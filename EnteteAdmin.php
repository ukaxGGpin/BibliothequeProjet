<body>
<?php session_start();?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-sm navbar-custom">
                    <div class="search-input">
                        <form action="recherche.php" method="post" class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Nom de l'auteur" name="recherche">
                        </form>
                    </div>
                    <div class="search-btn">
                        <form action="recherche.php" method="post">
                            <button class="rounded-table btn btn-primary" type="submit">
                                Recherche &#128269;
                            </button>
                        </form>
                    </div>
                    <div class="panier-btn">
                        </form>
                        <br>
                        <form action="AjouteUnMembre.php">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Créer un compte</button>
                            </div>
                        </form>
                        </td>
                        </tr>
                        </table>
                    </div>
                    <div class="panier-btn">
                    </form>
                    <br>
                    <form action="AjouterUnLivre.php">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">ajouter un livre</button>
                        </div>
                    </form>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
            <div class="logo">
                <a class="navbar-brand">
                    <img src="images/logo.png" alt="Logo" style="width:60px;">
                </a>
            </div>
            </nav>
        </div>
    </div>
    </div>

</body>

</html>