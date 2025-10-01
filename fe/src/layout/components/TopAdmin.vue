<template>

    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="topbar-logo-header" style="margin-left: 1cm;">
                <div>
                    <img src="../../assets/images/anh/logoNHTravel.jpg" class="logo-icon" alt="logo icon"
                        style="width: 60px; height: 40px;">
                </div>
                <div>
                    <h4 class="logo-text" style="font-size: 2.1rem;"><b><i>NHTravel</i></b></h4>
                </div>
            </div>
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Tìm Kiếm?">
                    <span class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                            class='bx bx-x'></i></span>
                </div>
            </div>      
            
            
            <div class="user-box dropdown" style="margin-right: 2cm;">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../assets/images/avatars/avatar-10.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"><b>Admin</b></p>
                        <p class="designattion mb-0">Admin</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <router-link to="/profile">
                        <li>
                            <a class="dropdown-item" href="/profile"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                    </router-link>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>