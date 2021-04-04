<template id="form-login">
    <div style="border-radius: 10px;" class="card">
        <div  class="card-body">
            <br>
            <center>
                <img src="assets/images/user.png" width="100px" alt="User Account">
            </center>
            <br>
            <form action="controller/singin.php" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                </div>

                <button class="mdl-button mdl-button-block mdl-js-button mdl-button--raised mdl-button--accent">
                    LOG IN
                </button>
            </form>
        </div>
    </div>
</template>

<template id="form-register">
    <div style="border-radius: 10px" class="card">
        <div class="card-body">
            <br>
            <center>
                <img src="assets/images/document.png" width="100px" alt="User Account">
            </center>
            <br>
            <form action="controller/register.php" method="post">
                <div class="form-group">
                    <label for="email">Email address (*)</label>
                    <input required type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="name">Name (*)</label>
                    <input required type="text" name="name" class="form-control" id="name" placeholder="You Name">
                </div>
                <div class="form-group">
                    <label for="pass">Password (*)</label>
                    <input required type="password" name="pass" class="form-control" id="pass" placeholder="You password">
                </div>
                <!-- Colored raised button -->
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    REGISTER
                </button>


            </form>
        </div>
    </div>
</template>

<template id="inicio">
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">{{ appName }}</span>
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active">LOG IN</a>
                <a href="#fixed-tab-2" class="mdl-layout__tab">Register</a>

            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">{{ appName }}</span>
        </div>
        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                <div class="page-content">

                    <div class="container" style="margin-top: 20px">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <form-login></form-login>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                <div class="page-content">

                    <div class="container" style="margin-top: 20px">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <form-register></form-register>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>
</template>

<template id="home-app">
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">{{ user }}</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="../controller/close.php">Close session</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">{{ user }}</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="../controller/close.php">Close session</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="container" style="margin-top: 30px">
                    <div class="row">
                        <div class="col-6">
                            <card-pass></card-pass>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<template id="card-pass">
    <div style="border-radius: 10px" class="card">
        <div class="card-body">
            <br>
            <center>
                <img src="../assets/images/padlock.png" width="100px" alt="User Account">
            </center>
            <br>
            <form  action="../controller/change-password.php" method="post" >
                <div class="form-group">
                    <label for="name">Password (*)</label>
                    <input required type="password" name="passActual" class="form-control" id="passActual" placeholder="You password">
                </div>
                <div class="form-group">
                    <label for="pass">New password (*)</label>
                    <input required type="password" name="newPass" class="form-control" id="newPass" placeholder="You new password">
                </div>
                <!-- Colored raised button -->
                <button  type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    CHANGE PASSWORD
                </button>
            </form>
        </div>
    </div>
</template>