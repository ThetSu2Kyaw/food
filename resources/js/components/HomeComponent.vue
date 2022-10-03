<template>
    <div>
      <NavBar/>
      <!-- {{restaurants}} -->
      <ContentComponent :restaurants="restaurants"/>
      <Footer></Footer>
    </div>
</template>
<script>
  import NavBar from './NavBar.vue';
  import ContentComponent from './ContentComponent.vue';
  import Footer from './Footer.vue';
  export default{
    props: ['restaurants'],
    components: {NavBar, ContentComponent, Footer}
  }
</script>