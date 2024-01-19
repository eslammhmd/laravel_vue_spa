<template>

    <div class="container">
      <header class="mb-3">
        <div class=" py-2 bg-dark text-white">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <router-link to="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h3>Laravel and Vue</h3>
              </router-link>
              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <router-link to="/" class="nav-link text-white" style="font-size: 2rem; color: white;"><i class="fa-solid fa-house-user"></i></router-link>
                </li>
                <li>
                    <router-link to="/student/create" class="nav-link text-white" style="font-size: 2rem; color: white;"><i class="fa-solid fa-user-plus"></i></router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
    
      <div class="card">
        <div class="card-body">
          <div class="container-fluid">
            <router-view></router-view>
          </div>
        </div>
      </div>
    
    </div>
    
    </template>
    
    <script>
    export default {
      name: 'App'
    }
    </script>