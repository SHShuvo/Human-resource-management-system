<template>
  <div class="admin">
<div class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" @click="closeMenu" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <router-link to="/admin">pro sidebar</router-link>
                    <div id="close-sidebar" @click="closeMenu">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-item sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="../../img/i (3).jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="sidebar-dropdown">
                            <a href="#homeSubmen"  data-toggle="collapse" aria-expanded="false" >
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
            
                            <ul class="collapse list-unstyled" id="homeSubmen">
                                <li>
                                    <a href="#">Dashboard 1
                                        <span class="badge badge-pill badge-success">Pro</span>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false" >
                                <i class="fas fa-cogs"></i>
                                Settings
                            </a>
                            
                            <ul class="collapse" style="margin-left:10px" id="settingsSubmenu">
                               <li>
                                    <router-link to="/admin/settings-general">
                                        <i class="fa fa-tachometer-alt"></i>General Settings
                                    </router-link>
                               </li>
                               <li>
                                   <router-link to="/admin/set-working-days">
                                        <i class="fa fa-calendar-alt"></i>Set Working Days
                                    </router-link>
                               </li>
                               <li>
                                   <router-link to="/admin/holiday-list">
                                        <i class="fa fa-list-alt"></i>Holiday List
                                    </router-link>
                               </li>
                            </ul>
                        </li>

                        

                        <li class="sidebar-dropdown">
                            <a href="#departmentSubmenu" data-toggle="collapse" aria-expanded="false" >
                                <i class="fas fa-building"></i>
                                Department
                            </a>
                            
                            <ul class="collapse" style="margin-left:10px" id="departmentSubmenu">
                               <li>
                                    <router-link to="/admin/add-department" href="#">
                                        <i class="fas fa-plus-square"></i>Add Department
                                    </router-link>
                               </li>

                                <li>
                                    <router-link to="/admin/view-department" href="#">
                                        <i class="fas fa-list"></i>
                                        Department List
                                    </router-link>
                               </li>
                            </ul>
                        </li>

                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                                <span class="badge badge-pill badge-primary">Beta</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>

        </nav>
        <!-- sidebar-content  -->
        <div class="page-content">
            <router-view></router-view>
        </div>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->




  </div>
</template>

<script>
export default {
  methods:{
      closeMenu(){
        $(".page-wrapper").toggleClass("toggled");
      }
  }
};
</script>