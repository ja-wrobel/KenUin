<script setup>
    import About from './About.vue';
    import News from './News.vue';
</script>

<template>
    <div id="main" class="img-as-bgr">
        <div class="encourage welcome-box">
            <div class="text-container">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac felis vitae enim porta luctus. Curabitur tristique dapibus quam, in malesuada urna cursus quis. In quis dolor nulla. Cras in urna consectetur, pretium purus vel, molestie risus. Vivamus sed accumsan sapien. Nam a risus volutpat purus eleifend ullamcorper a non felis. Morbi gravida, libero dictum mattis semper, lacus nisi tristique lorem, eget venenatis nibh ex sit amet urna. Curabitur sed libero eu velit iaculis volutpat eget at risus. Nam ullamcorper pharetra massa, scelerisque bibendum metus. Aliquam erat volutpat. Aliquam rhoncus malesuada erat, ut facilisis magna tempus nec. In in mattis magna. Nulla facilisi. Nam eget diam mollis, pellentesque lectus vel, ultricies mi.
            </div>
        </div>
        <div class="flex main-flexbox">
            <div class="button">
                Start for free
            </div>
            <div class="button">
                Try as guest
            </div>
        </div>
    </div>

    <div class="section-gap"><br></div>

    <About/>

    <div class="section-gap"><br></div>

    <News/>

    <div id="contact" class="section-gap"><br></div>
</template>
