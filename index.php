<?php
$title = "Pocetna";
include "public/layout/header.php";
?>
<h1>Pocetna stranica blabla</h1>

<!-- Start of the register form modal -->
<section class="intro"> 
    <div class="intro">
        <div class="row">
            <div class="col-md-5 text">
                <div class="modal fade" id="singupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="singupModalLabel">
                            <b>Registruj se</b>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                        
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="app/user/RegistrationController.php">
                            <label>
                                <i class="bi bi-person-fill"></i>
                                Korisničko ime
                            </label>
                            <div>
                                <input type="text" name="userName" placeholder="Korisničko ime" required/>
                            </div>

                            <label>
                                <i class="bi bi-envelope-fill"></i>
                                E-mail
                            </label>
                            <div>
                                <input type="email" name="email" placeholder="E-mail" required/>
                            </div>

                            <label>
                                <i class="bi bi-key-fill"></i>
                                Lozinka
                            </label>
                            <div>
                                <input type="password" name="password" placeholder="Unesi lozinku" required/>
                            </div>

                            <label>
                                <i class="bi bi-arrow-repeat"></i>
                                Ponovi lozinku
                            </label>
                            <div>
                                <input type="password" name="repeatedPassword" placeholder="Ponovi lozinku" required/>
                            </div>

                            <div>
                                <button class="btn btn-dark" type="submit" name="submit">
                                    <i class="bi bi-person-check"> </i>
                                    Potvrdi
                                </button>
                            </div>

                            <div class="foot">
                                <a data-bs-toggle="modal" data-bs-target="#singinModal" class="new-acc">
                                    Već imaš nalog?
                                </a>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div><br>
                </div>
            </div>             
        </div>
    </div>
</section> 
<!-- End of the singup modal -->
<!-- Start of the login form modal -->
<section class="intro"> 
    <div class="intro">
        <div class="row">
            <div class="col-md-5 text">
                <div class="modal fade" id="singinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="singinModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <b>Prijavi se</b>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                     
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#">
                            <label>
                                <i class="bi bi-person-fill"></i>
                                Korisničko ime
                            </label>
                            <div>
                                <input type="text" placeholder="Korisnicko ime ili e-mail" required/>
                            </div>

                            <label>
                                <i class="bi bi-key-fill"></i>
                                Lozinka
                            </label>
                            <div>
                                <input type="password" placeholder="Lozinka" required />
                            </div>

                            <div>
                                <button class="btn btn-dark" type="submit">
                                    <i class="bi bi-lock"></i>
                                    Prijavi se
                                </button>
                            </div>

                            <div class="foot">
                                <a data-bs-toggle="modal" data-bs-target="#singupModal" class="new-acc">
                                    Nemas nalog?
                                </a>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div><br>
                </div>
            </div>             
        </div>
    </div>
</section> 
<!-- End of the login modal -->
<?php include "public/layout/footer.php" ?>