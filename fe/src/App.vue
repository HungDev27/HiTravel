<template>
  <component :is="layout">
    <router-view></router-view>
  </component>

  <!-- Floating Contact Buttons -->
  <div id="button-contact-vr" style="position: fixed; bottom: 200px; left: 20px; z-index: 9999;">

    <!-- Facebook -->
    <div class="phone-vr" style="position: relative; width: 70px; height: 70px; margin-bottom: 15px; cursor: pointer;">
      <div
        style="width: 70px; height: 70px; background-color: rgba(59, 89, 152, 0.3); border-radius: 50%; position: absolute; top: 0; left: 0; animation: pulse 1.5s infinite;">
      </div>
      <div
        style="width: 50px; height: 50px; background: #fff; border-radius: 50%; position: absolute; top: 10px; left: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <a target="_blank" href="https://www.facebook.com/thuynhi.1205">
          <img alt="Fanpage" src="https://logos-world.net/wp-content/uploads/2023/08/Facebook-Logo.png"
            style="width: 200%; height: 200%; padding-right: 100px; object-fit: contain;">
        </a>
      </div>
    </div>

    <!-- Zalo -->
    <div class="phone-vr" style="position: relative; width: 70px; height: 70px; margin-bottom: 15px; cursor: pointer;">
      <div
        style="width: 70px; height: 70px; background-color: rgba(0, 120, 255, 0.3); border-radius: 50%; position: absolute; top: 0; left: 0; animation: pulse 1.5s infinite;">
      </div>
      <div
        style="width: 50px; height: 50px; background: #fff; border-radius: 50%; position: absolute; top: 10px; left: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <a target="_blank" href="https://zalo.me/0369636310">
          <img alt="Zalo" src="https://cdn.freebiesupply.com/logos/large/2x/zalo-1-logo-png-transparent.png"
            style="width: 100%; height: 100%; object-fit: contain;">
        </a>
      </div>
    </div>

    <!-- Phone -->
    <div class="phone-vr" style="position: relative; width: 70px; height: 70px; margin-bottom: 15px; cursor: pointer;">
      <div
        style="width: 70px; height: 70px; background-color: rgba(255, 0, 0, 0.3); border-radius: 50%; position: absolute; top: 0; left: 0; animation: pulse 1.5s infinite;">
      </div>
      <div
        style="width: 50px; height: 50px; background: #fff; border-radius: 50%; position: absolute; top: 10px; left: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <a href="tel:0369636310">
          <img alt="Phone"
            src="https://media.istockphoto.com/id/971654072/vector/red-call-icon.jpg?s=612x612&w=0&k=20&c=bwlNm0pnNs98evZv4x8N3Cq3XQAWIKLEzJPmQpbMgWY="
            style="width: 100%; height: 100%; object-fit: contain;">
        </a>
      </div>
    </div>
  </div>

</template>

<script>
const default_layout = "default";
export default {
  computed: {
    layout() {
      return (this.$route.meta.layout || default_layout) + "-layout";
    },
  },
  
};
</script>
<style>
@keyframes pulse {
  0% {
    transform: scale(0.9);
    opacity: 0.7;
  }

  70% {
    transform: scale(1.1);
    opacity: 0.3;
  }

  100% {
    transform: scale(0.9);
    opacity: 0.7;
  }
}

a {
  text-decoration: none !important;
}
</style>