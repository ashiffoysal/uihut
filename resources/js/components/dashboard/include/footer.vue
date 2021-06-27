<template>
        <div class="dashboard-sidebar">
            <span class="close-dm">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <div class="dashboard-sidebar-content">
                <div class="d-logo">
                    <router-link to="/">
                        <img src="public/frontend/assets/img/main-logo.png" alt="">
                    </router-link>
                </div>
                <div class="ds-menu">
                    <ul class="dsm-list">
                        <li>
                            <router-link  to="dashboard">Edit Profile</router-link>
                        </li>
                        <li>
                           
                             <router-link  to="billingplan">Plan & Billing</router-link>
                        </li>
                        <li>
                             <router-link  to="collection">Collection</router-link>
                        </li>
                        <li>
                            <a href="#">Download</a>
                        </li>
                        <li>
                            <a href="#">Support Tickets</a>
                        </li>
                    </ul>
                </div>
                <div class="schedule-meeting-btn">
                    <p>If you need custom
                        service schedule a 
                        meeting</p>
                    <a href="#" class="aabbro-btn-a">Schedule a Meeting</a>
                </div>
            </div>
        </div>    
</template>
<script>
export default {
      
}
</script>