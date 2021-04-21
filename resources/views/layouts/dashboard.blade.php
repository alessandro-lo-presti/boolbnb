{{-- @extends('app.layout') --}}


<body>
    @extends('partials.loggedh')
    <main>
        {{-- dashboard --}}
        <div id="dashboard">
            <ul class="nav nav-flush flex-column mb-auto text-center">

                {{-- rotta alla home --}}
                <a href="home">
                    <li class="nav-item"><i class="fas fa-home fa-2x"></i><span>Home</span></li>
                </a>


                {{-- rotta allo apartment/show --}}
                <a href="My apartments">
                    <li class="nav-item"><i class="fas fa-building fa-2x"></i> <span>My apartments</span> </li>
                </a>


                <a href="Logout">
                    <li class="nav-item"><i class="fas fa-sign-out-alt fa-2x"></i> <span>Logout</span> </li>
                </a>
                <a href="">
                    <li></li>
                </a>

            </ul>
        </div>
        {{-- my apartment --}}
        <section id="chart" class="my-apartment float-right">
            <h1>I miei appartamenti</h1>
            <div class="container d-flex flex-row justify-content-around flex-wrap">
                <div v-for="chart in charts" class="cards bg-success"></div>
                <div class="cards bg-primary"></div>
                <div class="cards bg-warning"></div>
                <div class="cards bg-danger"></div>
            </div>

        </section>
    </main>



</body>

</html>
