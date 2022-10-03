<template>
    <div>
        <NavBar></NavBar>
        <RestDetail :restaurant="restaurant" :order_id="order_id"></RestDetail>
        <Footer></Footer>
    </div>
</template>
<script>
    import NavBar from './NavBar.vue';
    import Footer from './Footer.vue';
    import RestDetail from './RestDetail.vue';
    export default{
      props: ['restaurant', 'order_id'],
      components: {NavBar, Footer, RestDetail}
    }
</script>