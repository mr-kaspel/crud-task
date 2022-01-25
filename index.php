<?
spl_autoload_register();

new classes\Rander;
new classes\CRUD

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">List contacts</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row mb-3 justify-content-md-center">
            <div class="col-6 mb-3">
                <form action="" method="post">
                    <input type="hidden" name="method" value="crate">
                    <div class="list_elem_form">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Full name">
                        </div>
                        <div class="row mb-3 g-3 align-items-center email">
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Email" name="email[0]">
                            </div>
                            <div class="col-auto">
                                <input class="form-check-input" type="radio" name="radioEmail[0]">
                            </div>
                            <div class="col-auto">
                                <span class="form-text">
                                    Select main.
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3 g-3 align-items-center telephone">
                            <div class="col-auto">
                                <input type="tel" class="form-control" placeholder="Telephone" name="telephone[0]">
                            </div>
                            <div class="col-auto">
                                <input class="form-check-input" type="radio" name="radioTelephone[0]">
                            </div>
                            <div class="col-auto">
                                <span class="form-text">
                                    Select main.
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-primary">Clear</button>
                </form>
            </div>
        </div>

        <div class="row mb-3 justify-content-md-center">
            <div class="col-7">
                <h3>Contact list</h3>
            </div>
        </div>

        <div class="row mb-3 justify-content-md-center">
            <div class="col-7 contact_list">
                <div class="spinner-border text-primary">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>