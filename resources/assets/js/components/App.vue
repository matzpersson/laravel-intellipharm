<template>
    <div >
        
        <nav class="navbar navbar-default">
          <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    Laravel Intellipharm
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><router-link to="/" exact >Members</router-link></li>
                </ul>
            </div>

          </div>    
        </nav>

        <div class="container" ><router-view></router-view></div>

    </div>
</template>

<script>

    export default {}
    
</script>