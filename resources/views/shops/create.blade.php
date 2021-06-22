CREATE SHOP
<script>
axios.defaults.headers.common = {
    Authorization: "Bearer " + localStorage.getItem("token")
};
axios.post('/api/products', this.shop).then((response) => {
    this.$emit('add', response.data.shop);
});

</script>